<!DOCTYPE html>
<html lang="en">
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
        <link href="<?php echo base_url('public/css/sp/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/sp/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/sp/meanmenu.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/sp/accordion.css'); ?>" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('public/css/sp/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('public/css/sp/metisMenu.min.css'); ?>" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="<?php echo base_url('public/css/sp/dataTables/dataTables.bootstrap.css'); ?>" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url('public/css/sp/dataTables/dataTables.responsive.css'); ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('public/css/sp/startmin.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('public/css/sp/postscript.css'); ?>" rel="stylesheet">

        <!-- font awsome -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <script src="<?php echo base_url('public/js/sp/jquery-3.2.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/sp/jquery.meanmenu.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/sp/navi.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/sp/toggle.js'); ?>"></script>
    </head>


    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- /.navbar-top-links -->
                <div id="header_sub"><h4>〜ラジオ好きが集まる掲示板〜</h4></div>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <?php if($is_login == "1"): ?>
                                <li><a href="#">こんにちは【<?php echo $username; ?>】さん</a></li>
                            <?php elseif ($is_login == "2"): ?>
                                <li><a href="#">こんにちは【<?php echo $twitter_name; ?>】さん</a></li>
                            <?php else: ?>
                                <li><a href="#">こんにちはゲストさん</a></li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo base_url(''); ?>"><i class="fas fa-home"></i> TOP</a>
                            </li>
                            <?php if($is_login == NULL):?>
                                <li>
                                    <a href="<?php echo base_url('sign_up'); ?>"><i class="fas fa-user-plus"></i> 新規登録</a>
                                    <!-- /.nav-second-level -->
                                </li>
                                <li>
                                    <a href="<?php echo base_url('sign_in'); ?>"><i class="fas fa-sign-in-alt"></i> ログイン</a>
                                    <!-- /.nav-second-level -->
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="#"><i class="fas fa-podcast"></i> <span class="fa arrow"></span>番組関連</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url('broadcaster'); ?>">放送局一覧</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('all_programs'); ?>">番組一覧</a>                                    
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <?php if($is_login >= 1):?>
                                <li>
                                    <a href="<?php echo base_url('thread/newpost'); ?>"><i class="fas fa-edit"></i> 新規投稿</a>
                                </li>
                            <?php endif; ?>
                            <?php if($is_login >= 1):?>
                                <li>
                                    <a href="<?php echo base_url('sign_out'); ?>"><i class="fas fa-sign-out-alt"></i> ログアウト</a>
                                    <!-- /.nav-second-level -->
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>