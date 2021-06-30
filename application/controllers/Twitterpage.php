<?php
defined('BASEPATH') or exit('No direct script access allowed');

require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

  class Twitterpage extends MY_Controller
  {
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('url');
    define('CONSUMER_KEY', 'cYIkSKlvhmr4oHC8IyE2Gsx13');
    define('CONSUMER_SECRET', 'gmPJ1D52vf9LP2NI9uXmWppFkda7UxecAPxsEwpMpwpM1ZUwij');
  }

  public function index()
  {
    //twitter認証
    $consumerKey       = CONSUMER_KEY;
    $consumerSecret    = CONSUMER_SECRET;
    $accessToken       = $_SESSION['access_token']['oauth_token'];
    $accessTokenSecret = $_SESSION['access_token']['oauth_token_secret'];

    //TwitterOAuth認証
    // require_once 'twitteroauth/twitterOAuth.php';
    $connection  = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

    // ・自身の情報取得
    $account_settings = $connection->get("account/settings");
    var_dump($account_settings);

    var_dump($this->session->userdata['name']);
  }
}
