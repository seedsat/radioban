<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  public function __construct()
  {
      parent::__construct();
  }

  /* TOPページ */
  public function index($param = 0)
  {
    $data['user_name'] = $this->session->userdata('user_name');
    $data['is_login'] = $this->session->userdata('is_login');
    $data['user_id']   = $this->session->userdata('user_id');

    /* ページャー作成 */
    $offset = $param;
    $config['base_url']   = $_SERVER['REQUEST_URI'];
    $config['per_page']   = 10;
    $config['num_links']  = 5;
    $config['first_link'] = '最初';
    $config['last_link']  = '最後';

    $thread_data = $this->threads_model->get_detail_thread($config['per_page'], $offset);

    $data['count'] = count($this->threads_model->get_all_thread());
    $config['total_rows'] = $data['count'];

    $this->pagination->initialize($config);
    $data['links'] = $this->pagination->create_links();
    /* ページャー作成 */

    /* キーワード検索 PC版は必要かも。SPはトップで必要かも */
    $post = $this->input->post();

    if(!empty($post['search']))
    {
        $data['program_seach'] = $this->programs_model->search_program($post);
    }

    // ユーザー毎にいいねをしているスレを取得
    #$good = $this->good_model->get_peruser_good($data['user_id']);

    // スレIDをキーに配列を作成
    foreach($thread_data as $td)
    {
      $data['thread_data'][$td['thread_id']] = array(
        'thread_id'      => $td['thread_id'],
        'program_name'   => $td['program_name'],
        'dir_name'       => $td['dir_name'],
        'title'          => $td['title'],
        'content'        => $td['content'],
        'user_name'      => $td['user_name'],
        'user_id'        => $td['user_id'],
        'created_at'     => $td['created_at'],
      );
    }

  if(!empty($data['thread_data']))
  {
    // スレ配列のキーといいねしたスレIDを持っていれば赤く表示
    foreach($data['thread_data'] as $threadid => $thre)
    {
      // foreach($good as $gd)
      // {
      //     if($threadid == $gd['thread_id'])
      //     {
      //         $data['thread_data'][$threadid]['good'] = $gd['good_flag'];
      //     }
      // }

      // お気に入り件数
      // $counts = $this->good_model->count_good($threadid);

      // foreach($counts as $count)
      // {
      //   if($threadid == $count['thread_id'])
      //   {
      //       $data['thread_data'][$threadid]['count'] = count($counts);
      //   }
      // }

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
    else
    {
      $data['thread_data'] = array();
    }
    $this->show_view('/home/index', $data);
  }

  /* 放送局一覧 */
  public function broadcaster()
  {
    $data['user_id']   = $this->session->userdata('user_id');
    $data['broadcasters'] = $this->programs_model->get_broadcaster();
    $this->show_view('home/broadcaster', $data);
  }

  /* 全番組情報 */
  public function all_programs()
  {
    $data['user_id']   = $this->session->userdata('user_id');
    $data['all_programs'] = $this->programs_model->get_program();
    $this->show_view('home/programs', $data);
  }

  /* プライバシーポリシー */
  public function privacy()
  {
    $data['user_id']   = $this->session->userdata('user_id');
    $this->show_view('home/privacy', $data);
  }

  /* お問い合わせ */
  public function contact()
  {
    $data['error'] = "";
    $data['user_id']   = $this->session->userdata('user_id');

    if($this->form_validation->run('contact'))
    {
      $post = $this->input->post();
      if($post['contact_title'] === "0")
      {
        $data['error'] = "問い合わせ内容を選んでください。";
      }
      else
      {
        $data['error'] = "";
        $this->users_model->insert_contact($post);
        redirect('');
      }
    }
    $this->show_view('home/contact', $data);
  }
}
