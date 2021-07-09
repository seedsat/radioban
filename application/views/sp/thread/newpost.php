<div id="page-wrapper">
    <div class="top-description">
        <h4>新規投稿</h4>
    </div>
    <div class="form">
        <?php if($is_login != NULL): ?>
            <form method="post" action="<?php echo base_url('thread/newpost'); ?>">
            <div class="sp-form-item">
                <div class="down">
                    <h3>【投稿番組選択】</h3>
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
                                <option value="<?php echo $sp['program_id']; ?>" class="<?php echo 'p'.$sp['broadcast_id']; ?>" ><?php echo $sp['program_name']; ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                    </select>
                </div>
            </div>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('thread_title'); ?></span>
                <input type="text" name="thread_title" placeholder="タイトル" value="<?php echo set_value('thread_title'); ?>"></input>
            </div>
            <?php if($is_login == 1): ?>
                <div class="sp-form-item">
                    <span style="color:red;"><?php if(isset($error)):?><?php echo $error; ?><?php endif; ?></span>
                    <span style="color:red;"><?php echo form_error('user_password'); ?></span>
                    <input type="password" id="password" name="user_password" placeholder="パスワード"></input>
                </div>
            <?php endif; ?>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('thread_content'); ?></span>
                <textarea rows="10" cols="30" name="thread_content" placeholder="投稿内容" class="postarea" value="<?php echo set_value('thread_thread_content'); ?>"></textarea>
            </div>
            <?php if($is_login == 1): ?>
                <input type="hidden" name="useremail" value="<?php echo $user_email; ?>" ></input>
                <input type="hidden" name="userid" value="<?php echo $user_id; ?>" ></input>
            <?php elseif($is_login == 2): ?>
                <input type="hidden" name="is_login" value="<?php echo $is_login; ?>" ></input>
            <?php endif; ?>
            <div class="sp-button-panel">
                <input type="submit" class="button-pink" value="投稿する" onClick="return confirm('投稿してよろしいですか？');"></input>
            </div>
            </form>
        <?php else: ?>
            <h4 style="text-align: center;">投稿するにはログインするか<br />会員登録をしてください</h4 style="text-align: center;">
            <div class="sp-form-footer">
                <p class="button-twitter"><a href="<?php echo base_url('oauth/twitter'); ?>"><i class="fab fa-twitter"></i> Twitterでログインする</a></p>
                <p class="button-pink"><a href="<?php echo base_url('signup'); ?>">新規登録</a></p>
            </div>
        <?php endif; ?>
    </div><!-- form -->