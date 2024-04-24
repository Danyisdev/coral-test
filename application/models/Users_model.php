<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_by_email($email)
  {
    $this->db->where('email', $email);
    $q = $this->db->get('users_tb');
    $dt = $q->row();
    $records = $q->num_rows();
    if ($records > 0) {
      $dt->user_id = $this->encryption->encrypt($dt->user_id);
    }
    $result = [
      'records' => $records,
      'data' => $dt
    ];
    return $result;
  }

  public function get_by_id($id)
  {
    $this->db->where('user_id', $id);
    $q = $this->db->get('users_tb');
    $dt = $q->row();
    $records = $q->num_rows();
    if ($records > 0) {
      $dt->user_id = $this->encryption->encrypt($dt->user_id);
    }
    $result = [
      'records' => $records,
      'data' => $dt
    ];
    return $result;
  }

  public function get_reset_token($user_id)
  {
    $this->db->where('email_reff', $user_id);
    $q = $this->db->get('log_reset_password');
    $dt = $q->result();
    $records = $q->num_rows();
    $result = [
      'records' => $records,
      'data' => $dt
    ];
    return $result;
  }

  public function get_reset_by_token($token_reset)
  {
    $this->db->where('token_reset', $token_reset);
    $q = $this->db->get('log_reset_password');
    $dt = $q->row();
    $records = $q->num_rows();
    $result = [
      'records' => $records,
      'data' => $dt
    ];
    return $result;
  }
}
