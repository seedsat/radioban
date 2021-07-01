<!-- maincontents -->
<!-- topics -->
<div class="maintopic">
    <div class="signup">
        <div class="signup-wrapper">
            <h1>新規投稿</h1>
        <?php if($is_login == "1"): ?>
            <p style="color:red; font-weight:bold; text-align:center; margin-bottom:20px;"><?php if(isset($error)):?><?php echo $error; ?><?php endif; ?></p>
            <form action="<?php echo current_url(''); ?>" method="post" >
                <div class="form-item">
                    <div class="down">
                        <h3>投稿番組選択</h3>
                        <span style="color:red;"><?php echo form_error('broadcaster'); ?></span>
                        <select name="broadcast_id" id="lv1Pulldown">
                        <option value="0" selected="selected">▼選択</option>
                        <?php foreach($broadcast_programs as $bcname => $bc_id): ?>
                            <option value="<?php echo $bc_id; ?>"><?php echo $bcname; ?></option>
                        <?php endforeach; ?>
                        </select>

                        <select name="program_id" id="lv2Pulldown" disabled="disabled">
                        <option value="0">▼選択</option>
                        <?php foreach($select_programs as $select_program): ?>
                            <?php foreach($select_program as $selepro): ?>
                                <?php foreach($selepro as $sp): ?>
                                    <option value="<?php echo $sp['program_id']; ?>" class="<?php echo 'p'.$sp['broadcast_id']; ?>"><?php echo $sp['program_name']; ?></option>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>

                        </select>
                    </div>
                </div>
                <div class="form-item">
                    <span style="color:red;"><?php echo form_error('thread_title'); ?></span>
                    <input type="text" name="thread_title" placeholder="タイトル" value="<?php echo set_value('thread_title'); ?>"></input>
                </div>
                <div class="form-item">
                    <span style="color:red;"><?php echo form_error('user_password'); ?></span>
                    <input type="password" id="password" name="user_password" placeholder="パスワード"></input>
                </div>
                <div class="form-item">
                    <span style="color:red;"><?php echo form_error('thread_content'); ?></span>
                    <textarea rows="30" cols="100" name="thread_content" placeholder="投稿内容"  value="<?php echo set_value('thread_content'); ?>"></textarea>
                </div>
                <div class="button-panel">
                    <input type="submit" class="button" value="投稿する" onClick="return confirm('本当に投稿してよろしいですか？');"></input>
                </div>
                <input type="hidden" name="useremail" value="<?php echo $user_email; ?>" ></input>
                <input type="hidden" name="userid" value="<?php echo $user_id ?>"></input>
        <?php elseif($is_login == "2"): ?>
            <p style="color:red; text-align:center; font-weight:bold;"><?php if(isset($error)):?><?php echo $error; ?><?php endif; ?></p>
            <form action="<?php echo current_url(''); ?>" method="post" >
                <div class="form-item">
                    <div class="down">
                        <h3>投稿番組選択</h3>
                        <span style="color:red;"><?php echo form_error('broadcaster'); ?></span>
                        <select name="broadcast_id" id="lv1Pulldown">
                        <option value="0" selected="selected">▼選択</option>
                        <?php foreach($broadcast_programs as $bcname => $bc_id): ?>
                            <option value="<?php echo $bc_id; ?>"><?php echo $bcname; ?></option>
                        <?php endforeach; ?>
                        </select>
                         
                        <select name="program_id" id="lv2Pulldown" disabled="disabled">
                        <option value="0">▼選択</option>
                        <?php foreach($select_programs as $select_program): ?>
                            <?php foreach($select_program as $selepro): ?>
                                <?php foreach($selepro as $sp): ?>
                                    <option value="<?php echo $sp['program_id']; ?>" class="<?php echo 'p'.$sp['broadcast_id']; ?>"><?php echo $sp['program_name']; ?></option>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>

                        </select>
                    </div>
                </div>
                <div class="form-item">
                    <span style="color:red;"><?php echo form_error('thread_title'); ?></span>
                    <input type="text" name="thread_title" placeholder="タイトル" value="<?php echo set_value('thread_title'); ?>"></input>
                </div>
                <div class="form-item">
                    <span style="color:red;"><?php echo form_error('thread_content'); ?></span>
                    <textarea rows="30" cols="100" name="thread_content" placeholder="投稿内容"  value="<?php echo set_value('thread_content'); ?>"></textarea>
                </div>
                <div class="form-item">
                    <input type="hidden" name="userid" value="<?php echo $user_id; ?>" ></input>
                    <input type="hidden" name="islogin" value="<?php echo $is_login; ?>" ></input>
                </div>
                <div class="button-panel">
                    <input type="submit" class="button" value="投稿する" onClick="return confirm('本当に投稿してよろしいですか？');"></input>
                </div>
         <?php else: ?>
            <h4 style="text-align: center;">投稿するにはログインするか会員登録をしてください</h4>
            <div class="button-panel">
                <a href="<?php echo base_url('sign_in'); ?>"><input type="submit" class="button" value="ログインする"></input></a>
            </div>
            <div class="button-panel">
                <a href="<?php echo base_url('sign_up'); ?>"><input type="submit" class="button" value="会員登録する"></input></a>
            </div>
        <?php endif; ?>
            </form>
        </div>
    </div>
</div>

