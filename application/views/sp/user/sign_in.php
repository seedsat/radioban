<div id="page-wrapper">
    <div class="top-description">
        <h4>ログイン</h4>
    </div>
    <?php if(isset($error)): ?>
        <span style="color:red;"><?php echo $error; ?></span>
    <?php endif; ?>
    <div class="form">
        <form method="post" action="<?php echo base_url('login'); ?>">
        <div class="sp-form-item">
        <input type="text" name="email" required="required" placeholder="メールアドレス"></input>
        </div>
        <div class="sp-form-item">
        <input type="password" name="password" required="required" placeholder="パスワード"></input>
        </div>
        <div class="sp-button-panel">
        <input type="submit" class="button-pink" title="login" value="ログインする"></input>
        </div>
    </form>
    </div><!-- form -->
    <div class="sp-form-footer">
        <p class="button-twitter"><a href="<?php echo base_url('oauth/twitter'); ?>"><i class="fab fa-twitter"></i> Twitterでログインする</a></p>
        <p class="button-pink"><a href="<?php echo base_url('passforget'); ?>">パスワードを忘れた</a></p>
    </div>