<!-- maincontents -->
<div class="explain">
	<div class="explain-text">
		<p>ラジボドとは、ラジオ好きのラジオ好きによるラジオ好きのための掲示板です。</p>
		<p>「ラジオが好きだけど周りで話す人がいない・・・」</p>
		<p>「この番組の面白いところやいいところを発信したい」</p>
		<p>など、テーマは無限。</p>
		<p>『とにかくラジオが好きだ！！』という思いを語り尽くす場です！！</p>
	</div>
</div>

<!-- topics -->
<div class="maintopic">
	<div class="topics">
		<div class="topihead">
			<?php if( isset($program_seach) && !empty($program_seach)): ?>
				<img src="<?php echo base_url('public/images/radio.png'); ?>"><h2>番組検索結果</h2>
			<?php else: ?>
				<img src="<?php echo base_url('public/images/radio.png'); ?>"><h2>ラジボドトッピクス</h2>
			<?php endif; ?>
			<ul>
				<li><a href="<?php echo base_url('thread/newpost'); ?>" class="newpost">新規投稿</a></li>
			</ul>
		</div>

		<?php if( isset($program_seach) && !empty($program_seach)): ?>
			<?php foreach($program_seach as $ps): ?>
				<div class="search">
					<img src="<?php echo base_url('public/images/onair.png'); ?>">
					<a href="<?php echo base_url('program/').$ps['dir_name']; ?>">
						<p>【<?php echo $ps['program_name']; ?>】</p>
					</a>
				</div>
			<?php endforeach; ?>
		<?php elseif(isset($program_seach) && empty($program_seach)): ?>
			<div class="search">
					検索結果はありません。
			</div>
		<?php else: ?>
			<?php foreach($thread_data as $td ): ?>
				<div class="post">
					<img src="<?php echo base_url('public/images/onair.png'); ?>">
					<a href="<?php echo base_url('/thread/bbs/').$td['dir_name'].'/'.$td['thread_id']; ?>">
						<h2><?php echo $td['title']; ?></h2>
					</a>
					<a href="<?php echo base_url('program/').$td['dir_name']; ?>"><p>【<?php echo $td['program_name']; ?>】</p></a>
					<p>投稿日：<?php echo date('Y年n月j日 H:i', strtotime($td['created_at'])); ?>&nbsp;
						<a href="<?php echo base_url('thread/reply/').$td['dir_name'].'/'.$td['thread_id']; ?>">
							<i class="far fa-comment-alt"></i></a>&nbsp;
							<?php if(isset($td['rcount'])): ?><?php echo $td['rcount']; ?>
						<?php else: ?>
							0
						<?php endif; ?>

						<?php if($is_login == "1" or $is_login == "2"): ?>
							<a href="<?php echo base_url('good/').$td['thread_id']; ?>">
						<?php endif; ?>

						<?php if(isset($td['good']) && $td['good'] === "1"): ?>
							<a href="<?php echo base_url('good_delete/').$td['thread_id']; ?>"><i class="fas fa-heart" style="color:red;"></i></a>
						<?php else: ?>
							<i class="far fa-heart"></i>
						<?php endif; ?>

						<?php if(isset($td['count'])): ?><?php echo $td['count']; ?>
						<?php else: ?>
							0
						<?php endif; ?>
					</p>
				</div>
			<?php endforeach; ?>
			<div class="pagenation">
					<p><?php echo $links; ?></p>
			</div>
		<?php endif; ?>
	</div>
</div>