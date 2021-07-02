<div id="page-wrapper">
    <div class="top-description">
        <h4><?php echo $username; ?>さんのマイページ</h4>
    </div>
    <div class="topitop">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fas fa-address-card fa-5x"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('mypage/mybasic/').$user_id; ?>">
                        <div class="panel-footer">
                            <span class="pull-left">基本データへ</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fas fa-comment fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo count($user_threads); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('mypage/mypost/').$user_id; ?>">
                        <div class="panel-footer">
                            <span class="pull-left">投稿一覧へ</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fas fa-thumbs-up fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo count($user_goods); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('mypage/mygood/').$user_id; ?>">
                        <div class="panel-footer">
                            <span class="pull-left">いいね一覧へ</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fas fa-reply-all fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo count($user_replys); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('mypage/myreply/').$user_id; ?>">
                        <div class="panel-footer">
                            <span class="pull-left">返信一覧へ</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-exchange-alt fa-5x"></i>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('change'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left">会員情報変更・退会・パスワードを忘れた</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>