<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Notification_model extends CI_Model
{
    private $email_config;
    private $email_sender;
    public function __construct()
    {
        parent::__construct();
        $this->load->config('notif');
        $this->email_config = $this->config->item('email_config');
        $this->email_sender = 'Test Danyxdev (Do Not Reply)';
    }

    public function regist_verification($arr)
    {
        $this->load->library('email');
        $this->email->initialize($this->email_config);
        $this->email->from('test@test.com', $this->email_sender);
        $this->email->to($arr['email']);
        $this->email->subject('Registration Verification');
        $email_body = $this->load->view('template/regist_verif', $arr, TRUE);
        $this->email->message($email_body);
        $this->email->send();
    }

    public function password_reset($arr)
    {
        $this->load->library('email');
        $this->email->initialize($this->email_config);
        $this->email->from('test@test.com', $this->email_sender);
        $this->email->to($arr['email']);
        $this->email->subject('Reset Password');
        $email_body = $this->load->view('template/password_reset', $arr, TRUE);
        $this->email->message($email_body);
        @$this->email->send();
    }
}
