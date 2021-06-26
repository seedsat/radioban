<?php
class User extends CI_Controller {

  /**
   * 会員登録
   */
  public function sign_up()
  {
    $this->load->view('common/header');
    $this->load->view('user/sign_up');
    $this->load->view('common/footer');
  }

  /**
   * ログイン
   */
  public function sign_in()
  {

  }

  /**
   * ログアウト
   */
  public function sign_out()
  {

  }
}