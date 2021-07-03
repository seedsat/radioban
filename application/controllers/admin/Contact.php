<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 管理画面お問い合わせコントローラー */
class Contact extends Admin_controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['is_adlogin'] = $this->session->userdata('is_adlogin');
    }

    /* お問い合わせ一覧ページ */
    public function all_contacts()
    {
        $data['all_contacts'] = $this->contact_model->get_all_contact();
        $this->admin_show_view('admin/contact_list', $data);
    }

    /* お問い合わせ詳細ページ */
    public function contact_detail($contact_id)
    {
        $data['contact_detail'] = $this->contact_model->get_contact_detail($contact_id);
        $this->admin_show_view('admin/contact_detail', $data);
    }

}
