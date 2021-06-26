<?php if ( ! defined('BASEPATH')) exit('No direct scriptaccessallowed');

class MY_Form_validation extends CI_Form_validation {

    function MY_validation(){
        parent::CI_validation();
    }

    //ユーザー登録時の名前の重複チェック
    public function valid_name($name)
    {
        $username = $this->CI->users_model->check_username($name);

        if($username)
        {
            $this->set_message('valid_name', 'その名前はすでに登録されています');
            return false;
        }
        return true;
    }

    //ユーザー登録時のアドレス重複チェック
    public function valid_email($email)
    {
        $usermail = $this->CI->users_model->check_email($email);

        if ($usermail){
            $this->set_message('valid_email', 'そのメールアドレスはすでに登録されています');
            return FALSE;
        }
        return TRUE;
    }

    //ユーザーデータが合っているかチェック
    public function valid_userdata($email, $password)
    {
        $userdata = $this->CI->users_model->check_userdata($email, $password);

        if(!$userdata)
        {
            $this->set_message('valid_userdata', 'ユーザー情報が違います');
            return false;
        }
        return true;
    }
}