<div id="page-wrapper">
    <div class="top-description">
        <h4>返信投稿</h4>
    </div>
    <div class="form">
        <?php if($is_login != NULL): ?>
            <div class="sp-form-item">
                <?php foreach($program_bbs as $pb ): ?>
                <div class="title">
                    <h3>【<?php echo $pb['thread_title']; ?>】</h3>
                    <p>RN:<?php echo $pb['username']; ?>&nbsp;投稿日：<?php echo date('Y/n/j', strtotime($pb['create_date'])); ?>&nbsp;<?php echo date('G:i', strtotime($pb['create_date'])); ?></p>
                </div>
                <div class="content">
                    <p><?php echo nl2br($pb['thread_content']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <p style="color:red; font-weight:bold; text-align:center; margin-bottom:20px;"><?php if(isset($error)):?><?php echo $error; ?><?php endif; ?></p>
            <form method="post" action="<?php echo current_url(''); ?>">
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('reply_title'); ?></span>
                <input type="text" name="reply_title" placeholder="タイトル" value="<?php echo set_value('reply_title'); ?>"></input>
            </div>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('username'); ?></span>
                <input type="text" name="username" placeholder="ユーザーネーム" value="<?php echo $username; ?>"></input>
            </div>
            <?php if($is_login == 1): ?>
                <div class="sp-form-item">
                    <span style="color:red;"><?php echo form_error('userpassword'); ?></span>
                    <input type="password" id="password" name="userpassword" placeholder="パスワード"></input>
                </div>
            <?php endif; ?>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('reply_content'); ?></span>
                <textarea rows="10" cols="30" name="reply_content" placeholder="返信内容" class="postarea" value="<?php echo set_value('reply_content'); ?>"></textarea>
            </div>
            <?php if($is_login == 1): ?>
                <input type="hidden" name="userid" value="<?php echo $user_id; ?>" ></input>
                <input type="hidden" name="useremail" value="<?php echo $usermail; ?>" ></input>
            <?php elseif($is_login == 2): ?>
                <input type="hidden" name="userid" value="<?php echo $user_id; ?>" ></input>
                <input type="hidden" name="islogin" value="<?php echo $is_login; ?>" ></input>
            <?php endif; ?>
            <input type="hidden" name="thread_id" value="<?php echo $program_bbs[0]['thread_id']; ?>"></input>
            <input type="hidden" name="program_id" value="<?php echo $program_bbs[0]['program_id']; ?>"></input>
            <div class="sp-button-panel">
                <input type="submit" class="button-pink" value="返信する" onClick="return confirm('返信してよろしいですか？');"></input>
            </div>
        <?php else: ?>
            <h4 style="text-align: center;">投稿するにはログインするか<br />会員登録をしてください</h4 style="text-align: center;">
            <div class="sp-button-panel">
                <a href="<?php echo base_url('login'); ?>"><input type="submit" class="button-pink" value="ログインする"></input></a>
            </div>
            <div class="sp-button-panel">
                <a href="<?php echo base_url('signup'); ?>"><input type="submit" class="button-pink" value="会員登録する"></input></a>
            </div>
            <div class="sp-form-footer" id="twitterbutton">
                <p class="button-twitter"><a href="<?php echo base_url('oauth/twitter'); ?>"><i class="fab fa-twitter"></i> Twitterでログインする</a></p>
                <p class="button-twitter"><a href="<?php echo base_url('oauth/twitter'); ?>"><i class="fab fa-twitter"></i> Twitterで登録する</a></p>
            </div>
        <?php endif; ?>
    </form>
    </div><!-- form -->