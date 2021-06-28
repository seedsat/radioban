<!--div class="users">
    <div class="icon"><i class="fas fa-camera camera"></i></div>
</div-->
<!--div class="users">
    <div class="userimg">
        <img src="<?php echo base_url('public/images/sakura.jpg'); ?>">
    </div>
    <div class="userdesc">
        <h4>【よく聞く番組】</h4>
        <ul>
            <li><?php echo $favarite1[0]['program_name']; ?></li>
            <li><?php echo $favarite2[0]['program_name']; ?></li>
            <li><?php echo $favarite3[0]['program_name']; ?></li>
        </ul>
        <h4>【自己紹介】</h4>
        <p>
            <?php if(!empty($introduction)): ?>
                <?php echo nl2br($introduction); ?></p>
            <?php else: ?>
                自己紹介を書きましょう！
            <?php endif; ?> 
    </div>
</div-->
<!-- maintopic -->
<div class="maintopic">
    <div class="topics">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        放送局一覧
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- 基本データ -->
                            <div class="tab-pane fade in active" id="home">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables02">
                                                    <thead>
                                                        <tr>
                                                            <th>放送局</th>
                                                            <th>URL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($broadcasters as $bc): ?>
                                                        <tr class="odd gradeX">
                                                            <td><?php echo $bc['broadcast_name']; ?></td>
                                                            <td><a href="<?php echo $bc['url']; ?>" target="_blank"><?php echo $bc['url']; ?></a></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                </div>
                            </div>
                            <!-- 基本データ -->
                        </div>
                        <!-- /tab-content -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
</div>
<!-- maintopic -->