<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ユーザー一覧
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ユーザーID</th>
                                    <th>ユーザー名</th>
                                    <th>ユーザーアドレス</th>
                                    <th>詳細</th>
                                    <th>削除</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($all_users as $user): ?>
                                <tr class="even gradeC">
                                    <td><?php echo $user['user_id']; ?></td>
                                    <td>
                                        <?php if ($user['user_name']): ?>
                                            <?php echo $user['user_name']; ?>
                                        <?php else: ?>
                                            <?php echo $user['twitter_name']; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($user['user_email']): ?>
                                            <?php echo $user['user_email']; ?>
                                        <?php else: ?>
                                            Twitterで登録
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="<?php echo base_url('admin/users/detail/').$user['user_id']; ?>"><button class="btn btn-primary" type="button">詳細</button></a></td>
                                    <td><a href="<?php echo base_url('admin/users/delete/').$user['user_id']; ?>"><button class="btn btn-danger" type="button" onClick="return confirm('削除していいですか？');">削除</button></a></td>
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
<!-- /#page-wrapper -->