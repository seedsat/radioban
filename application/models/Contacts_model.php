<?php
class Contacts_model extends CI_Model {

  public function __construct()
  {
  }

  /* 問い合わせ */
  public function insert_contact($data, $user_id)
  {
    $contact_data = array(
      'title'       => $data['title'],
      'user_id'     => $user_id,
      'contents'    => $data['contents'],
      'created_at' => date('Y/m/d H:i:s'),
    );
    $this->db->insert('contacts', $contact_data);
  }

  public function get_all_contact()
  {
    $this->db->join('users', 'contacts.user_id = users.user_id');
    return $this->db->get('contacts')->result_array();
  }

  /* IDで指定して投稿内容を取得 */
  public function get_contact_detail($contact_id)
  {
      $this->db->where('contact_id', $contact_id);
      $this->db->join('users', 'contacts.user_id = users.user_id');
      return $this->db->get('contacts')->result_array();
  }

  /* $login_time間に問い合わせされた数 */
  public function get_login_time_contact($login_time)
  {
      $this->db->where('created_at <', $login_time[0]['created_at']);
      $this->db->where('created_at >', $login_time[1]['created_at']);
      return $this->db->get('contacts')->result_array();
  }

}
