<?php
defined('BASEPATH') or exit('No direct script access allowed');

require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

class Oauth extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    define('CONSUMER_KEY', 'TLRSBenbmjIG5I6b4p3nXZth0');
    define('CONSUMER_SECRET', 'KZYcgTWEFviXgG9l70wnpAFb1ljgD8yrcauYEyP1lXHSwvctkL');
    /* callbachURLをtwitter developで指定する */
    define('OAUTH_CALLBACK', 'http://xs291437.xsrv.jp/radio-board/oauth/twitter_callback');
  }

  public function twitter()
  {
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
    /* アクセスするたびにランダムで生成されるトークン */
    $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));

    $this->session->set_userdata('oauth_token', $request_token['oauth_token']);
    $this->session->set_userdata('oauth_token_secret', $request_token['oauth_token_secret']);

    $url = $connection->url('oauth/authenticate', array('oauth_token' => $request_token['oauth_token']));
    redirect($url);
  }

  public function twitter_callback()
  {
    $session = $this->session->userdata();

    $q = $this->input->get(null, true);
    $request_token = array();
    $request_token['oauth_token'] = $session['oauth_token'];
    $request_token['oauth_token_secret'] = $session['oauth_token_secret'];

    if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
        die('Error!');
    }

    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);

    /* ユーザー毎に与えられるトークン */
    $access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $q['oauth_verifier']));

    /* access_tokenからユーザー情報を取得 */
    $user_connect = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
    $user_info = $user_connect->get('account/verify_credentials');

    $this->session->set_userdata('access_token', $access_token);
    $this->session->set_userdata('name', $user_info->name);

    /* access_tokenから取得したtwitterデータ */
    $twitter_user_data = array(
      'id_str'       => $user_info->id_str,
      'name'         => $user_info->name,
      'screen_name'  => $user_info->screen_name,
    );

    /* DBにデータが登録されているか検索 */
    $userdata = $this->users_model->search_twitter_user($twitter_user_data);

    if(empty($userdata))
    {
      /* データがなければインサートしてログインしてhomeにリダイレクト */
      $this->users_model->insert_twitter_user($twitter_user_data);
      $this->users_model->twitter_userlogin($twitter_user_data['id_str']);
    }
    elseif(!empty($userdata) && $twitter_user_data['name'] != $userdata[0]['twitter_username'] || $twitter_user_data['screen_name'] != $userdata[0]['screen_name'] )
    {
      /* twitterの名前とアカウント名が違えばアップデートしてhomeにリダイレクト */
      $this->users_model->update_twitter_user($twitter_user_data);
      $this->users_model->twitter_userlogin($userdata[0]['id_str']);
    }
    else
    {
      /* $twitter_user_dataが同じであればログインしてhomeへ */
      $this->users_model->twitter_userlogin($userdata[0]['id_str']);
    }
    session_regenerate_id();
    redirect('');
  }

  /* 投稿のツイート */
  public function post_tweet($dir_name, $thread_id)
  {
    $session = $this->session->userdata('access_token');

    $access_token = $session['oauth_token'];
    $access_token_secret = $session['oauth_token_secret'];

    $twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);

    /* 投稿データを取得 */
    $thread = $this->threads_model->get_bbs($dir_name, $thread_id);

    /* 投稿のURL */
    $url = "http://xs291437.xsrv.jp/radio-board/thread/bbs/" . $thread[0]['dir_name'] . '/' . $thread[0]['thread_id'];

    /* limitの文字数を超えたら・・・で代用 */
    $limit = "50";
    $content = $thread[0]['content'];
    if(mb_strlen($content) > $limit)
    {
        $content = mb_substr($content, 0, $limit);
        $content = $content . "...";
    }

    /* tweet文の生成 */
    $tweet = "【ラジボド】\n" . $thread[0]['program_name'] . "【" . $content . "】の投稿に返信しましょう\n" . $url;

    $result = $twitter->post(
        "statuses/update",
        array("status" => $tweet)
    );

    /* 同じツイートは連続して投稿は不可能 */
    /* ツイートが成功したらhomeにリダイレクト */
    if($twitter->getLastHttpCode() == 200) {
        // ツイート成功
        redirect('');
    } else {
        // ツイート失敗
        print "失敗";
    }
  }
}