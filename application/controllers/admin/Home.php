<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 管理画面コントローラー */
class Home extends Admin_controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['is_admin_login'] = $this->session->userdata('is_admin_login');
    }

    /* TOPページ */
    public function index()
    {
        $data['is_admin_login'] = $this->data['is_admin_login'];
        if($data['is_admin_login'] === "1")
        {
            // 前回を最新のログイン時間の取得
            $login_time = $this->admin_model->get_login_time();
            
            // $login_timeの間に登録したユーザー数
            $count_user = $this->users_model->get_login_time_user($login_time);
            $data['count_user'] = count($count_user);

            // $login_timeの間に投稿された数
            $count_post = $this->threads_model->get_login_time_post($login_time);
            $data['count_post'] = count($count_post);

            // $login_timeの間に返信された数
            $count_reply = $this->threads_model->get_login_time_reply($login_time);
            $data['count_reply'] = count($count_reply);

            // $login_timeの間に問い合わせされた数
            // $count_contact = $this->contact_model->get_login_time_contact($login_time);
            // $data['count_contact'] = count($count_contact);

            $this->admin_show_view('admin/index', $data);
        }
        else
        {
            redirect('admin/login');
        }
    }
}
