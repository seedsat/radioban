<!-- maincontents -->
<!-- topics -->
<div class="maintopic">
    <?php if($is_login >= 1): ?>
        <div class="signup">
            <div class="signup-wrapper">
                <h1>会員情報変更</h1>
                <?php if(isset($error)): ?><p style="color:red; font-weight:bold; text-align:center; margin-bottom:20px;"><?php echo $error; ?></p><?php endif;?>
                <form action="<?php echo base_url('change'); ?>" method="post" >
                    <div class="form-item">
                        <span style="color:red;"><?php echo form_error('user_name'); ?></span>
                        <?php if($is_login == 1): ?>
                            <input type="text" name="username" placeholder="新しいラジオネーム" value="<?php echo $user_datas[0]['user_name']; ?>"></input>
                        <?php else: ?>
                            <input type="text" name="username" value="<?php echo $user_datas[0]['user_name']; ?>" disabled="disabled"></input>
                        <?php endif;?>
                    </div>
                    <?php if($is_login == 1): ?>
                        <div class="form-item">
                            <span style="color:red;"><?php echo form_error('user_email'); ?></span>
                            <input type="text" name="useremail" placeholder="新しいメールアドレス" value="<?php echo $user_datas[0]['user_email']; ?>"></input>
                        </div>
                    <?php endif; ?>
                    <?php if($is_login == 1): ?>
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"></input>
                    <?php endif; ?>
                    <div class="button-panel">
                        <input type="submit" class="button" value="会員情報を変更する" onClick="return confirm('本当に変更しますか？');"></input>
                    </div>
                </form>
                <div class="form-footer">
                    <p><a href="<?php echo base_url('unsubscribe'); ?>" onClick="return confirm('本当に退会しますか？');">退会する</a></p>
                    <p><a href="<?php echo base_url('passforget'); ?>">パスワードを忘れた</a></p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="signup">
            <div class="signup-wrapper">
                <h1>会員情報変更</h1>
                <form action="<?php echo base_url('change'); ?>" method="post" >
                    <div class="form-item">
                        <div class="down">
                            <h5>よく聞く番組1</h5>
                            <span style="color:red;"><?php echo form_error('broadcaster'); ?></span>
                            <select name="broadcast_id1" id="lv1Pulldown">
                            <option value="0" selected="selected">▼選択</option>
                            <!-- データを表示 -->
                            <?php foreach($broadcast_programs as $bcname => $bc_id): ?>
                                <?php if($bc_id == $favarite1[0]['broadcast_id']): ?>
                                    <option value="<?php echo $bc_id; ?>" selected><?php echo $bcname; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $bc_id; ?>"><?php echo $bcname; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <!-- データを表示 -->
                            </select>
                             
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
                        </div>
                    </div>
                    <div class="form-item">
                        <div class="down">
                            <h5>よく聞く番組2</h5>
                            <span style="color:red;"><?php echo form_error('broadcaster'); ?></span>
                            <select name="broadcast_id1" id="lv3Pulldown">
                            <option value="0" selected="selected">▼選択</option>
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
                    <div class="form-item">
                        <div class="down">
                            <h5>よく聞く番組3</h5>
                            <span style="color:red;"><?php echo form_error('broadcaster'); ?></span>
                            <select name="broadcast_id1" id="lv5Pulldown">
                            <option value="0" selected="selected">▼選択</option>
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
                    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                    <div class="button-panel">
                        <input type="submit" class="button" value="会員情報を変更する" onClick="return confirm('本当に変更しますか？');"></input>
                    </div>
                </form>
                <div class="form-footer">
                    <p><a href="<?php echo base_url('unsubscribe'); ?>" onClick="return confirm('本当に退会しますか？');">退会する</a></p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

