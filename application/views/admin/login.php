<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ログイン</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('public/css/admin/') ?>bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('public/css/admin/') ?>metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('public/css/admin/') ?>startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('public/css/admin/') ?>font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <?php if(isset($error)): ?>
                                <span style="color:red;"><?php echo $error; ?></span>
                            <?php endif; ?>
                            <h3 class="panel-title">ログイン</h3>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo base_url('admin/login'); ?>" method="post">
                                <div class="form-group">
                                    <span style="color:red;"><?php echo form_error('login_id'); ?></span>
                                    <input class="form-control" placeholder="ID" name="login_id" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <span style="color:red;"><?php echo form_error('login_pw'); ?></span>
                                    <input class="form-control" placeholder="Password" name="login_pw" type="password" value="">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="ログインする"></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url('public/js/admin/') ?>jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('public/js/admin/') ?>bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('public/js/admin/') ?>metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('public/js/admin/') ?>startmin.js"></script>

    </body>
</html>
