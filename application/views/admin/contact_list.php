<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    問い合わせ一覧
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>問い合わせID</th>
                                    <th>問い合わせ件名</th>
                                    <th>問い合わせ者</th>
                                    <th>問い合わせ日時</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($all_contacts as $contact): ?>
                                <tr class="even gradeC">
                                    <td><?php echo $contact['contact_id']; ?></td>
                                    <td><?php echo $contact['title']; ?></td>
                                    <td><?php echo $contact['user_email']; ?></td>
                                    <td><?php echo date('Y/n/j H:i', strtotime($contact['created_at'])); ?></td>
                                    <td><a href="<?php echo base_url('admin/contact/contact_detail/').$contact['contact_id']; ?>"><button class="btn btn-primary" type="button">詳細</button></a></td>
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