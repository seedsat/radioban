<?php
//フォームバリデーション
$config = array(
	/**
	 * user関連
	 */
	//ログイン画面
	'sign_in' => array(
		array(
				'field' => 'user_email',
				'label' => 'メールアドレス',
				'rules' => 'required'
		),
		array(
				'field' => 'user_password',
				'label' => 'ログインパスワード',
				'rules' => 'required'
		),
		),
			//会員登録
		'sign_up' => array(
		array(
				'field' => 'user_name',
				'label' => '名前',
				'rules' => 'required|valid_name'
		),
		array(
				'field' => 'user_email',
				'label' => 'メールアドレス',
				'rules' => 'required|valid_email'
		),
		array(
				'field' => 'user_password',
				'label' => 'パスワード',
				'rules' => 'required'
		),
	),

	
	//投稿
	'post' => array(
		array(
				'field' => 'thread_title',
				'label' => 'タイトル',
				'rules' => 'required'
		),
		array(
				'field' => 'user_password',
				'label' => 'パスワード',
				'rules' => 'required'
		),
		array(
				'field' => 'thread_content',
				'label' => '投稿内容',
				'rules' => 'required'
		),
	),
	// twitterアカウント投稿
	'tpost' => array(
		array(
				'field' => 'thread_title',
				'label' => 'タイトル',
				'rules' => 'required'
		),
		array(
				'field' => 'thread_content',
				'label' => '投稿内容',
				'rules' => 'required'
		),
	),
	// 問い合わせ
	'contact' => array(
		array(
				'field' => 'user_name',
				'label' => 'ラジオネーム',
				'rules' => 'required'
		),
		array(
				'field' => 'user_email',
				'label' => 'メールアドレス',
				'rules' => 'required'
		),
		array(
				'field' => 'contents',
				'label' => '質問内容',
				'rules' => 'required'
		),
	),
	//返信投稿
	'reply' => array(
		array(
				'field' => 'reply_title',
				'label' => '返信タイトル',
				'rules' => 'required'
		),
		array(
				'field' => 'user_password',
				'label' => 'パスワード',
				'rules' => 'required'
		),
		array(
				'field' => 'reply_content',
				'label' => '返信投稿',
				'rules' => 'required'
		),
	),
	// twitterアカウントでの返信
	'treply' => array(
		array(
				'field' => 'reply_title',
				'label' => '返信タイトル',
				'rules' => 'required'
		),
		array(
				'field' => 'reply_content',
				'label' => '返信投稿',
				'rules' => 'required'
		),
	),
	//パスワード再設定
	'forget_pass_rest' => array(
		array(
				'field' => 'useremail',
				'label' => 'メールアドレス',
				'rules' => 'required'
		),
		array(
				'field' => 'newpassword',
				'label' => 'パスワード',
				'rules' => 'required'
		),
		array(
				'field' => 'confirmpassword',
				'label' => 'パスワード（確認)',
				'rules' => 'required'
		),
	),
	// 会員情報の変更
	'change' => array(
		array(
				'field' => 'username',
				'label' => 'ラジオネーム',
				'rules' => 'required'
		),
		array(
				'field' => 'useremail',
				'label' => 'メールアドレス',
				'rules' => 'required'
		),
	),
	/* login */
	// login
	'admin_login' => array(
		array(
				'field' => 'login_id',
				'label' => 'ログインID',
				'rules' => 'required'
		),
		array(
				'field' => 'login_pw',
				'label' => 'パスワード',
				'rules' => 'required'
		),
	),
	// 番組の追加
	'add' => array(
		array(
				'field' => 'program_name',
				'label' => '番組名',
				'rules' => 'required'
		),
		array(
				'field' => 'dir_name',
				'label' => 'ディレクトリ名',
				'rules' => 'required'
		),
		array(
				'field' => 'program_starttime',
				'label' => '開始時間',
				'rules' => 'required'
		),
		array(
				'field' => 'program_finishtime',
				'label' => '終了時間',
				'rules' => 'required'
		),
		array(
				'field' => 'officialsite',
				'label' => 'サイトURL',
				'rules' => 'required'
		),
		array(
				'field' => 'mailaddress',
				'label' => 'メールアドレス',
				'rules' => 'required'
		),
	),
);
?>