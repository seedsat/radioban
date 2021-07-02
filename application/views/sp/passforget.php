<div id="page-wrapper">
    <div class="top-description">
        <h4>パスワード再設定</h4>
    </div>
    <?php if(isset($error)): ?>
        <span style="color:red;"><?php echo $error; ?></span>
    <?php endif; ?>
    <div class="form">
        <form method="post" action="<?php echo current_url(''); ?>">
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('useremail'); ?></span>
                <input type="text" name="useremail" placeholder="メールアドレス" value="<?php echo set_value('useremail'); ?>"></input>
            </div>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('newpassword'); ?></span>
                <input type="password" id="newpassword" name="newpassword" placeholder="新しいパスワード"></input>
            </div>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('confirmpassword'); ?></span>
                <?php if(isset($error_msg)): ?><span style="color:red;"><?php echo $error_msg; ?></span><?php endif; ?>
                <input type="password" name="confirmpassword" placeholder="パスワード（再確認）" ?></input>
            </div>
            <div class="sp-button-panel">
                <input type="submit" class="button-pink" value="パスワードを変更する" onClick="return confirm('変更してよろしいですか？');"></input>
            </div>
        </form>
    </div><!-- form -->
</div>
<script>
	function CheckPassword(confirmpassword){
		// 入力値取得
		var input1 = newpassword.value;
		var input2 = confirmpassword.value;
		// パスワード比較
		if(input1 != input2){
			confirm.setCustomValidity("入力値が一致しません。");
		}else{
			confirm.setCustomValidity('');
		}
	}
</script>