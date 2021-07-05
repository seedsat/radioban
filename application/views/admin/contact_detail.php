<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    問い合わせ詳細
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover">
                            <?php foreach($contact_detail as $cd): ?>
                            <tbody>
                                <tr>
                                    <th>問い合わせID</th>
                                    <td><?php echo $cd['contact_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>問い合わせ件名</th>
                                    <td><?php echo $cd['title']; ?></td>
                                </tr>
                                <tr>
                                    <th>問い合わせ内容</th>
                                    <td><?php echo $cd['contents']; ?></td>
                                </tr>
                                <tr>
                                    <th>問い合わせ者</th>
                                    <td><a href="<?php echo base_url('admin/users/detail/').$cd['user_id']; ?>"><?php echo $cd['user_name']; ?></a></td>
                                </tr>
                                <tr>
                                    <th>問い合わせ日</th>
                                    <td><?php echo date('Y/n/j H:i:s', strtotime($cd['created_at'])); ?></td>
                                </tr>
                                <tr colapsn="2">
                                    <th><a href="mailto:<?php echo $cd['user_email']; ?>"><button class="btn btn-primary" type="button">送信</button></th>
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