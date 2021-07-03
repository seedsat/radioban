<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    番組一覧
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>番組ID</th>
                                    <th>番組名</th>
                                    <th>URL</th>
                                    <th>詳細</th>
                                    <th>変更</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($programs_lists as $program_list): ?>
                                <tr class="even gradeC">
                                    <td><?php echo $program_list['program_id']; ?></td>
                                    <td><?php echo $program_list['program_name']; ?></td>
                                    <td><a href="<?php echo $program_list['officialsite']; ?>"><?php echo $program_list['officialsite']; ?></a></td>
                                    <td><a href="<?php echo base_url('admin/programrelated/program_detail/').$program_list['dir_name']; ?>"><button class="btn btn-primary" type="button">詳細</button></a></td>
                                    <td><a href="<?php echo base_url('admin/programrelated/change_program/').$program_list['dir_name']; ?>"><button class="btn btn-success" type="button">変更</button></a></td>
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