<?php if ( ! defined('BASEPATH')) exit('No direct scriptaccessallowed');

class Meta_data {

    public function __construct(){
        $this->CI =& get_instance();
    }

    public function meta_data()
    {
        /* titleなどの情報 */
        $this->CI->config->load('front_meta');
        $front_meta = $this->CI->config->item('front_meta');
        $data['seg1'] = ($this->CI->uri->segment('1')) ? $this->CI->uri->segment('1') : 'index';
        $data['seg2'] = ($this->CI->uri->segment('2')) ? $this->CI->uri->segment('2') : 'index';
        /* titleなどの情報 */

        /* 個別番組 */
        if($data['seg1'] === "program")
        {
            $program_meta = $this->CI->config->item('program_meta');
            $dirname = ($this->CI->uri->segment('2')) ? $this->CI->uri->segment('2') : 'index';
            $p_data = $this->CI->program_model->get_boradcaster_program($dirname);
            $data['title']              = $p_data[0]['broadcast_name'];
            $data['program_name']       = $p_data[0]['program_name'];
            $data['broadcast_name']     = $p_data[0]['broadcast_name'];
            $data['program_starttime']  = $p_data[0]['program_starttime'];
            $data['program_finishtime'] = $p_data[0]['program_finishtime'];
            $data['officialsite']       = $p_data[0]['officialsite'];
            $data['mailaddress']        = $p_data[0]['mailaddress'];
            $data['day']                = $p_data[0]['day'];
            $data['url']                = $p_data[0]['url'];
            $data['description']        = $program_meta[$dirname]['description'];
        }
        elseif($data['seg2'] === 'program_bbs') 
        {
            $dirname = ($this->CI->uri->segment('3')) ? $this->CI->uri->segment('3') : 'index';
            $thread_id = ($this->CI->uri->segment('4')) ? $this->CI->uri->segment('4') : '0';
            $b_data = $this->CI->program_model->get_boradcaster_program($dirname);
            $p_data = $this->CI->thread_model->get_program_bbs($dirname, $thread_id);

            $data['thread_title']       = $p_data[0]['title'];
            $data['program_name']       = $b_data[0]['program_name'];
            $data['broadcast_name']     = $b_data[0]['broadcast_name'];
            $data['program_starttime']  = $b_data[0]['starttime'];
            $data['program_finishtime'] = $b_data[0]['finishtime'];
            $data['officialsite']       = $b_data[0]['officialsite'];
            $data['mailaddress']        = $b_data[0]['mailaddress'];
            //$data['day']                = $b_data[0]['day'];
            $data['url']                = base_url().'program/'.$p_data[0]['dir_name'];
            $data['description']        = mb_substr($p_data[0]['content'], 0, 100);
        }
        elseif(preg_match("/^[0-9]+$/", $data['seg1']))
        {
            $data['seg1'] = 'index';
            $data['title'] = $front_meta[$data['seg1']]['title'];
            $data['description'] = $front_meta[$data['seg1']]['description'];
        }
        elseif($data['seg2'] === 'reply')
        {
            $data['title'] = "返信する";
        }
        elseif($data['seg2'] === "to_reply")
        {
            $data['title'] = "返信投稿へ返信する";
        }
        elseif( $data['seg1'] === 'mypage' && ($data['seg2'] === 'mybasic' || $data['seg2'] === 'mypost' || $data['seg2'] === 'mygood' || $data['seg2'] === 'myreply') )
        {
            echo $data['seg2'];
            $userid = ($this->CI->uri->segment('3')) ? $this->CI->uri->segment('3') : '';
            $userdata = $this->CI->users_model->detail_user($userid);
            $data['title'] = $userdata[0]['username'].'さんのマイページ';
            $data['description'] = $userdata[0]['username'].'さんのページです';
        }
        elseif($data['seg1'] === 'mypage')
        {
            $userid = ($this->CI->uri->segment('2')) ? $this->CI->uri->segment('2') : '';
            $userdata = $this->CI->users_model->detail_user($userid);
            $data['title'] = $userdata[0]['username'].'さんのマイページ';
            $data['description'] = $userdata[0]['username'].'さんのページです';
        }
        else
        {
            $data['title'] = $front_meta[$data['seg1']]['title'];
            if(isset($front_meta[$data['seg1']]['description']))
            {
                $data['description'] = $front_meta[$data['seg1']]['description'];
            }
        }

        return $this->data = $data;
    }
}