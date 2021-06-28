<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        $this->data['is_login'] = $this->session->userdata('is_login');
        $this->data['userid']   = $this->session->userdata('user_id');
        $this->load->library('my_form_validation');
    }

    public function index($dirname, $param = 0)
    {
			$data['user_id'] = $this->data['userid'];

			if($dirname == "")
			{
				redirect('');
			}

			$data['thread_data'] = array();

			/* ページャー作成 */
			$offset = $param;
			$config['base_url']   = "http://sattriomph.xsrv.jp/radio_test/program/".$dirname;
			$config['per_page']   = 10;
			$config['num_links']  = 5;
			$config['first_link'] = '最初';
			$config['last_link']  = '最後';

			$thread_data = $this->threads_model->get_individual_program($dirname, $config['per_page'], $offset);
			$thread_datas = $this->threads_model->get_detail_thread($this->data['userid'], $config['per_page'], $offset);
			$data['count'] = $this->threads_model->get_individual_program_count($dirname);
			$config['total_rows'] = $data['count'];

			$this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();

			$good = $this->goods_model->get_peruser_good($this->data['userid']);

			if( !empty($thread_data) )
			{
				foreach($thread_data as $td)
				{
					$data['thread_data'][$td['thread_id']] = array(
						'thread_id'      => $td['thread_id'],
						'program_name'   => $td['program_name'],
						'dir_name'       => $td['dir_name'],
						'thread_title'   => $td['title'],
						'create_date'    => $td['created_at'],
					);
				}

				foreach($data['thread_data'] as $threadid => $thre)
				{
					foreach($good as $gd)
					{
						if($threadid == $gd['thread_id'])
						{
							$data['thread_data'][$threadid]['good'] = $gd['good_flag'];
						}
					}

					// お気に入り件数
					$counts = $this->goods_model->count_good($threadid);

					foreach($counts as $count)
					{
						if($threadid == $count['thread_id'])
						{
							$data['thread_data'][$threadid]['count'] = count($counts); 
						}
					}

					// 返信数
					$reply_counts = $this->threads_model->count_reply($threadid);

					foreach($reply_counts as $rcount)
					{
						if($threadid == $rcount['thread_id'])
						{
							$data['thread_data'][$threadid]['rcount'] = count($reply_counts); 
						}
					}
				}
			}
			$this->show_view('program/program', $data);
    }

    /* 全番組情報 */
    public function all_programs()
    {
        $data['user_id']      = $this->data['userid'];
        $data['all_programs'] = $this->program_model->get_program();
        $this->show_view('programs', $data);
    }
}
