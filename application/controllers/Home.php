<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Git Branch test20211224-001
 */

class Home extends MY_Controller {

  public function __construct()
  {
      parent::__construct();
  }

  /* TOPページ */
  public function index($param = 0)
  {
    /* ページャー作成 */
    $offset = $param;
    $config['base_url']   = base_url();
    $config['per_page']   = 10;
    $config['num_links']  = 5;
    $config['first_link'] = '最初';
    $config['last_link']  = '最後';

    $thread_data = $this->threads_model->get_detail_thread($config['per_page'], $offset);

    $data['count']        = count($this->threads_model->get_all_thread());
    $config['total_rows'] = $data['count'];

    $this->pagination->initialize($config);
    $data['links'] = $this->pagination->create_links();
    /* ページャー作成 */

    /* キーワード検索 */
    $post = $this->input->post();

    if(!empty($post['search']))
    {
        $data['program_search'] = $this->programs_model->search_program($post);
    }

    // ユーザー毎にいいねをしているスレを取得
    $good = $this->goods_model->get_peruser_good($this->session->userdata('user_id'));

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
    foreach($data['thread_data'] as $thread_id => $thre)
    {
      foreach($good as $gd)
      {
        if($thread_id == $gd['thread_id'])
        {
            $data['thread_data'][$thread_id]['good'] = $gd['good_flag'];
        }
      }

      // お気に入り件数
      $counts = $this->goods_model->count_good($thread_id);

      foreach($counts as $count)
      {
        if($thread_id == $count['thread_id'])
        {
          $data['thread_data'][$thread_id]['count'] = count($counts);
        }
      }

        // 返信数
        $reply_counts = $this->threads_model->count_reply($thread_id);

        foreach($reply_counts as $rcount)
        {
          if($thread_id == $rcount['thread_id'])
          {
            $data['thread_data'][$thread_id]['rcount'] = count($reply_counts);
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
    $data['broadcasters'] = $this->programs_model->get_broadcaster();
    $this->show_view('home/broadcaster', $data);
  }

  /* 全番組情報 */
  public function all_programs()
  {
    $data['all_programs'] = $this->programs_model->get_program();
    $this->show_view('home/programs', $data);
  }

  /* プライバシーポリシー */
  public function privacy()
  {
    $this->show_view('home/privacy');
  }

  /* お問い合わせ */
  public function contact()
  {
    $data = $this->user_session();
    $data['error'] = "";

    if($this->form_validation->run('contact'))
    {
      $post = $this->input->post();
      if($post['title'] == "")
      {
        $data['error'] = "問い合わせ内容を選んでください。";
      }
      else
      {
        $data['error'] = "";
        $this->contacts_model->insert_contact($post, $data['user_id']);
        redirect('');
      }
    }
    $this->show_view('home/contact', $data);
  }

  /* お気にりボタン */
  public function good($thread_id)
  {
    $data['thread_id'] = $thread_id;
    $data['user_id']   = $this->session->userdata('user_id');
    $this->goods_model->insert_good($data);
    redirect('');
  }

  /* お気に入りの削除 */
  public function good_delete($thread_id)
  {
    $data['user_id']   = $this->session->userdata('user_id');
    $this->goods_model->delete_good($data['user_id'], $thread_id);
    redirect('');
  }

  /* 情報の変更 */
  public function change()
  {
    $data = array();
    $data['user_id'] = $this->session->userdata('user_id');

    $data['user_datas'] = $this->users_model->detail_user($data['user_id']);

    if(empty($data['user_datas']))
    {
        redirect('sign_in');
    }

    if($this->session->userdata['is_login'] == "1")
    {
      if($this->form_validation->run('change') == true)
      {
        $post = $this->input->post();
        if( (!empty($post)) && ($data['user_datas'][0]['user_id'] === $post['user_id']) )
        {
          $this->users_model->update_userdata($post);
          redirect();
        }
        else
        {
            $data['error'] = "会員情報が登録されていません。";
        }
      }
    }
    else
    {
      $post = $this->input->post();
      if( (!empty($post)) && ($data['user_datas'][0]['user_id'] === $post['userid']) )
      {
        $this->users_model->update_twitter_userdata($post);
        redirect();
      }
    }
    $this->show_view('home/change', $data);
  }

  /* 退会（親スレは残して子スレは削除） */
  public function unsubscribe()
  {
    $user_id = $this->session->userdata('user_id');

    /* usersから削除 */
    $this->users_model->delete_user($user_id);

    /* replyから返信した投稿を削除 */
    $this->threads_model->delete_reply($user_id);

    /* goodからいいねIDを削除 */
    $this->goods_model->delete_after_unsubscribe($user_id);

    /* 退会後にsessionを切ってトップにリダイレクト */
    $this->session->sess_destroy();
    redirect('');
  }

  private function user_session()
  {
    $data['user_email']   = $this->session->userdata('user_email');
    $data['user_name']   = $this->session->userdata('user_name');
    $data['user_id']      = $this->session->userdata('user_id');
    $data['is_login']     = $this->session->userdata('is_login');
    $data['twitter_name'] = $this->session->userdata('twitter_name');
    $data['id_str']       = $this->session->userdata('id_str');

    return $data;
  }
}
