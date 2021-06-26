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
                    <div class="header-text">
                        <?php if($is_login == "1" or $is_login == "2"): ?>
                            <p>こんにちは。<?php echo $username; ?>さん。</p>
                        <?php else: ?>
                            <p>こんにちは。ゲストさん。</p>
                        <?php endif; ?>
                        <ul>
                            <?php if($is_login == "1" or $is_login == "2"): ?>
                                <li class="pagelink"><a href="<?php echo base_url('mypage/').$user_id; ?>">マイページへ</a></li>
                                <li class="changelink"><a href="<?php echo base_url('change'); ?>">変更・退会</a></li>
                                <li class="outlink"><a href="<?php echo base_url('logout'); ?>">ログアウト</a></li>
                                <li class="outlink"><a href="<?php echo base_url(''); ?>">TOP</a></li>
                            <?php else: ?>
                                <li class="login"><a href="<?php echo base_url('login'); ?>">ログイン・新規登録</a></li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- .header-text -->
                    <?php if($is_login == "1" or $is_login == "2"): ?>
                        <div class="login-header-search">
                    <?php else: ?>
                        <div class="header-search">
                    <?php endif; ?>
                    
                        <form action="#" method="post">
                            <input type="text" name="search" placeholder=" 番組名を検索" id="search-text">
                            <button type="submit" class="search-submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div><!-- .header-search -->
                </div><!-- #header -->

                <div id="pankuzu">
                    <!--p><a href="<?php echo base_url(); ?>">ラジボド</a> <?php if($meta_data['title'] !== 'TOP'): ?> > <a href="<?php if(isset($url)): ?><?php echo $url;  ?><?php endif; ?>" target="_blank"><?php echo $meta_data['title']; ?></a> <?php if(isset($meta_data['program_name'])): ?> > <?php echo $meta_data['program_name']; ?><?php endif; ?></a><?php endif; ?></p-->
                    <p><a href="<?php echo base_url(); ?>">ラジボド</a> 
                        <?php if(isset($meta_data['title']) && $meta_data['title'] !== 'TOP'): ?> > 
                            <!-- 放送局 -->
                            <?php echo $meta_data['title']; ?>
                            <!-- 番組 -->
                            <?php if(isset($meta_data['program_name'])): ?> > 
                                <?php echo $meta_data['program_name']; ?>
                            <?php endif; ?></a>
                        <?php elseif(isset($meta_data['thread_title'])): ?> >
                            <a href="<?php if(isset($meta_data['url'])): ?><?php echo $meta_data['url'];  ?><?php endif; ?>"><?php echo $meta_data['program_name']; ?></a> 
                            <?php if(isset($meta_data['thread_title'])): ?> > 
                                <?php echo $meta_data['thread_title']; ?>
                            <?php endif; ?></a>
                        <?php endif; ?>
                    </p>
                </div>

                <div class="navi">
                <!-- Sample menu definition -->
                  <ul id="main-menu" class="sm sm-blue">
                    <?php foreach($programs as $broadcast => $program): ?>
                        <?php foreach($broadcaster as $bc): ?>
                        <li>
                            <?php if($broadcast === $bc['broadcast_name']): ?>
                                <a href="<?php echo $bc['url'] ?>" target="_blank"><?php echo $broadcast; ?></a>
                            <? endif;?>
                            <ul>
                                <?php foreach($program as $time => $prog): ?>
                                <li><a href="#"><?php echo $time; ?></a>
                                    <ul>
                                        <?php foreach($prog as $pg): ?>
                                            <li><a href="<?php echo base_url('/program/').$pg['dir_name']; ?>"><?php echo $pg['program_name']; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                  </ul>
                </div><!-- navi -->
