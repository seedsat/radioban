<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 管理画面番組情報コントローラー */
class Programrelated extends Admin_controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['is_admin_login'] = $this->session->userdata('is_admin_login');
    }

    /* 放送局一覧ページ */
    public function broadcasters()
    {
        $data['title']        = "放送局一覧";
        $data['broadcasters'] = $this->programs_model->get_broadcaster();
        $this->admin_show_view('admin/broadcasters', $data);
    }

    /* 放送局詳細ページ */
    public function broadcasters_details($broadcast_id)
    {
        $data['broadcast_programs'] = $this->programs_model->get_broadcast_programs($broadcast_id);
        $data['program_title']      = $data['broadcast_programs'][0]['broadcast_name'];
        $this->admin_show_view('admin/broadcasters_details', $data);
    }
    

    /* 番組一覧 */
    public function programs_lists()
    {
        $data['programs_lists'] = $this->programs_model->get_program();
        $this->admin_show_view('admin/programslists', $data);
    }

    /* 番組詳細ページ */
    public function program_detail($dirname)
    {
        $data['program_detail']       = $this->programs_model->get_boradcaster_program($dirname);
        $data['program_name']         = $data['program_detail'][0]['program_name'];
        $data['eachprograms_threads'] = $this->threads_model->get_individual_program($dirname);

        $this->admin_show_view('admin/programsdetail', $data);
    }

    /* 番組追加 */
    public function add_program()
    {
        $data['broadcasters'] = $this->programs_model->get_broadcaster();
        $data['days']         = $this->programs_model->get_days();
        $data['timezones']     = $this->programs_model->get_timezone();

        if($this->form_validation->run('add'))
        {
            $post = $this->input->post();
            $this->programs_model->insert_program($post);
            redirect('admin/programrelated/programs_lists');
        }

        $this->admin_show_view('admin/add_program', $data);
    }

    /* 番組情報変更 */
    public function change_program($dirname)
    {
        $data['broadcasters'] = $this->programs_model->get_broadcaster();
        $data['days']         = $this->programs_model->get_days();
        $data['timezones']     = $this->programs_model->get_timezone();

        $data['program_data'] = $this->programs_model->get_boradcaster_program($dirname);

        $post = $this->input->post();
        if(!empty($post))
        {
            $this->programs_model->change_program_information($post);
            redirect('admin');
        }
        $this->admin_show_view('admin/change_program', $data);
    }

    /* スレッド詳細ページ */
    public function thread_detail($dir_name, $thread_id)
    {
        $data['thread_detail']      = $this->threads_model->get_bbs($dir_name, $thread_id);
        $data['thread_reply_lists'] = $this->threads_model->get_reply_bbs($thread_id);

        $this->admin_show_view('admin/thread_detail', $data);
    }

    /* 投稿一覧 */
    public function thread_lists()
    { 
        $data['all_thread_lists'] = $this->threads_model->get_all_thread();
        foreach($data['all_thread_lists'] as $ath)
        {
            $reply_counts = $this->threads_model->count_reply($ath['thread_id']);
            if(!empty($reply_counts))
            {

                $data['reply_counts'][$ath['thread_id']] = count($reply_counts);
            }
            else
            {
                $data['reply_counts'][$ath['thread_id']] = 0;
            }


            $count_goods = $this->goods_model->count_good($ath['thread_id']);
            if(!empty($count_goods))
            {
                $data['count_goods'][$ath['thread_id']] = count($count_goods);
            }
            else
            {
                $data['count_goods'][$ath['thread_id']] = 0;
            }
            
        }
        $this->admin_show_view('admin/threadlists', $data);
    }
}
