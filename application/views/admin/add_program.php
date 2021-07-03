<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    番組追加
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="<?php echo current_url(); ?>" method="post">
                        <div class="form-group">
                            <span style="color:red;"><?php echo form_error('program_name'); ?></span>
                            <label>番組名（追加前にconfig/front_metaに番組情報を追加）</label>
                            <input class="form-control" name="program_name" value="<?php echo set_value('program_name'); ?>">
                        </div>
                        <div class="form-group">
                            <span style="color:red;"><?php echo form_error('dir_name'); ?></span>
                            <label>ディレクトリ名</label>
                            <input class="form-control" name="dir_name" value="<?php echo set_value('dir_name'); ?>">
                        </div>
                        <div class="form-group">
                            <label>放送日</label>
                            <select class="form-control" name="program_day">
                                <option value="0">選択して下さい</option>
                                <?php foreach($days as $day): ?>
                                    <option value="<?php echo $day['id']; ?>"><?php echo $day['day_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>放送局</label>
                            <select class="form-control" name="broadcast_id">
                                <option value="0">選択して下さい</option>
                                <?php foreach($broadcasters as $brc): ?>
                                    <option value="<?php echo $brc['broadcast_id']; ?>"><?php echo $brc['broadcast_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>時間帯</label>
                            <select class="form-control" name="timezone_id">
                                <option value="0">選択して下さい</option>
                                <?php foreach($timezones as $timezone): ?>
                                    <option value="<?php echo $timezone['id']; ?>"><?php echo $timezone['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <span style="color:red;"><?php echo form_error('program_starttime'); ?></span>
                            <label>開始時間</label>
                            <input class="form-control" placeholder="（例）24:00" name="program_starttime" value="<?php echo set_value('program_starttime'); ?>">
                        </div>
                        <div class="form-group">
                            <span style="color:red;"><?php echo form_error('program_finishtime'); ?></span>
                            <label>終了時間</label>
                            <input class="form-control" placeholder="（例）30:00" name="program_finishtime" value="<?php echo set_value('program_finishtime'); ?>">
                        </div>
                        <div class="form-group">
                            <span style="color:red;"><?php echo form_error('officialsite'); ?></span>
                            <label>オフィシャルサイトURL</label>
                            <input class="form-control" name="officialsite" value="<?php echo set_value('officialsite'); ?>">
                        </div>
                        <div class="form-group">
                            <span style="color:red;"><?php echo form_error('mailaddress'); ?></span>
                            <label>番組メールアドレス</label>
                            <input class="form-control" name="mailaddress" value="<?php echo set_value('mailaddress'); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" onClick="return confirm('追加していいですか？');">番組を追加する</button>
                    </form>
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