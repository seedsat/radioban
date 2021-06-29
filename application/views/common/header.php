<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(isset($meta_data['description'])): ?>
      <meta name="description" content="<?php echo $meta_data['description']; ?>">
    <?php else: ?>
      <meta name="description" content="">
    <?php endif; ?>
    <meta name="author" content="">
    <?php if(isset($meta_data['program_name']) && isset($meta_data['title'])): ?>
      <title>ラジボド | <?php echo $meta_data['title']; ?> | <?php echo $meta_data['program_name']; ?></title>
    <?php elseif(isset($meta_data['program_name']) && isset($meta_data['thread_title'])): ?>
      <title>ラジボド | <?php echo $meta_data['program_name']; ?> | <?php echo $meta_data['thread_title']; ?></title>
    <?php else: ?>
      <title>ラジボド | <?php echo $meta_data['title']; ?></title>
    <?php endif;?>

  <meta name="robots" content="noindex">
  <meta name="robots" content="nofollow">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/startmin.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('public/css/privacy.css'); ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/sm-core-css.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/sm-blue.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/metisMenu.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap.min.css') ?>">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/dataTables/dataTables.responsive.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/dataTables/dataTables.bootstrap.css') ?>">

    <!-- font awsome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/font-awesome.min.css') ?>">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  </head>

  <body>
    <div id="wrapper">
      <div id="main">
        <div id="header">
          <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('public/images/header.jpg'); ?>"></a>
        </div><!-- #header -->

        <div id="pankuzu">
          <p>
            <?php if(isset($meta_data['title']) && $meta_data['title'] !== 'TOP'): ?> <a href="<?php echo base_url(''); ?>"> ラジボド</a> >  
              <!-- 放送局 -->
              <?php echo $meta_data['title']; ?>
              <!-- 番組 -->
              <?php if(isset($meta_data['program_name'])): ?> > 
                  <?php echo $meta_data['program_name']; ?>
              <?php endif; ?></a>
            <?php elseif(isset($meta_data['thread_title'])): ?> <a href="<?php echo base_url(''); ?>">ラジボド</a> >
              <a href="<?php if(isset($meta_data['url'])): ?><?php echo $meta_data['url'];  ?><?php endif; ?>"><?php echo $meta_data['program_name']; ?></a> 
              <?php if(isset($meta_data['thread_title'])): ?> > 
                  <?php echo $meta_data['thread_title']; ?>
              <?php endif; ?></a>
            <?php endif; ?>
          </p>
        </div>

        <div class="page-wrapper chiller-theme toggled">
          <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>　OPEN
          </a>
          <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
              <div class="sidebar-brand">
                ラジボド
                <div id="close-sidebar">
                  <i class="fas fa-times"></i>
                </div>
              </div>
              <div class="sidebar-header">
                <div class="user-info">
                  <span class="user-name">
                    <strong>
                      <?php if($is_login == "1" ): ?>
                        <p>こんにちは。<br /><?php echo $user_name; ?>さん。</p>
                      <?php elseif ($is_login == "2"): ?>
                        <p>こんにちは。<br /><?php echo $twitter_username; ?>さん。</p>
                      <?php else: ?>
                        <p>こんにちは。ゲストさん。</p>
                      <?php endif; ?>
                    </strong>
                  </span>
                </div>
              </div>
              <!-- sidebar-header  -->
              <div class="sidebar-search">
                <div>
                  <div class="input-group">
                    <form action="#" method="post" id="search">
                      <input  class="form-control" type="text" name="search" placeholder=" 番組名を検索" id="search-text">
                      <button type="submit" class="search-submit">
                        <i class="fas fa-search"></i>
                      </button>
                  </form>
                  </div>
                </div>
              </div>
              <!-- sidebar-search  -->
              <div class="sidebar-menu">
                <ul>
                  <li class="header-menu">
                    <span>メニュー</span>
                  </li>
                    <?php if($is_login == "1" or $is_login == "2"): ?>
                      <li class="outlink"><a href="<?php echo base_url(''); ?>"><i class="fas fa-home"></i>TOP</a></li>
                      <li class="changelink"><a href="<?php echo base_url('change'); ?>"><i class="fas fa-user-edit"></i>変更・退会</a></li>
                      <li class="outlink"><a href="<?php echo base_url('sign_out'); ?>"><i class="fas fa-sign-out-alt"></i>ログアウト</a></li>
                    <?php else: ?>
                  <li>
                    <a href="<?php echo base_url(''); ?>">
                      <i class="fas fa-home"></i>
                      <span>TOP</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('sign_in'); ?>">
                      <i class="fas fa-sign-in-alt"></i>
                      <span>ログイン</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('sign_up'); ?>">
                      <i class="fas fa-user-plus"></i>
                      <span>新規登録</span>
                    </a>
                  </li>
                <?php endif; ?>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fas fa-podcast"></i>
                      <span>番組関連</span>
                    </a>
                    <div class="sidebar-submenu submenu">
                      <ul>
                        <li>
                          <a href="<?php echo base_url('broadcaster'); ?>">放送局一覧</a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('all_programs'); ?>">番組一覧</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- sidebar-menu  -->
            </div>
          </nav>
        </div>
        <!-- page-wrapper -->