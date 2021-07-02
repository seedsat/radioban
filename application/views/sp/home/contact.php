<div id="page-wrapper">
    <div class="top-description">
        <h4>新規登録</h4>
    </div>
    <p>Twitterでログインしてるユーザーの方はDMでお願いします。<a href="https://twitter.com/radiokeijiban" target="_blank">Twitterはこちらから。</a></p>
    <?php if(isset($error)): ?>
        <span style="color:red;"><?php echo $error; ?></span>
    <?php endif; ?>
    <div class="form">
        <form method="post" action="<?php echo base_url('signup'); ?>">
            <div class="sp-form-item">
                <select name="contact_title" id="cpull">
                    <option value="0" selected="selected">▼選択</option>
                    <option value="ラジボドについて">ラジボドについて</option>
                    <option value="番組の追加依頼">番組の追加依頼</option>
                    <option value="その他の問い合わせ">その他の問い合わせ</option>
                </select>
            </div>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('username'); ?></span>
                <input type="text" name="username" required="required"  disabled="disabled" value="<?php echo set_value('username'); ?>"></input>
            </div>
            <div class="sp-form-item">
                <span style="color:red;"><?php echo form_error('useremail'); ?></span>
                <input type="text" name="useremail" required="required" placeholder="メールアドレス" value="<?php echo set_value('useremail'); ?>"></input>
            </div>
            <div class="sp-form-item">
                <textarea name="contact" required="required" placeholder="質問内容" rows="10" cols="38"></textarea>
            </div>
            <div class="sp-button-panel">
                <input type="submit" class="button-pink" value="送信する"　onClick="return confirm('内容を送信していいですか？');"></input>
            </div>
        </form>
    </div><!-- form -->
</div>