<div id="page-wrapper">
    <!-- 各種データテーブル -->
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="topititle">
                        <img src="<?php echo base_url('public/images/'); ?>radio.png"><h3>番組一覧</h3>
                    </div>
                    <!-- /.panel-heading -->

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->            