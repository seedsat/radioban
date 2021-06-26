<?php
class User extends MY_Controller {

  /**
   * 会員登録
   */
  public function sign_up()
  {
    if ($this->form_validation->run('sign_up'))
    {
      $post = $this->input->post();
      if ($post['kiyaku'] == '1')
      {
        $this->users_model->insert_user($post);
        redirect();
      }
      else
      {
        $data['errors'] = '利用規約に同意して下さい。';
      }
    }
    $this->show_view('/user/sign_up');
  }

  /**
   * ログイン
   */
  public function sign_in()
  {
    if ($this->form_validation->run('sign_in'))
    {
      $post = $this->input->post();
      $data['user_data']  = $this->users_model->user_sing_in($post);
      var_dump($data['user_data']);exit;
      #redirect();
    }
    $this->show_view('/user/sign_in');
  }

  /**
   * ログアウト
   */
  public function sign_out()
  {
    $this->session->sess_destroy();
    redirect('home');
  }

  /********* チェック関数 **********/

  //ニックネームの重複チェック
  public function check_username($username)
  {
    $this->db->where('name', $username);
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

  //メールアドレスの重複をチェック
  public function check_email($email)
  {
      $this->db->where('email', $email);
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
    public function check_userdata($email, $password, $userid)
    {
      $this->db->where('id', $userid);
      $this->db->where('email', $email);
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
    public function check_twitter_userdata($userid)
    {
      $this->db->where('user_id', $userid);
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