<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* スレッドコントローラー */
class Thread extends MY_Controller {

  public function __construct()
  {
      parent::__construct();
  }

  // 投稿ページ
  public function newpost()
  {
    $session_data = $this->user_session();

    /* 番組選択プルダウン */
    $select_programs = $this->programs_model->get_program();
    foreach($select_programs as $select_program)
    {
      $data['broadcast_programs'][$select_program['broadcast_name']] = $select_program['broadcast_id'];
      $data['select_programs'][$select_program['program_name']][$select_program['program_id']][] = array(
        'broadcast_id' => $select_program['broadcast_id'],
        'program_id'   => $select_program['program_id'],
        'program_name' => $select_program['program_name'],
      );
    }
    /* 番組選択プルダウン */

    /* 新規投稿 */
    if($session_data['is_login'] == "1")
    {
      if($this->form_validation->run('post'))
      {
        $post = $this->input->post();
        $user_data = $this->users_model->check_userdata($session_data['user_email'], $post['user_password'], $session_data['user_id']);
        if($user_data == TRUE)
        {
          $this->threads_model->insert_post_content($post);
          redirect('');
        }
        else
        {
          $data['error'] = "ログイン情報が違います。";
        }
      }
    }
    elseif($session_data['is_login'] == "2")
    {
      if($this->form_validation->run('tpost'))
      {
        $user_data = $this->users_model->check_twitter_userdata($this->session->userdata('id_str'));

        if($user_data == TRUE)
        {
          $post = $this->input->post();
          $this->threads_model->insert_post_content($post, $session_data['user_id']);
          redirect('');
        }
        else
        {
          echo "false";exit;
        }
      }
    }
    else
    {
      $userdata = array();
    }
    $this->show_view('/thread/newpost', $data);
  }

  // 各掲示板ページ（親投稿と返信投稿）
  public function bbs($dirname, $thread_id)
  {
    $data['user_id']    = $this->session->userdata('user_id');

    // 親投稿
    $data['program_bbs'] = $this->threads_model->get_bbs($dirname, $thread_id);

    // 返信投稿
    $data['reply_bbs'] = $this->threads_model->get_reply_bbs($thread_id);

    $this->show_view('thread/bbs', $data);
  }

  // 親記事への返信
  public function reply($dirname, $thread_id)
  {
    $session_data = $this->user_session();

    $data['program_bbs'] = $this->threads_model->get_bbs($dirname, $thread_id);

    if($session_data['is_login'] == "1")
    {
      if($this->form_validation->run('reply'))
        {
          $post = $this->input->post();
          $userdata = $this->users_model->check_userdata($post['user_email'], $post['user_password']);
          if($userdata == TRUE)
          {
              $this->threads_model->insert_reply($post, $session_data['user_id']);
              redirect();
          }
          else
          {
              $data['error'] = "ログイン情報が違います。";
          }
        }
      }
      else
      {
        if($this->form_validation->run('treply'))
        {
          $post = $this->input->post();
          $userdata = $this->users_model->check_twitter_userdata($session_data['id_str']);

          if($userdata == TRUE)
          {
              $this->threads_model->insert_reply($post, $session_data['user_id']);
              redirect();
          }
        }
      }
    $this->show_view('thread/reply', $data);
  }

  // 返信投稿への返信
  public function to_reply($dirname, $reply_id)
  {
    $session_data = $this->user_session();

    $data['reply_bbs'] = $this->threads_model->get_one_reply_bbs($reply_id);

    if($session_data['is_login'] == "1")
    {
      if($this->form_validation->run('reply'))
      {
        $post = $this->input->post();
        $userdata = $this->users_model->check_userdata($post['user_email'], $post['user_password']);
        if($userdata == TRUE)
        {
            $this->threads_model->insert_reply($post, $session_data['user_id']);
            redirect();
        }
        else
        {
            $data['error'] = "ログイン情報が違います。";
        }
      }
    }
    else
    {
      if($this->form_validation->run('treply'))
      {
        $post = $this->input->post();
        $userdata = $this->users_model->check_twitter_userdata($session_data['id_str']);
        if($userdata == TRUE)
        {
            $this->threads_model->insert_reply($post, $session_data['user_id']);
            redirect();
        }
      }
    }
      $this->show_view('thread/to_reply', $data);
  }

  private function user_session()
  {
    $data['user_email']   = $this->session->userdata('user_email');
    $data['user_id']      = $this->session->userdata('user_id');
    $data['is_login']     = $this->session->userdata('is_login');
    $data['twitter_name'] = $this->session->userdata('twitter_name');
    $data['id_str']       = $this->session->userdata('id_str');
    
    return $data;
  }
}
