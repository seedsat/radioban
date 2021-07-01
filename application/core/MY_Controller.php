<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * MY_Controller
 * @since   Version 0.0.1
 * */
class MY_Controller extends CI_Controller {

  public $data;

  /**
   * constructor
   *
   * @return  void
   */
  public function __construct()
  {
    parent::__construct();
    $data = $this->data;
  }

  /**
   * header、footerを付けてview表示
   *
   * @param   string
   * @param   array
   * @return  void
   */
  protected function show_view($view, $data = NULL)
  {
    $data['meta_data'] = $this->meta_data->meta_data();

    /* セッション情報 */
    $data['user_name']    = $this->session->userdata('user_name');
    $data['user_id']      = $this->session->userdata('user_id');
    $data['is_login']     = $this->session->userdata('is_login');
    $data['twitter_name'] = $this->session->userdata('name');

    if(isset($data['user_id']))
    {
        $data['user_data']  = $this->users_model->detail_user($data['user_id']);
        $data['user_name']  = $data['user_data'][0]['user_name'];
        $data['user_email'] = $data['user_data'][0]['user_email'];
    }
    /* セッション情報 */
    if($this->agent->is_mobile())
    {
        $this->load->view('common/sp/header', $data);
        $this->load->view('sp/'.$view, $data);
        $this->load->view('common/sp/footer');
    }
    else
    {
        $this->load->view('common/header', $data);
        $this->load->view($view, $data);
        $this->load->view('common/footer');
    }
  }
}