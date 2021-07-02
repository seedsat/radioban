<div id="page-wrapper">
    <div class="top-description">
        <h4>会員情報変更</h4>
    </div>
    <div class="form">
        <form method="post" action="<?php echo base_url('change'); ?>">
        <div class="sp-form-item">
            <span style="color:red;"><?php echo form_error('username'); ?></span>
            <?php if($is_login == 1): ?>
                <input type="text" name="username" placeholder="ラジオネーム" value="<?php echo $user_datas[0]['username']; ?>"></input>
            <?php else: ?>
                <input type="text" name="username" placeholder="ラジオネーム" value="<?php echo $user_datas[0]['username']; ?>"  disabled="disabled"></input>
            <?php endif; ?>
        </div>
        <?php if($is_login == 1): ?>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('useremail'); ?></span>
                <input type="text" name="useremail" placeholder="メールアドレス" value="<?php echo $user_datas[0]['email']; ?>"></input>
            </div>
        <?php endif; ?>
        <div class="sp-form-item">
            <div class="down">
                <h5>よく聞く番組1</h5>
                <span style="color:red;"><?php echo form_error('broadcaster'); ?></span>
                <!-- 放送局 -->
                <select name="broadcast_id1" id="lv1Pulldown">
                <?php if(empty($favarite1)): ?>
                    <option value="0" selected="selected">▼選択</option>
                <?php endif; ?>
                <?php foreach($broadcast_programs as $bcname => $bc_id): ?>
                    <?php if($bc_id == $favarite1[0]['broadcast_id']): ?>
                        <option value="<?php echo $favarite1[0]['broadcast_id']; ?>" selected><?php echo $bcname; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $bc_id; ?>"><?php echo $bcname; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                </select>
                <!-- 放送局 -->
                <!-- 番組 -->
                <select name="program_id1" id="lv2Pulldown" disabled="disabled">
                <option value="0">▼選択</option>
                <?php foreach($select_programs as $select_program): ?>
                    <?php foreach($select_program as $selepro): ?>
                        <?php foreach($selepro as $sp): ?>
                            <?php if($sp['program_id'] == $favarite1[0]['program_id']): ?>
                                <option value="<?php echo $sp['program_id']; ?>" class="<?php echo 'p'.$sp['broadcast_id']; ?>" selected><?php echo $sp['program_name']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $sp['program_id']; ?>" class="<?php echo 'p'.$sp['broadcast_id']; ?>"><?php echo $sp['program_name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </select>
                <!-- 番組 -->
            </div>
        </div>
        <div class="sp-form-item">
            <div class="down">
                <h5>よく聞く番組2</h5>
                <span style="color:red;"><?php echo form_error('broadcaster'); ?></span>
                <select name="broadcast_id1" id="lv3Pulldown">
                <?php if(empty($favarite2)): ?>
                    <option value="0" selected="selected">▼選択</option>
                <?php endif; ?>
                <?php foreach($broadcast_programs as $bcname => $bc_id): ?>
                    <?php if($bc_id == $favarite2[0]['broadcast_id']): ?>
                        <option value="<?php echo $bc_id; ?>" selected><?php echo $bcname; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $bc_id; ?>"><?php echo $bcname; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                </select>
                 
                <select name="program_id2" id="lv4Pulldown" disabled="disabled">
                <option value="0">▼選択</option>
                <?php foreach($select_programs as $select_program): ?>
                    <?php foreach($select_program as $selepro): ?>
                        <?php foreach($selepro as $sp): ?>
                            <?php if($sp['program_id'] == $favarite2[0]['program_id']): ?>
                                <option value="<?php echo $sp['program_id']; ?>" class="<?php echo 'p'.$sp['broadcast_id']; ?>" selected><?php echo $sp['program_name']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $sp['program_id']; ?>" class="<?php echo 'p'.$sp['broadcast_id']; ?>"><?php echo $sp['program_name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="sp-form-item">
            <div class="down">
                <h5>よく聞く番組3</h5>
                <span style="color:red;"><?php echo form_error('broadcaster'); ?></span>
                <select name="broadcast_id1" id="lv5Pulldown">
                <?php if(empty($favarite3)): ?>
                    <option value="0" selected="selected">▼選択</option>
                <?php endif; ?>
                <?php foreach($broadcast_programs as $bcname => $bc_id): ?>
                    <?php if($bc_id == $favarite3[0]['broadcast_id']): ?>
                        <option value="<?php echo $bc_id; ?>" selected><?php echo $bcname; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $bc_id; ?>"><?php echo $bcname; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                </select>
                 
                <select name="program_id3" id="lv6Pulldown" disabled="disabled">
                <option value="0">▼選択</option>
                <?php foreach($select_programs as $select_program): ?>
                    <?php foreach($select_program as $selepro): ?>
                        <?php foreach($selepro as $sp): ?>
                            <?php if($sp['program_id'] == $favarite3[0]['program_id']): ?>
                                <option value="<?php echo $sp['program_id']; ?>" class="<?php echo 'p'.$sp['broadcast_id']; ?>" selected><?php echo $sp['program_name']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $sp['program_id']; ?>" class="<?php echo 'p'.$sp['broadcast_id']; ?>"><?php echo $sp['program_name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                </select>
            </div>
        </div>
        <?php if($is_login == 1): ?>
            <input type="hidden" name="user_id" value="<?php echo $userid; ?>"></input>
        <?php endif; ?>
        <div class="sp-button-panel">
            <input type="submit" class="button-twitter" value="会員情報を変更する" onClick="return confirm('本当に変更しますか？');"></input>
        </div>
    </form>
        <div class="sp-button-panel">
            <input type="submit" class="button-pink" value="退会する" onClick="return confirm('本当に退会しますか？');"></input>
        </div>
        <?php if($is_login == 1): ?>
            <div class="sp-button-panel">
                <a href="<?php echo base_url('passforget'); ?>"><input type="submit" class="button-pink" value="パスワードを忘れた"></input></a>
            </div>
        <?php endif; ?>
    </div><!-- form -->