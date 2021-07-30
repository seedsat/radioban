<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 管理画面ログインコントローラー */
class Login extends Admin_controller {

    public function __construct()
    {
        parent::__construct();
    }

    /* TOPページ */
    public function index()
    {
        $data = array();

        if($this->form_validation->run('admin_login'))
        {
            $post = $this->input->post();
            $login_data = $this->admin_model->admin_login($post['login_id'], $post['login_pw']);

            if( $login_data == TRUE )
            {
                $ip = $this->input->ip_address();
                $this->admin_model->login_time($ip);
                $login_data = array('is_admin_login' => "1");
                $this->session->set_userdata($login_data);
                redirect('admin');
            }
            else
            {
                $data['error'] = "ログイン情報が違います";
            }
        }
        $this->load->view('admin/login', $data);
    }

    /* ログアウト */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
