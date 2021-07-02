<div id="mypage-wrapper">
    <!-- 各種データテーブル -->
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="topititle">
                        <img src="<?php echo base_url('public/images/'); ?>radio.png"><h3>返信一覧</h3>
                    </div>
                    <!-- /.panel-heading -->

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>番組名</th>
                                        <th>返信した投稿</th>
                                        <th>投稿日時</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($user_replys as $key => $ureply): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $key+1; ?></td>
                                        <td><a href="<?php echo base_url('program/').$ureply['dir_name']; ?>" target="_blank"><?php echo $ureply['program_name']; ?></a></td>
                                        <td><a href="<?php echo base_url('thread/program_bbs//').$ureply['dir_name'].'/'.$ureply['thread_id']; ?>" target="_blank"><?php echo $ureply['thread_title']; ?></a></td>
                                        <td><?php echo date('Y/n/j H:i', strtotime($ureply['reply_create_date'])); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
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