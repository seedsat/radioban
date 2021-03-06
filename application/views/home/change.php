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
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

