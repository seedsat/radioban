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
        define('CONSUMER_KEY', '2XsNg9FXanqp4Wb6lX1Q5P0wH');
        define('CONSUMER_SECRET', '6TLppf69TQqHxyTQiWNzChgghvUi0TB6QMLTbOrzs3tX7czG6F');
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
