<div id="page-wrapper">
    <div class="container-fluid">   
        <div class="row" style="margin-top:100px;">
            <!-- /.col-lg-8 -->
            <div class="col-lg-4" style="width:100%;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i> お知らせ
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <i class="fas fa-address-card"></i> 
                                <?php if(empty($count_user)): ?>
                                    新規登録はありません。
                                <?php else: ?>
                                    <?php echo $count_user; ?>人の新規登録がありました。
                                <?php endif; ?>
                                <!--span class="pull-right text-muted small"><em>12 minutes ago</em></span-->
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-comment fa-fw"></i> 
                                <?php if(empty($count_post)): ?>
                                    新規投稿はありません。
                                <?php else: ?>
                                    <?php echo $count_post; ?>件の新規投稿があります。
                                <?php endif; ?>
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fas fa-comment-alt"></i> 
                                <?php if(empty($count_reply)): ?>
                                    新規返信はありません。
                                <?php else: ?>
                                    <?php echo $count_reply; ?>件の返信投稿があります。
                                <?php endif; ?>
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="far fa-envelope"></i> 
                                <?php if(empty($count_contact)): ?>
                                    問い合わせはありません。
                                <?php else: ?>
                                    <?php echo $count_contact; ?>件の新規問い合わせがあります。
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- /.list-group -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->