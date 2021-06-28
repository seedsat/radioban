<!-- maincontents -->
<div class="program">
    <h1>【<?php echo $meta_data['program_name']; ?>】</h1>
    <h3><?php echo $meta_data['broadcast_name']; ?> : <?php if(strpos($meta_data['day_name'], '第') != false): ?><?php echo $meta_data['day_name']; ?><?php else: ?>毎週<?php echo $meta_data['day_name']; ?><?php endif; ?>曜日<?php echo $meta_data['program_starttime']; ?>〜<?php echo $meta_data['program_finishtime']; ?></h3>
    <h3>公式HP : <a href="<?php echo $meta_data['officialsite']; ?>" target="_blank"><?php echo $meta_data['officialsite']; ?></a></h3>
    <h3><?php if($meta_data['mailaddress'] != ""): ?>メール : <a href="mailto:<?php echo $meta_data['mailaddress']; ?>"><?php echo $meta_data['mailaddress']; ?></a><?php endif; ?></h3>
</div>

<!-- topics -->
<div class="maintopic">
  <div class="thread">
    <?php foreach($program_bbs as $pb ): ?>
    <div class="title" id="thread<?php echo $pb['thread_id']; ?>">
      <h2>No.<?php echo $pb['thread_id']; ?>：【<?php echo $pb['title']; ?>】</h2>
      <p><?php if($pb['program_name'] != null): ?><?php echo $pb['program_name']; ?><?php else: ?>退会済みユーザー<?php endif; ?></p>
      <p>投稿日：<?php echo date('Y/n/j', strtotime($pb['created_at'])); ?>&nbsp;<?php echo date('G:i', strtotime($pb['created_at'])); ?></p>
      <div class="bbs-button">
        <p class="reply"><a href="<?php echo base_url('thread/reply/').$pb['dir_name'].'/'.$pb['thread_id']; ?>">返信する</a></p>
        <p class="tweet" onClick="return confirm('ツイートしていいですか？');" ><a href="<?php echo base_url('oauth/post_tweet/').$pb['dir_name'].'/'.$pb['thread_id']; ?>"><i class="fab fa-twitter"></i></a></p>
      </div>
    </div>
    <div class="content">
      <p><?php echo nl2br($pb['content']); ?></p>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="replylist">
    <ul>
        <li><i class="far fa-comments fa-3x"></i></li>
        <li class="listtitle">返信一覧</li>
    </ul>
    <?php if(!empty($reply_bbs)): ?>
      <?php foreach($reply_bbs as $rb ): ?>
        <?php foreach($program_bbs as $pb ): ?>
        <div class="title" id="thread<?php echo $rb['reply_id']; ?>">
          <p><i class="fas fa-reply"></i>&nbsp;<a href="#thread<?php echo $rb['to_reply_id']; ?>">No.<?php echo $rb['to_reply_id']; ?></a></p>
          <p style="margin-top:15px;">RN：<?php echo $rb['user_name']; ?></p>
          <ul>
            <li class="replytitle">No.<?php echo $rb['reply_id']; ?>：【<?php echo $rb['reply_title']; ?>】</li>
            <li>投稿日：<?php echo date('Y/n/j', strtotime($rb['created_at'])); ?>&nbsp;<?php echo date('G:i', strtotime($rb['created_at'])); ?></li>
            <li class="reply"><a href="<?php echo base_url('thread/to_reply/').$pb['dir_name'].'/'.$rb['reply_id']; ?>">返信する</a></li>
          </ul>
          <p><?php echo nl2br($rb['reply_content']); ?></p>
        </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
    <?php else: ?>
      <p>まだ返信はありません</p>
    <?php endif;?>
  </div>
</div>