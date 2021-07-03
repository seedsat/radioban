<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $program_name; ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover">
                            <?php foreach($program_detail as $pd): ?>
                            <tbody>
                                <tr>
                                    <th>番組ID</th>
                                    <td><?php echo $pd['program_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>番組名</th>
                                    <td><?php echo $pd['program_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>放送日</th>
                                    <td><?php echo $pd['day_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>放送時間</th>
                                    <td><?php echo $pd['starttime']; ?>~<?php echo $pd['finishtime']; ?></td>
                                </tr>
                                <tr>
                                    <th>オフィシャルサイト</th>
                                    <td><?php echo $pd['officialsite']; ?></td>
                                </tr>
                                <tr>
                                    <th>ディレクトリ名</th>
                                    <td><?php echo $pd['dir_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>放送局</th>
                                    <td><?php echo $pd['broadcast_name']; ?></td>
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
    <div class="container-fluid">    
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $program_name; ?>のスレッド一覧
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>スレッドID</th>
                                        <th>スレッドタイトル</th>
                                        <th>番組名</th>
                                        <th>作成日</th>
                                        <th>詳細</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($eachprograms_threads as $ept): ?>
                                    <tr class="even gradeC">
                                        <td><?php echo $ept['thread_id']; ?></td>
                                        <td><?php echo $ept['title']; ?></td>
                                        <td><?php echo $ept['program_name']; ?></td>
                                        <td><?php echo date('Y/n/j H:i:s', strtotime($ept['created_at'])); ?></td>
                                        <td><a href="<?php echo base_url('admin/programrelated/thread_detail/').$ept['dir_name'].'/'.$ept['thread_id']; ?>"><button class="btn btn-primary" type="button">詳細</button></a></td>
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
</div>
<!-- /#page-wrapper -->