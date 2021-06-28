<?php

/* お気にりのモデル */
class Goods_model extends CI_Model {

    // いいねが押されたらDBに挿入
    public function insert_good($data)
    {
        $insert_data = array(
            'user_id'          => $data['user_id'],
            'thread_id'        => $data['thread_id'],
            'good_flag'        => "1",
            'created_at' => date("Y/m/d H:i:s"),
        );
        $this->db->insert('goods', $insert_data);
    }

    // ユーザー毎にいいねしたスレを取得
    public function get_peruser_good($user_id)
    {
        $this->db->join('users', 'goods.user_id = users.user_id');
        $this->db->join('threads', 'goods.thread_id = threads.thread_id');
        $this->db->join('programs', 'threads.program_id = programs.program_id');
        $this->db->where('goods.user_id', $user_id);
        return $this->db->get('goods')->result_array();
    }

    // いいねの削除
    public function delete_good($userid, $thread_id)
    {
        $this->db->where('user_id', $userid);
        $this->db->where('thread_id', $thread_id);
        $this->db->delete('goods');
    }

    // いいね数のカウント
    public function count_good($thread_id)
    {
        $this->db->where('thread_id', $thread_id);
        return $this->db->get('goods')->result_array();
    }

    /* 退会後のgoodテーブルからIDを指定して全て削除 */
    public function delete_after_unsubscribe($userid)
    {
        $this->db->where('user_id', $userid);
        $this->db->delete('goods');
    }

}