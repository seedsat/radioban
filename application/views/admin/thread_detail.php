<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    スレッド詳細
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover">
                            <?php foreach($thread_detail as $td): ?>
                            <tbody>
                                <tr>
                                    <th>スレッドID</th>
                                    <td><?php echo $td['thread_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>スレッドタイトル</th>
                                    <td><?php echo $td['title']; ?></td>
                                </tr>
                                <tr>
                                    <th>投稿者</th>
                                    <td>
                                        <?php if ($td['user_name'] || $td['twitter_name']): ?>
                                            <a href="<?php echo base_url('admin/users/detail/').$td['user_id']; ?>">
                                            <?php if ($td['user_name'] != NULL): ?>
                                                <?php echo $td['user_name']; ?>
                                            <?php else: ?>
                                                <?php echo $td['twitter_name']; ?>
                                            <?php endif; ?>
                                        </a>
                                        <?php else: ?>
                                            退会済みユーザー
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>投稿内容</th>
                                    <td><?php echo nl2br($td['content']); ?></td>
                                </tr>
                                <tr>
                                    <th>投稿日</th>
                                    <td><?php echo date('Y/n/j H:i:s', strtotime($td['created_at'])); ?></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
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
    <!-- /.row -->
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    返信一覧
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <?php foreach($thread_reply_lists as $trl): ?>
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th>返信投稿ID</th>
                                    <td><?php echo $trl['reply_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>返信スレッドID</th>
                                    <td><?php echo $trl['to_reply_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>返信タイトル</th>
                                    <td><?php echo $trl['reply_title']; ?></td>
                                </tr>
                                <tr>
                                    <th>投稿者</th>
                                    <td>
                                        <?php if ($trl['user_name'] || $trl['twitter_name']): ?>
                                            <a href="<?php echo base_url('admin/users/detail/').$trl['user_id']; ?>">
                                                <?php if ($trl['user_name'] != NULL): ?>
                                                    <?php echo $trl['user_name']; ?>
                                                <?php else: ?>
                                                    <?php echo $trl['twitter_name']; ?>
                                                <?php endif; ?>
                                            </a>
                                        <?php else: ?>
                                            退会済みユーザー
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>返信内容</th>
                                    <td><?php echo nl2br($trl['reply_content']); ?></td>
                                </tr>
                                <tr>
                                    <th>返信日時</th>
                                    <td><?php echo date('Y/n/j H:i:s', strtotime($trl['created_at'])); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->