<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model', 'user');
		$this->load->model('Notification_model', 'nt');
	}

	public function login()
	{
		isLogin();
		$data = [
			'webname' => appSetting("webname"),
			'webversion' => appSetting("version"),
			'register_url' => base_url('auth/register_account'),
			'f_password_url' => base_url('auth/forgot_password'),
		];
		$this->load->view('auth/index_v', $data);
	}

	public function do_login()
	{
		try {
			$email = htmlspecialchars($this->input->post('emailLogin'));
			$password = htmlspecialchars($this->input->post('passwordLogin'));
			$check_email = $this->user->get_by_email($email);
			$user_dt = $check_email['data'];
			if ($check_email['records'] == 0 || password_verify($password, $user_dt->password) == false) {
				throw new Exception('The email or password you entered is incorrect. Please try again');
			}
			if ($user_dt->is_verified == 0) {
				throw new Exception('Verification required. Please verify your email first');
			}
			if ($user_dt->is_active == 0) {
				throw new Exception('Your account may be inactive. Please contact administrator for support');
			}
			$sess_data = [
				'user_id' => $user_dt->user_id,
				'email' => $email,
				'username' => $user_dt->username,
				'profile_picture' => $user_dt->picture_path,
				'is_login' => true
			];
			$this->session->set_userdata($sess_data);
			$result = [
				'status' => 'OK',
				'message' => 'Your login was successful. You will be redirected to your dashboard shortly',
				'nextPage' => base_url('dashboard')
			];
		} catch (Exception $e) {
			if ($this->session->userdata()) {
				$this->session->sess_destroy();
			}
			$result = [
				'status' => 'ERROR',
				'message' => $e->getMessage(),
				'nextPage' => null
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function register_account()
	{
		isLogin();
		$this->load->config('notif');
		$data = [
			'webname' => appSetting("webname"),
			'webversion' => appSetting("version"),
			'login_url' => base_url('auth/login')
		];
		$this->load->view('auth/register_v', $data);
	}

	public function save_regist()
	{
		$this->load->library('upload');
		try {
			$username = htmlspecialchars($this->input->post('username'));
			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));
			$reg_data = [
				'username' => $username,
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'created_by' => $username
			];
			$check_email = $this->user->get_by_email($email);
			if ($check_email['records'] > 0) {
				throw new Exception('email has already been registered');
			}

			//upload gambar
			// $image = $_FILES['profile_picture'];
			$upload_path = "src/uploads/profile/";
			$new_img_name = uniqid("img-profile-") . date("Ymd");
			$config = [
				'upload_path' => FCPATH . $upload_path,
				'file_name' => $new_img_name,
				'allowed_types' => 'png|jpg|jpeg',
				'max_size'      => 3090
			];
			$this->upload->initialize($config);

			$upload = $this->upload->do_upload('profile_picture');
			if (!$upload) {
				throw new Exception("Error: Image Can't be upload, Please make sure the image uploaded is supported.");
			}
			$uploaded_data = $this->upload->data();
			$reg_data['picture_path'] = $upload_path . $uploaded_data['file_name'];

			$this->db->trans_start();
			$this->db->insert('users_tb', $reg_data);
			$reg_id = $this->db->insert_id();
			if ($this->db->trans_status() == FALSE) {
				throw new Exception('make sure your connection is not interupted');
			}
			$this->db->trans_commit();
			$encrypted_id = $this->encryption->encrypt($reg_id);
			$reg_data['verif_url'] = base_url() . '/auth/email_verification?reff=' . $encrypted_id;
			$this->nt->regist_verification($reg_data);
			$result = [
				'status' => 'OK',
				'message' => 'A verification has been sent to your email address, check your inbox or spam',
				'email' => $email
			];
		} catch (Exception $e) {
			$this->db->trans_rollback();
			if ($uploaded_data) {
				@unlink(FCPATH . $reg_data['picture_path']);
			}
			$result = [
				'status' => 'ERROR',
				'message' => 'Failed to submit your registration, ' . $e->getMessage(),
				'email' => $email
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function email_verification()
	{
		$id = $this->input->get('reff');
		$decrypted_id = htmlspecialchars($this->encryption->decrypt($id));
		$data = [
			'webname' => appSetting("webname"),
			'webversion' => appSetting("version"),
			'img_illust' => base_url() . 'src/assets/img/illust/emailverify.svg',
			'login_url' => base_url('auth/login')
		];
		try {
			$this->db->trans_start();
			if (!$decrypted_id) {
				throw new Exception("Unrecognized ID");
			}
			$users = $this->user->get_by_id($decrypted_id);
			if ($users['records'] <= 0) {
				throw new Exception("Unrecognized User");
			}
			$dt_user = $users['data'];
			if ($dt_user->is_verified == 1) {
				throw new Exception("Sorry, the page you are trying to access has been expired.");
			}
			$verify = [
				'is_verified' => 1
			];
			$this->db->set($verify);
			$this->db->where('user_id', $this->encryption->decrypt($dt_user->user_id));
			$this->db->update('users_tb');
			if ($this->db->trans_status() == FALSE) {
				throw new Exception('Your connection is interupted');
			}
			$this->db->trans_commit();
			$this->load->view('auth/verification_view', $data);
		} catch (Exception $e) {
			$this->db->trans_rollback();
			$data['title'] = "Something went wrong!";
			$data['msg'] = "Error: " . $e->getMessage();
			$this->load->view('template/error_alert', $data);
		}
	}

	// resend email verification
	public function re_verify()
	{
		try {
			$email = htmlspecialchars($this->input->post('email'));
			$check_email = $this->user->get_by_email($email);
			if ($check_email['records'] == 0) {
				throw new Exception('email not found');
			}
			$user = $check_email['data'];
			$regist_data = [
				'username' => $user->username,
				'verif_url' => base_url() . '/auth/email_verification?reff=' . $user->user_id,
				'email' => $user->email
			];
			$this->nt->regist_verification($regist_data);
			$result = [
				'status' => 'OK',
				'message' => 'A verification has been sent to your email address, check your inbox or spam',
				'email' => $email
			];
		} catch (Exception $e) {
			$result = [
				'status' => 'ERROR',
				'message' => 'Failed to resend verification, ' . $e->getMessage(),
				'email' => $email
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function forgot_password()
	{
		$data = [
			'webname' => appSetting("webname"),
			'webversion' => appSetting("version"),
			'login_url' => base_url('auth/login')
		];
		$this->load->view('auth/forgot_pass', $data);
	}

	public function send_f_password()
	{
		try {
			$this->db->trans_start();
			$email = htmlspecialchars($this->input->post('email'));
			$check_email = $this->user->get_by_email($email);
			if ($check_email['records'] == 0) {
				throw new Exception('email is not reconized');
			}
			$user = $check_email['data'];
			$token_reset = uniqid("RP");
			$user_id = $this->encryption->decrypt($user->user_id);
			$check_token = $this->user->get_reset_token($user_id);
			if ($check_token['records'] > 0) {
				$update_data = [
					'is_used' => 1
				];
				$this->db->where('email_reff', $user_id);
				$this->db->update('log_reset_password', $update_data);
			}

			$log_reset = [
				'email_reff' => $user_id,
				'token_reset' => $token_reset,
			];
			$this->db->insert('log_reset_password', $log_reset);

			if ($this->db->trans_status() == FALSE) {
				throw new Exception('make sure your connection is not interupted');
			}

			$email_data = [
				'username' => $user->username,
				'reset_url' => base_url() . '/auth/password_reset?reff=' . $token_reset,
				'email' => $user->email
			];

			$this->nt->password_reset($email_data);

			$result = [
				'status' => 'OK',
				'message' => 'The reset password link has been sent to your email, check your inbox or spam',
			];
			$this->db->trans_commit();
		} catch (Exception $e) {
			$result = [
				'status' => 'ERROR',
				'message' => 'Failed to send password link, ' . $e->getMessage(),
				'email' => $email
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function password_reset()
	{
		$token_reset = htmlspecialchars($this->input->get('reff'));
		$data = [
			'webname' => appSetting("webname"),
			'webversion' => appSetting("version"),
			'img_illust' => base_url() . 'src/assets/img/illust/emailverify.svg',
			'login_url' => base_url('auth/login')
		];
		try {
			$this->db->trans_start();
			$password = $this->user->get_reset_by_token($token_reset);
			if ($password['records'] <= 0) {
				throw new Exception("Unrecognized Token");
			}
			$dt = $password['data'];
			if ($dt->is_used == 1) {
				throw new Exception("Sorry, reset token has been used");
			}
			$users = $this->user->get_by_id($dt->email_reff);
			$user_dt = $users['data'];
			if ($this->db->trans_status() == FALSE) {
				throw new Exception('Your connection is interupted');
			}
			$this->db->trans_commit();
			$data['reff_user'] = $user_dt->user_id;
			$this->load->view('auth/reset_password', $data);
		} catch (Exception $e) {
			$this->db->trans_rollback();
			$data['title'] = "Something went wrong!";
			$data['msg'] = "Error: " . $e->getMessage();
			$this->load->view('template/error_alert', $data);
		}
	}

	public function update_password()
	{
		try {
			$reff_user = htmlspecialchars($this->input->post('reff_user'));
			$user_id = $this->encryption->decrypt($reff_user);
			$password = htmlspecialchars($this->input->post('password'));
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			$nextPage = base_url('auth/login');
			$this->db->trans_start();
			$new_pass = [
				'password' => $hashed_password
			];
			$this->db->set($new_pass);
			$this->db->where('user_id', $user_id);
			$this->db->update('users_tb');
			if ($this->db->trans_status() == false) {
				throw new Exception('Connection Interrupted. Please check your internet connection and try again');
			}
			$this->db->trans_commit();
			$result = [
				'status' => 'OK',
				'message' => 'Your password has been successfully updated.',
				'nextPage' => $nextPage
			];
		} catch (Exception $e) {
			$this->db->trans_rollback();
			$result = [
				'status' => 'ERROR',
				'message' => 'Failed to update a new password: ' . $e->getMessage(),
				'nextPage' => $nextPage
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth/login'));
	}
}
