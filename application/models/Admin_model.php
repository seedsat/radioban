<?php
class Admin_model extends CI_Model {

  public function __construct()
  {
      $this->load->database();
  }

  // 管理画面ログイン認証
  public function admin_login($id, $password)
  {
    $this->db->where('id', $id);
    $this->db->where('pass', $password);
    $query = $this->db->get('admin');

    if($query->num_rows() == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
  }

  // ログイン時間を挿入
  public function login_time($ip)
  {
      $insert_data = array('ip_address' => $ip, "created_at" => date("Y/m/d H:i:s"));
      $this->db->insert('login', $insert_data);
  }

  // 最新ログイン時間と前回のログイン時間の取得
  public function get_login_time()
  {
      $this->db->order_by('created_at', 'desc');
      $this->db->limit(2);
      return $this->db->get('login')->result_array();
  }
}