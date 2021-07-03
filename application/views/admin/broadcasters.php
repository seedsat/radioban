<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    放送局一覧
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>放送局ID</th>
                                    <th>放送局名</th>
                                    <th>周波数</th>
                                    <th>URL</th>
                                    <th>詳細</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($broadcasters as $broadcast): ?>
                                <tr class="even gradeC">
                                    <td><?php echo $broadcast['broadcast_id']; ?></td>
                                    <td><?php echo $broadcast['broadcast_name']; ?></td>
                                    <td><?php echo $broadcast['frequency']; ?></td>
                                    <td><a href="<?php echo $broadcast['url']; ?>"><?php echo $broadcast['url']; ?></a></td>
                                    <td><a href="<?php echo base_url('admin/programrelated/broadcasters_details/').$broadcast['broadcast_id']; ?>"><button class="btn btn-primary" type="button">詳細</button></a></td>
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
