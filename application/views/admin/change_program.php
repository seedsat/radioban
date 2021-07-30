<div id="page-wrapper">
    <div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    番組情報変更
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="<?php echo current_url(); ?>" method="post">
                        <?php foreach($program_data as $pg): ?>
                            <div class="form-group">
                                <label>番組ID</label>
                                <input class="form-control" name="program_id" value="<?php echo $pg['program_id']; ?>">
                            </div>
                            <div class="form-group">
                                <span style="color:red;"><?php echo form_error('program_name'); ?></span>
                                <label>番組名（追加前にconfig/front_metaに番組情報を追加）</label>
                                <input class="form-control" name="program_name" value="<?php echo $pg['program_name']; ?>">
                            </div>
                            <div class="form-group">
                                <span style="color:red;"><?php echo form_error('dir_name'); ?></span>
                                <label>ディレクトリ名</label>
                                <input class="form-control" name="dir_name" value="<?php echo $pg['dir_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label>放送日</label>
                                <select class="form-control" name="program_day">
                                    <?php foreach($days as $day): ?>
                                        <?php if($day['day_id'] == $pg['day_id']): ?>
                                            <option value="<?php echo $day['id']; ?>" selected><?php echo $day['day_name']; ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo $day['id']; ?>"><?php echo $day['day_name']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>放送局</label>
                                <select class="form-control" name="broadcast_id">
                                    <?php foreach($broadcasters as $brc): ?>
                                        <?php if($brc['broadcast_name'] == $pg['broadcast_name']): ?>
                                            <option value="<?php echo $brc['broadcast_id']; ?>" selected><?php echo $pg['broadcast_name']; ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $brc['broadcast_id']; ?>"><?php echo $brc['broadcast_name']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>時間帯</label>
                                <select class="form-control" name="timezone_id">
                                    <?php foreach($timezone as $tz): ?>
                                        <?php if($tz['timezone_erea'] == $pg['timezone_erea']): ?>
                                            <option value="<?php echo $tz['timezone_id']; ?>" selected><?php echo $pg['timezone_erea']; ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $tz['timezone_id']; ?>" ><?php echo $tz['timezone_erea']; ?></option>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <span style="color:red;"><?php echo form_error('starttime'); ?></span>
                                <label>開始時間</label>
                                <input class="form-control" placeholder="（例）24:00" name="starttime" value="<?php echo $pg['starttime']; ?>">
                            </div>
                            <div class="form-group">
                                <span style="color:red;"><?php echo form_error('finishtime'); ?></span>
                                <label>終了時間</label>
                                <input class="form-control" placeholder="（例）30:00" name="finishtime" value="<?php echo $pg['finishtime']; ?>">
                            </div>
                            <div class="form-group">
                                <span style="color:red;"><?php echo form_error('officialsite'); ?></span>
                                <label>オフィシャルサイトURL</label>
                                <input class="form-control" name="officialsite" value="<?php echo $pg['officialsite']; ?>">
                            </div>
                            <div class="form-group">
                                <span style="color:red;"><?php echo form_error('mailaddress'); ?></span>
                                <label>番組メールアドレス</label>
                                <input class="form-control" name="mailaddress" value="<?php echo $pg['mailaddress']; ?>">
                                </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary" onClick="return confirm('変更していいですか？');">番組情報を変更する</button>
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