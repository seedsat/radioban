<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 管理画面投稿コントローラー */
class Thread extends Admin_controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['is_adlogin'] = $this->session->userdata('is_adlogin');
    }

    /* 放送局一覧ページ */
    public function broadcasters()
    {
        $data['title']        = "放送局一覧";
        $data['broadcasters'] = $this->program_model->get_broadcaster();
        $this->admin_show_view('admin/broadcasters', $data);
    }

    /* 放送局詳細ページ */
    public function broadcasters_details($broadcast_id)
    {
        $data['broadcast_programs'] = $this->program_model->get_broadcast_programs($broadcast_id);
        $data['program_title']      = $data['broadcast_programs'][0]['broadcast_name'];
        $this->admin_show_view('admin/broadcasters_details', $data);
    }
    

    /* 投稿一覧 */
    public function thread_lists()
    {
        
        $data['all_thread_lists'] = $this->thread_model->get_all_thread();
//var_dump($data);exit;
        $this->admin_show_view('admin/threadlists', $data);
    }

    /* 番組詳細ページ */
    public function program_detail($dirname)
    {
        $per_page = 0;
        $offset = 0;
        $data['program_detail']       = $this->program_model->get_boradcaster_program($dirname);
        $data['program_name']         = $data['program_detail'][0]['program_name'];
        $data['eachprograms_threads'] = $this->thread_model->get_individual_program($dirname, $per_page, $offset);

        $this->admin_show_view('admin/programsdetail', $data);
    }

    /* スレッド詳細ページ */
    public function thread_detail($dir_name, $thread_id)
    {
        $data['thread_detail'] = $this->thread_model->get_program_bbs($dir_name, $thread_id);

        $this->admin_show_view('admin/thread_detail', $data);
    }
}
