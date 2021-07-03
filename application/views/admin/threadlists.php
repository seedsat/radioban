<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    投稿一覧
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>投稿ID</th>
                                    <th>投稿タイトル</th>
                                    <th>番組名</th>
                                    <th>コメント数</th>
                                    <th>いいね数</th>
                                    <th>投稿日</th>
                                    <th>詳細</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($all_thread_lists as $thread_list): ?>
                                <tr class="even gradeC">
                                    <td><?php echo $thread_list['thread_id']; ?></td>
                                    <td><?php echo $thread_list['title']; ?></td>
                                    <td><?php echo $thread_list['program_name']; ?></td>
                                    <td>
                                        <?php foreach ($reply_counts as $key => $rc): ?>
                                            <?php if($key == $thread_list['thread_id']): ?>
                                                <?php echo $rc; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($count_goods as $key => $cg): ?>
                                            <?php if($key == $thread_list['thread_id']): ?>
                                                <?php echo $cg; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td><?php echo date('Y/n/j H:i', strtotime($thread_list['created_at'])); ?></td>
                                    <td><a href="<?php echo base_url('admin/programrelated/thread_detail/').$thread_list['dir_name'].'/'.$thread_list['thread_id']; ?>"><button class="btn btn-primary" type="button">詳細</button></a></td>
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