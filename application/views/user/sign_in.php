<div class="form-wrapper">
  <h1>ログイン</h1>
  <?php if(isset($error)): ?>
    <span style="color:red;"><?php echo $error; ?></span>
  <?php endif; ?>
  <form method="post" action="<?php echo base_url('sign_in'); ?>">
    <div class="form-item">
      <input type="text" name="user_email" required="required" placeholder="メールアドレス"></input>
    </div>
    <div class="form-item">
      <input type="password" name="user_password" required="required" placeholder="パスワード"></input>
    </div>
    <div class="button-panel">
      <input type="submit" class="button" title="login" value="ログインする"></input>
    </div>
  </form>
  <div class="form-footer">
    <p class="twitter-button"><a href="<?php echo base_url('oauth/twitter'); ?>"><i class="fab fa-twitter"></i> Twitterでログイン</a></p>
    <p><a href="<?php echo base_url('sign_up'); ?>">新規登録</a></p>
    <p><a href="<?php echo base_url('passforget'); ?>">パスワードを忘れた</a></p>
  </div>
</div>