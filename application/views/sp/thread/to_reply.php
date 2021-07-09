<div id="page-wrapper">
    <div class="top-description">
        <h4>返信投稿</h4>
    </div>
    <div class="form">
        <?php if($is_login != NULL): ?>
            <div class="sp-form-item">
                <?php foreach($reply_bbs as $rb ): ?>
                    <div class="title">
                        <h2>【<?php echo $rb['reply_title']; ?>】</h2>
                        <p><?php echo $rb['user_name']; ?>&nbsp;投稿日：<?php echo date('Y/n/j', strtotime($rb['created_at'])); ?>&nbsp;<?php echo date('G:i', strtotime($rb['created_at'])); ?></p>
                    </div>
                    <div class="content">
                        <p><?php echo nl2br($rb['reply_content']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <p style="color:red; font-weight:bold; text-align:center; margin-bottom:20px;"><?php if(isset($error)):?><?php echo $error; ?><?php endif; ?></p>
            <form method="post" action="<?php echo current_url(''); ?>">
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('reply_title'); ?></span>
                <input type="text" name="reply_title" placeholder="タイトル" value="<?php echo set_value('to_reply_title'); ?>"></input>
            </div>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('user_name'); ?></span>
                <?php if($is_login == '1'): ?>
                    <input type="text" name="user_name" placeholder="ユーザーネーム" value="<?php echo $user_name; ?>"></input>
                <?php else: ?>
                    <input type="text" name="user_name" placeholder="ユーザーネーム" value="<?php echo $twitter_name; ?>"></input>
                <?php endif; ?>
            </div>
            <?php if($is_login == '1'): ?>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('user_password'); ?></span>
                    <input type="password" name="user_password" placeholder="パスワード" ?></input>
                </div>
            <?php endif; ?>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('reply_content'); ?></span>
                <textarea rows="10" cols="38" name="reply_content" placeholder="返信内容"  value="<?php echo set_value('to_reply_content'); ?>"></textarea>
            </div>
            <input type="hidden" name="user_email" value="<?php echo $user_email; ?>" ></input>
            <input type="hidden" name="thread_id" value="<?php echo $reply_bbs[0]['thread_id']; ?>"></input>
            <input type="hidden" name="program_id" value="<?php echo $reply_bbs[0]['program_id']; ?>"></input>
            <input type="hidden" name="to_reply_id" value="<?php echo $reply_bbs[0]['reply_id']; ?>"></input>
            <div class="sp-button-panel">
            <input type="submit" class="button-pink" value="返信する" onClick="return confirm('返信してよろしいですか？');"></input>
            </div>
        <?php else: ?>
            <h4 style="text-align: center;">投稿するにはログインするか会員登録をしてください</h4 style="text-align: center;">
            <div class="sp-button-panel">
                <a href="<?php echo base_url('login'); ?>"><input type="submit" class="button-pink" value="ログインする"></input></a>
            </div>
            <div class="sp-button-panel">
                <a href="<?php echo base_url('signup'); ?>"><input type="submit" class="button-pink" value="会員登録する"></input></a>
            </div>
        <?php endif; ?>
    </form>
    </div><!-- form -->