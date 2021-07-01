<?php

/* 投稿関連のモデル */
class Threads_model extends CI_Model {

    // 投稿記事の挿入
    public function insert_post_content($data, $user_id = null)
    {
        $insert_data = array(
            'user_id'      => $data['userid'] ? $data['userid'] : $user_id,
            'broadcast_id' => $data['broadcast_id'],
            'program_id'   => $data['program_id'],
            'title'        => $data['thread_title'],
            'content'      => $data['thread_content'],
            'created_at'   => date("Y/m/d H:i:s"),
        );
        $this->db->insert('threads', $insert_data);
    }

    // 全投稿数の取得
    public function get_all_thread()
    {
        $this->db->join('programs', 'threads.program_id = programs.program_id');
        return $this->db->get('threads')->result_array();
    }

    // user_idで指定して投稿記事を取得 */
    public function get_user_thread($user_id)
    {
        $this->db->join('programs', 'threads.program_id = programs.program_id');
        $this->db->where('user_id', $user_id);
        return $this->db->get('threads')->result_array();
    }

    // TOPに表示させるための取得
    public function get_detail_thread($per_page, $offset)
    {
        $this->db->select('program_name');
        $this->db->select('dir_name');
        $this->db->select('user_name');
        $this->db->select('threads.thread_id');
        $this->db->select('title');
        $this->db->select('content');
        $this->db->select('threads.created_at');
        $this->db->select('threads.user_id');
        $this->db->from('threads');
        $this->db->join('users', 'threads.user_id = users.user_id', 'left');
        $this->db->join('broadcasts', 'threads.broadcast_id = broadcasts.broadcast_id', 'left');
        $this->db->join('programs', 'threads.program_id = programs.program_id', 'left');
        $this->db->order_by('threads.thread_id', 'desc');
        $this->db->limit($per_page, $offset);
        return $this->db->get()->result_array();
    }

    // 番組別に投稿を取得
    public function get_individual_program($dirname, $per_page, $offset)
    {
      $this->db->select('program_name');
      $this->db->select('dir_name');
      $this->db->select('thread_id');
      $this->db->select('title');
      $this->db->select('day_name');
      $this->db->select('threads.created_at');
      $this->db->join('threads', 'threads.program_id = programs.program_id');
      $this->db->join('days', 'days.id = programs.day_id');
      $this->db->where('dir_name', $dirname);
      $this->db->limit($per_page, $offset);
      return $this->db->get('programs')->result_array();
    }

    // 番組別投稿の件数を取得
    public function get_individual_program_count($dirname)
    {
        $this->db->join('threads', 'programs.program_id = threads.program_id');
        $this->db->where('dir_name', $dirname);
        return count($this->db->get('programs')->result_array());
    }

    // 親投稿IDで指定した親記事の取得
    public function get_bbs($dirname, $thread_id)
    {
        $this->db->select('threads.thread_id');
        $this->db->select('users.user_email');
        $this->db->select('users.user_name');
        $this->db->select('title');
        $this->db->select('content');
        $this->db->select('threads.created_at');
        $this->db->select('programs.program_name');
        $this->db->select('programs.program_id');
        $this->db->select('dir_name');
        $this->db->select('users.user_id');
        $this->db->join('programs', 'threads.program_id = programs.program_id', 'left');
        $this->db->join('users', 'threads.user_id = users.user_id', 'left');
        $this->db->where('dir_name', $dirname);
        $this->db->where('threads.thread_id', $thread_id);
        return $this->db->get('threads')->result_array();
    }

    // 親投稿ID返信した投稿を取得
    public function get_reply_bbs($thread_id)
    {
        $this->db->select('reply_id');
        $this->db->select('reply_title');
        $this->db->select('reply_content');
        $this->db->select('replies.thread_id');
        $this->db->select('to_reply_id');
        $this->db->select('replies.created_at');
        $this->db->select('user_name');
        $this->db->join('threads', 'replies.thread_id = threads.thread_id');
        $this->db->join('users', 'replies.reply_user_id = users.user_id');
        $this->db->join('programs', 'replies.program_id = programs.program_id');
        $this->db->where('replies.thread_id', $thread_id);
        return $this->db->get('replies')->result_array();
    }

    // 返信IDから個別返信投稿を取得
    public function get_one_reply_bbs($reply_id)
    {
      $this->db->select('reply_id');
      $this->db->select('reply_title');
      $this->db->select('reply_content');
      $this->db->select('replies.thread_id');
      $this->db->select('to_reply_id');
      $this->db->select('program_id');
      $this->db->select('replies.created_at');
      $this->db->select('user_name');
      $this->db->join('users', 'replies.reply_user_id = users.user_id');
      $this->db->where('reply_id', $reply_id);
      return $this->db->get('replies')->result_array();
  }

    // 返信投稿の挿入
    public function insert_reply($data, $user_id)
    {
    $insert_data = array(
      'reply_title'       => $data['reply_title'],
      'reply_content'     => $data['reply_content'],
      'thread_id'         => $data['thread_id'],
      'reply_user_id'     => $user_id,
      'to_reply_id'       => $data['to_reply_id'] ? $data['to_reply_id'] : $data['thread_id'],
      'program_id'        => $data['program_id'],
      'created_at'        => date("Y/m/d H:i:s"),
    );
    $this->db->insert('replies', $insert_data);
    }

    // 親投稿に返信をした投稿への返信を取得
    public function get_to_reply($thread_id)
    {
        $this->db->select('to_reply_id');
        $this->db->select('to_reply_title');
        $this->db->select('to_reply_content');
        $this->db->select('reply_id');
        $this->db->select('to_reply_create_date');
        $this->db->select('username');
        $this->db->join('users', 'users.user_id = to_replies.to_reply_user_id');
        $this->db->where('to_replies.thread_id', $thread_id);
        return $this->db->get('to_reply')->result_array();
    }

    // ユーザーIDを指定して返信投稿を取得
    public function get_user_reply($user_id)
    {
        $this->db->select('replies.reply_id');
        $this->db->select('replies.reply_title');
        $this->db->select('replies.created_at');
        $this->db->select('threads.thread_id');
        $this->db->select('threads.title');
        $this->db->select('programs.program_id');
        $this->db->select('programs.program_name');
        $this->db->select('programs.dir_name');
        $this->db->join('users', 'users.id = replies.reply_user_id', 'left');
        $this->db->join('threads', 'replies.thread_id = threads.thread_id', 'left');
        $this->db->join('programs', 'replies.program_id = programs.program_id', 'left');
        $this->db->where('reply_user_id', $user_id);
        return $this->db->get('replies')->result_array();
    }

    // スレッドID毎の返信数の取得
    public function count_reply($thread_id)
    {
        $this->db->where('thread_id', $thread_id);
        return $this->db->get('replies')->result_array();
    }

    /* 退会したらthreadテーブルにデータがあれば削除 */
    public function delete_thread($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('thread');
    }

    /* ユーザーIDで退会後に削除 */
    public function delete_reply($user_id)
    {
        $this->db->where('reply_user_id', $user_id);
        $this->db->delete('replies');
    }

    /* $logintime間に投稿された数 */
    public function get_logintime_post($login_time)
    {
        $this->db->where('create_date <', $login_time[0]['create_date']);
        $this->db->where('create_date >', $login_time[1]['create_date']);
        return $this->db->get('thread')->result_array();
    }

    /* $logintime間に返信された数 */
    public function get_login_time_reply($login_time)
    {
        $this->db->where('reply_create_date <', $login_time[0]['create_date']);
        $this->db->where('reply_create_date >', $login_time[1]['create_date']);
        return $this->db->get('replies')->result_array();
    }
}