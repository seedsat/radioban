<!-- maintopic -->
<div class="maintopic">
    <div class="topics">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- 基本データ -->
                            <div class="tab-pane fade in active" id="home">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                番組一覧
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" id="dataTables02">
                                                        <thead>
                                                            <tr>
                                                                <th>放送局</th>
                                                                <th>番組名</th>
                                                                <th>URL</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($all_programs as $allpg): ?>
                                                            <tr class="odd gradeX">
                                                                <td><a href="<?php echo base_url('program_bbs/').$allpg['dir_name']; ?>"><?php echo $allpg['broadcast_name']; ?></a></td>
                                                                <td><a href="<?php echo base_url('program/').$allpg['dir_name']; ?>"><?php echo $allpg['program_name']; ?></a></td>
                                                                <td><a href="<?php echo $allpg['officialsite']; ?>" target="_blank"><?php echo $allpg['officialsite']; ?></a></td>
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
                                </div>
                            </div>
                            <!-- 基本データ -->
                        </div>
                        <!-- /tab-content -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
</div>
<!-- maintopic -->