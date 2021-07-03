<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ユーザー詳細
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover">
                            <?php foreach($user_details as $user): ?>
                            <tbody>
                                <tr>
                                    <th>ユーザーID</th>
                                    <td><?php echo $user['user_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>氏名</th>
                                    <td><?php echo $user['user_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>メールアドレス</th>
                                    <td><?php echo $user['user_email']; ?></td>
                                </tr>
                                <tr>
                                    <th>登録日</th>
                                    <td><?php echo date('Y/n/j H:i:s', strtotime($user['created_at'])); ?></td>
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
</div>
<!-- /#page-wrapper -->