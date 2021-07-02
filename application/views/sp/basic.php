<div id="mypage-wrapper">
    <!-- 各種データテーブル -->
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="mypagetitle">
                        <h3><?php echo $username; ?>さんのマイページ</h3>
                    </div>
                    <!-- /.panel-heading -->

                    <div class="panel-body">
                        <div class="top-description">
                            <h4>基本データ</h4>
                        </div>
                        <div class="spquestion">
                            <h2>投稿数</h2>
                            <p><?php echo count($user_threads); ?></p>
                        </div>
                        <div class="spquestion">
                            <h2>いいねをした数</h2>
                            <p><?php echo count($user_goods); ?></p>
                        </div>
                        <div class="spquestion">
                            <h2>返信をした数</h2>
                            <p><?php echo count($user_replys); ?></p>
                        </div>
                        <div class="spquestion">
                            <h2>お気に入り番組1</h2>
                            <?php if(!empty($favarite1)): ?>
                                <p><?php echo $favarite1[0]['program_name']; ?></p>
                            <?php else: ?>
                                <p>お気に入り番組が登録されていません。</p>
                            <?php endif; ?>
                        </div>
                        <div class="spquestion">
                            <h2>お気に入り番組2</h2>
                            <?php if(!empty($favarite2)): ?>
                                <p><?php echo $favarite2[0]['program_name']; ?></p>
                            <?php else: ?>
                                <p>お気に入り番組が登録されていません。</p>
                            <?php endif; ?>
                        </div>
                        <div class="spquestion">
                            <h2>お気に入り番組3</h2>
                            <?php if(!empty($favarite3)): ?>
                                <p><?php echo $favarite3[0]['program_name']; ?></p>
                            <?php else: ?>
                                <p>お気に入り番組が登録されていません。</p>
                            <?php endif; ?>
                        </div>
                        <div class="spquestion">
                            <h2>登録日</h2>
                            <p><?php echo date('Y/n/j H:i', strtotime($user_create_data)); ?></p>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->            