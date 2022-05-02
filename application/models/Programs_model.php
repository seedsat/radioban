<?php

/* 番組関連のモデル */
class Programs_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    // 全放送局の取得
    public function get_broadcaster()
    {
        $this->db->order_by('broadcast_id', 'asc');
        return $this->db->get('broadcasts')->result_array();
    }

    // 番組を取得
    public function get_program()
    {
        $this->db->join('broadcasts', 'broadcasts.broadcast_id = programs.broadcast_id');
        $this->db->join('days', 'days.id = programs.day_id');
        $this->db->join('timezones', 'timezones.id = programs.timezone_id');
        // $this->db->order_by('programs.id', 'asc');
        // $this->db->order_by('programs.id', 'asc');
        // $this->db->order_by('programs.id', 'asc');

        return $this->db->get('programs')->result_array();
    }

    // 放送局と個別番組名を取得
    public function get_boradcaster_program($dirname)
    {
        $this->db->select('program_id');
        $this->db->select('program_name');
        $this->db->select('broadcast_name');
        $this->db->select('dir_name');
        $this->db->select('day_id');
        $this->db->select('starttime');
        $this->db->select('finishtime');
        $this->db->select('officialsite');
        $this->db->select('mailaddress');
        $this->db->select('day_name');
        $this->db->select('broadcast_name');
        $this->db->select('timezones.name');
        $this->db->select('url');
        $this->db->join('broadcasts', 'broadcasts.broadcast_id = programs.broadcast_id');
        $this->db->join('days', 'days.id = programs.day_id');
        $this->db->join('timezones', 'timezones.id = programs.timezone_id');
        $this->db->where('dir_name', $dirname);
        return $this->db->get('programs')->result_array();
    }

    // 番組名検索
    public function search_program($str)
    {
        $this->db->like('program_name', $str['search']);
        return $this->db->get('programs')->result_array();
    }

    /* 放送局別の番組名取得 */
    public function get_broadcast_programs($broadcast_id)
    {
        $this->db->join('programs', 'broadcasts.broadcast_id = programs.broadcast_id', 'left');
        $this->db->where('broadcasts.broadcast_id', $broadcast_id);
        return $this->db->get('broadcasts')->result_array();
    }

    /* 放送曜日をdaysテーブルから取得 */
    public function get_days()
    {
        return $this->db->get('days')->result_array();
    }

    /* 時間帯をtimezoneテーブルから取得 */
    public function get_timezone()
    {
        return $this->db->get('timezones')->result_array();
    }

    /* 番組情報を追加 */
    public function insert_program($data)
    {
        $insert_data = array(
            'program_name' => $data['program_name'],
            'dir_name'     => $data['dir_name'],
            'day_id'       => $data['program_day'],
            'broadcast_id' => $data['broadcast_id'],
            'timezone_id'  => $data['timezone_id'],
            'starttime'    => $data['program_starttime'],
            'finishtime'   => $data['program_finishtime'],
            'officialsite' => $data['officialsite'],
            'mailaddress'  => $data['mailaddress'],
        );
        $this->db->insert('programs', $insert_data);
    }
/**aaaaaa */
    /* 番組情報の変更 */
    public function change_program_information($data)
    {
        $change_data = array(
            'program_name'       => $data['program_name'],
            'dir_name'           => $data['dir_name'],
            'program_day'        => $data['program_day'],
            'broadcast_id'       => $data['broadcast_id'],
            'timezone_id'        => $data['timezone_id'],
            'program_starttime'  => $data['program_starttime'],
            'program_finishtime' => $data['program_finishtime'],
            'officialsite'       => $data['officialsite'],
            'mailaddress'        => $data['mailaddress'],
        );
        $this->db->where('program_id', $data['program_id']);
        $this->db->update('programs', $change_data);
    }

    public function insert($data)
    {
        foreach ($data as $dt) {
            $this->db->insert('programs', $dt);
        }
    }

    public function insertbc($data)
    {
        foreach ($data as $dt) {
            $this->db->insert('broadcaster', $dt);
        }
    }
}