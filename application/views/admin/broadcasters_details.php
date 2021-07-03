<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $program_title; ?>番組一覧
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>番組ID</th>
                                    <th>番組名</th>
                                    <th>放送局</th>
                                    <th>オフィシャルサイト</th>
                                    <th>詳細</th>
                                    <th>変更</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($broadcast_programs as $bcp): ?>
                                <tr class="even gradeC">
                                    <td><?php echo $bcp['program_id']; ?></td>
                                    <td><?php echo $bcp['program_name']; ?></td>
                                    <td><?php echo $bcp['broadcast_name']; ?></td>
                                    <td><?php echo $bcp['officialsite']; ?></td>
                                    <td><a href="<?php echo base_url('admin/Programrelated/program_detail/').$bcp['dir_name']; ?>"><button class="btn btn-primary" type="button">詳細</button></a></td>
                                    <td><a href="<?php echo base_url('admin/Programrelated/change_program/').$bcp['dir_name']; ?>"><button class="btn btn-success" type="button">変更</button></a></td>
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