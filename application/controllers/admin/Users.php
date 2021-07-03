<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 管理画面ユーザー関連コントローラー */
class Users extends Admin_controller {

    public function __construct()
    {
        parent::__construct();
    }

    /* TOPページ */
    public function index()
    {
        $data['all_users'] = $this->users_model->get_all_users();
        $this->admin_show_view('admin/users', $data);
    }

    /* ユーザー詳細ページ */
    public function detail($user_id)
    {
        $user_details = $this->users_model->detail_user($user_id);

        if(!empty($user_details))
        {
            $data['user_details'] = $this->users_model->detail_user($user_id);
            $this->admin_show_view('admin/usersdetail', $data);
        }
        else
        {
            show_404();
        }
    }

    /* 管理画面からユーザーを削除 */
    public function delete($userid)
    {
        $this->users_model->delete_user($userid);
        redirect('admin/users');
    }
}
