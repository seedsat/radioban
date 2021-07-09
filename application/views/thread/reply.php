<!-- maincontents -->
<!-- topics -->
<div class="maintopic">
	<div class="signup">
		<div class="signup-wrapper">
			<h1>返信投稿</h1>
		<?php if($is_login == "1"): ?>
			<div class="thread">
				<?php foreach($program_bbs as $pb ): ?>
				<div class="title">
					<h2>【<?php echo $pb['title']; ?>】</h2>
					<p><?php echo $pb['user_name']; ?>&nbsp;投稿日：<?php echo date('Y/n/j', strtotime($pb['created_at'])); ?>&nbsp;<?php echo date('G:i', strtotime($pb['created_at'])); ?></p>
				</div>
				<div class="content">
					<p><?php echo nl2br($pb['content']); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<p style="color:red; font-weight:bold; text-align:center; margin-bottom:20px;"><?php if(isset($error)):?><?php echo $error; ?><?php endif; ?></p>
			<form action="<?php echo current_url(''); ?>" method="post" >
				<div class="form-item">
					<span style="color:red;"><?php echo form_error('reply_title'); ?></span>
					<input type="text" name="reply_title" placeholder="タイトル" value="<?php echo set_value('reply_title'); ?>"></input>
				</div>
				<div class="form-item">
					<span style="color:red;"><?php echo form_error('user_name'); ?></span>
					<input type="text" name="username" placeholder="ユーザーネーム" value="<?php echo $user_name; ?>"></input>
				</div>
				<div class="form-item">
					<span style="color:red;"><?php echo form_error('user_password'); ?></span>
					<input type="password" id="password" name="user_password" placeholder="パスワード"></input>
				</div>
				<div class="form-item">
					<span style="color:red;"><?php echo form_error('reply_content'); ?></span>
					<textarea rows="30" cols="100" name="reply_content" placeholder="返信内容" ></textarea>
				</div>
				<div class="form-item">
					<input type="hidden" name="user_email" value="<?php echo $user_email; ?>" ></input>
					<input type="hidden" name="thread_id" value="<?php echo $program_bbs[0]['thread_id']; ?>"></input>
					<input type="hidden" name="program_id" value="<?php echo $program_bbs[0]['program_id']; ?>"></input>
				</div>
				<div class="button-panel">
					<input type="submit" class="button" value="返信する" onClick="return confirm('返信をしてよろしいですか？');"></input>
				</div>
		<?php elseif($is_login == "2"): ?>
			<div class="thread">
				<?php foreach($program_bbs as $pb ): ?>
				<div class="title">
					<h2>【<?php echo $pb['title']; ?>】</h2>
					<p><?php echo $pb['user_name']; ?>&nbsp;投稿日：<?php echo date('Y/n/j', strtotime($pb['created_at'])); ?>&nbsp;<?php echo date('G:i', strtotime($pb['created_at'])); ?></p>
				</div>
				<div class="content">
					<p><?php echo nl2br($pb['content']); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<p style="color:red; font-weight:bold; text-align:center; margin-bottom:20px;"><?php if(isset($error)):?><?php echo $error; ?><?php endif; ?></p>
			<form action="<?php echo current_url(''); ?>" method="post" >
				<div class="form-item">
					<span style="color:red;"><?php echo form_error('reply_title'); ?></span>
					<input type="text" name="reply_title" placeholder="タイトル" value="<?php echo set_value('reply_title'); ?>"></input>
				</div>
				<div class="form-item">
					<span style="color:red;"><?php echo form_error('user_name'); ?></span>
					<?php if($is_login == '1'): ?>
						<input type="text" name="username" placeholder="ユーザーネーム" value="<?php echo $user_name; ?>"></input>
					<?php  else: ?>
						<input type="text" name="username" placeholder="ユーザーネーム" value="<?php echo $twitter_name; ?>"></input>
					<?php endif; ?>
				</div>
				<div class="form-item">
					<span style="color:red;"><?php echo form_error('reply_content'); ?></span>
					<textarea rows="30" cols="100" name="reply_content" placeholder="返信内容" ></textarea>
				</div>
				<div class="form-item">
					<input type="hidden" name="islogin" value="<?php echo $is_login; ?>" ></input>
					<input type="hidden" name="thread_id" value="<?php echo $program_bbs[0]['thread_id']; ?>"></input>
					<input type="hidden" name="program_id" value="<?php echo $program_bbs[0]['program_id']; ?>"></input>
				</div>
				<div class="button-panel">
					<input type="submit" class="button" value="返信する" onClick="return confirm('返信をしてよろしいですか？');"></input>
				</div>
		<?php else: ?>
			<h4 style="text-align: center;">投稿するにはログインするか会員登録をしてください</h4 style="text-align: center;">
			<div class="button-panel">
				<a href="<?php echo base_url('login'); ?>"><input type="submit" class="button" value="ログインする"></input></a>
			</div>
			<div class="button-panel">
				<a href="<?php echo base_url('signup'); ?>"><input type="submit" class="button" value="会員登録する"></input></a>
			</div>
		<?php endif; ?>
			</form>
		</div>
	</div>
</div>

