<div id="page-wrapper">
    <!-- 各種データテーブル -->
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="topititle">
                        <img src="<?php echo base_url('public/images/'); ?>radio.png"><h3>放送局一覧</h3>
                    </div>
                    <!-- /.panel-heading -->

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>放送局</th>
                                        <th>URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($broadcasters as $bc): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $bc['broadcast_name']; ?></td>
                                        <td><a href="<?php echo $bc['url']; ?>" target="_blank"><?php echo $bc['url']; ?></a></td>
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