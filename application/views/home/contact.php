<div class="form-wrapper">
    <h1>お問い合わせ</h1>
    <?php if(isset($error)): ?>
        <span style="color:red;"><?php echo $error; ?></span>
    <?php endif; ?>
    <form method="post" action="<?php echo base_url('contact'); ?>">
        <div class="form-item">
            <select name="contact_title">
                <option value="0" selected="selected">▼選択</option>
                <option value="ラジボドについて">ラジボドについて</option>
                <option value="番組の追加依頼">番組の追加依頼</option>
                <option value="その他の問い合わせ">その他の問い合わせ</option>
            </select>
        </div>
        <div class="form-item">
            <span style="color:red;"><?php echo form_error('username'); ?></span>
        <input type="text" name="username" required="required" placeholder="ラジオネーム" value="<?php echo set_value('username'); ?>"></input>
        </div>
        <div class="form-item">
            <span style="color:red;"><?php echo form_error('useremail'); ?></span>
        <input type="text" name="useremail" required="required" placeholder="メールアドレス" value="<?php echo set_value('useremail'); ?>"></input>
        <p>Twitterでログインしてるユーザーの方はDMでお願いします。<a href="https://twitter.com/radiokeijiban" target="_blank">Twitterはこちらから。</a></p>
        </div>
        <div class="form-item">
            <textarea name="contact" required="required" placeholder="質問内容" rows="30" cols="100"></textarea>
        </div>
        <div class="button-panel">
            <input type="submit" class="button" value="送信する"></input>
        </div>
    </form>
</div>