<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ラジボド管理画面</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('public/css/admin/') ?>bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('public/css/admin/') ?>metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url('public/css/admin/') ?>timeline.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="<?php echo base_url('public/css/admin/') ?>dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('public/css/admin/') ?>startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('public/css/admin/') ?>morris.css" rel="stylesheet">

        <link href="<?php echo base_url('public/css/admin/') ?>add.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('public/css/admin/') ?>font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">ラジボド管理画面</a>
                </div>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <!--input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span-->
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin'); ?>" class="active"><i class="fas fa-home"></i> TOP</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/users'); ?>"><i class="fas fa-address-card"></i> ユーザー情報</a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-podcast"></i> 番組関連<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_urL('admin/programrelated/broadcasters'); ?>">放送局一覧</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_urL('admin/programrelated/programs_lists'); ?>">番組一覧</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/programrelated/thread_lists'); ?>"><i class="fas fa-comment-alt"></i> 投稿一覧</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/programrelated/add_program'); ?>"><i class="fas fa-plus-circle"></i> 番組追加</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/contact/all_contacts'); ?>"><i class="far fa-envelope"></i> 問い合わせ</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/login/logout'); ?>" class="active"><i class="fas fa-sign-out-alt"></i> ログアウト</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
