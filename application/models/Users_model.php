<?php
class Users_model extends CI_Model {

  public function __construct()
  {
      $this->load->database();
  }

  /* 会員登録 */
  public function insert_user($data)
  {
    $insert_data = array(
      'user_name'  => $data['user_name'],
      'user_email' => $data['user_email'],
      'password'   => md5($data['user_password']),
      'created_at' => date("Y/m/d H:i:s"),
    );
    $this->db->insert('users', $insert_data);
  }

  /* ログイン時の処理 */
  public function user_sing_in($post)
  {
    $this->db->where('user_email', $post['user_email']);
    $this->db->where('password', md5($post['user_password']));
    $user = $this->db->get('users')->row_array();

    if (isset($user))
    {
      $user_session_data = array(
        'user_id'    => $user['user_id'],
        'user_name'  => $user['user_name'],
        'user_email' => $user['user_email'],
        'is_login'   => '1'
      );
      $this->session->set_userdata($user_session_data);
      return true;
    }
    else
    {
      return false;
    }
  }

  /* twitterでのログイン情報の取得 */
  public function twitter_user_login($id_str)
  {
    $this->db->where('id_str', $id_str);
    $user = $this->db->get('users')->row_array();

    if(isset($user))
    {
      $twitter_user_data = array(
          'user_id'      => $user['user_id'],
          'id_str'       => $id_str,
          'twitter_name' => $user['twitter_name'],
          'is_login'     => '2',
      );
      $this->session->set_userdata($twitter_user_data);
      return true;
    }
    else
    {
      return false;
    }
  }

  /* twitterで登録されているかデータ検索 */
  public function search_twitter_user($twitter_user_data)
  {
    $this->db->where('id_str', $twitter_user_data['id_str']);
    return $this->db->get('users')->result_array();
  }

  /* twitterでの登録 */
  public function insert_twitter_user($twitter_user_data)
  {
    $twitter_insert_data = array(
      'id_str'       => $twitter_user_data['id_str'],
      'twitter_name' => $twitter_user_data['name'],
      'screen_name'  => $twitter_user_data['screen_name'],
      'created_at'   => date("Y/m/d H:i:s"),
    );
    $this->db->insert('users', $twitter_insert_data);
  }

  /* twitterデータの更新 */
  public function update_twitter_user($twitter_user_data)
  {
    $twitter_update_data = array(
      'twitter_name' => $twitter_user_data['name'],
      'screen_name'  => $twitter_user_data['screen_name'],
      'updated_at'   => date("Y/m/d H:i:s")
    );
    $this->db->where('id_str', $twitter_user_data['id_str']);
    $this->db->update('users', $twitter_update_data);
  }

  /* 会員情報の変更 */
  public function update_userdata($data)
  {
    $update_data = array(
      'user_name'  => $data['username'],
      'user_email' => $data['useremail'],
      'updated_at' => date("Y/m/d H:i:s"),
    );
    $this->db->where('user_id', $data['user_id']);
    $this->db->update('users', $update_data);
  }

  /* twitter登録者の会員情報の変更 */
  public function update_twitter_userdata($data, $programdata)
  {
    $update_data = array(
      'favarite1'   => $programdata['favarite1'],
      'favarite2'   => $programdata['favarite2'],
      'favarite3'   => $programdata['favarite3'],
      'update_date' => date("Y/m/d H:i:s"),
    );
    $this->db->where('user_id', $data['userid']);
    $this->db->update('users', $update_data);
  }

  /* 全ユーザーの取得 */
  public function get_all_users()
  {
    $this->db->order_by('created_at', 'desc');
    return $this->db->get('users')->result_array();
  }

  /* ユーザーIDで情報を取得 */
  public function detail_user($user_id)
  {
    $this->db->where('user_id', $user_id);
    return $this->db->get('users')->result_array();
  }

  /* $logintimeの間に登録したユーザーの取得 */
  public function get_login_time_user($login_time)
  {
    $this->db->where('created_at <', $login_time[0]['created_at']);
    $this->db->where('created_at >', $login_time[1]['created_at']);
    return $this->db->get('users')->result_array();
  }

  /* 会員登録後に登録時のメールアドレスでユーザー情報を取得 */
  public function get_after_insert_user($data)
  {
    $this->db->select('user_id');
    $this->db->select('username');
    $this->db->select('email');
    $this->db->where('email', $data['useremail']);
    return $this->db->get('users')->result_array();
  }

  /* 退会（DBからユーザー情報の削除） */
  public function delete_user($userid)
  {
    $this->db->where('user_id', $userid);
    $this->db->delete('users');
  }

  /* 問い合わせ */
  public function insert_contact($data)
  {
    $contact_data = array(
      'title'       => $data['title'],
      'user_name'   => $data['user_name'],
      'user_email'  => $data['user_email'],
      'contact'     => $data['contact'],
      'create_date' => date('Y/m/d H:i:s'),
    );
    $this->db->insert('contact', $contact_data);
  }

  /* パスワード再設定 */
  public function password_update($data)
  {
      $update_data = array('password' => md5($data['newpassword']));
      $this->db->where('email', $data['useremail']);
      $this->db->update('users', $update_data);
  }

  /* useridとメルアドでユーザーチェック */
  public function check_userid_email($usermail)
  {
    $this->db->where('email', $usermail);
    $query = $this->db->get('users');

    if($query->num_rows() > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
  }

/********* チェック関数 **********/

    //メールアドレスの有無をチェック
    public function check_email($email)
    {
        $this->db->where('user_email', $email);
        $query = $this->db->get('users');

        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // ユーザーデータが合っているかチェック（メルアド登録)
    public function check_userdata($email, $password)
    {
        $this->db->where('user_email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get('users');

        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // twitterでの登録データがあるかチェック
    public function check_twitter_userdata($id_str)
    {
      $this->db->where('id_str', $id_str);
      $query = $this->db->get('users');

      if($query->num_rows() > 0)
      {
          return true;
      }
      else
      {
          return false;
      }
    }

  //ニックネームの重複チェック
  public function check_username($username)
  {
    $this->db->where('user_name', $username);
    $query = $this->db->get('users');

    if($query->num_rows() > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
  }
}
