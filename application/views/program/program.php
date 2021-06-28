<!-- maincontents -->
<div class="program">
  <h1>【<?php echo $meta_data['program_name']; ?>】</h1>
  <h3><?php echo $meta_data['broadcast_name']; ?> : <?php if(strpos($meta_data['day_name'], '第') != false): ?><?php echo $meta_data['day_name']; ?><?php else: ?>毎週<?php echo $meta_data['day_name']; ?><?php endif; ?>曜日<?php echo $meta_data['starttime']; ?>〜<?php echo $meta_data['finishtime']; ?></h3>
  <h3><?php if($meta_data['officialsite'] != ""): ?>公式HP : <a href="<?php echo $meta_data['officialsite']; ?>" target="_blank"><?php echo $meta_data['officialsite']; ?></a><?php endif; ?></h3>
  <h3><?php if($meta_data['mailaddress'] != ""): ?>メール : <a href="mailto:<?php echo $meta_data['mailaddress']; ?>"><?php echo $meta_data['mailaddress']; ?></a><?php endif; ?></h3>
</div>
<!-- topics -->
<div class="maintopic">
  <div class="topics">
    <div class="topihead">
      <img src="<?php echo base_url('public/images/radio.png'); ?>"><h2>ラジボドトッピクス</h2>
      <ul>
        <li><a href="<?php echo base_url('thread/newpost'); ?>" class="newpost">新規投稿</a></li>
      </ul>
    </div>
    <?php if( !empty($thread_data)): ?>
      <?php foreach($thread_data as $td ): ?>
        <div class="post">
          <img src="<?php echo base_url('public/images/onair.png'); ?>">
          <a href="<?php echo base_url('/thread/program_bbs/').$td['dir_name'].'/'.$td['thread_id']; ?>">
            <h2><?php echo $td['thread_title']; ?></h2>
          </a>
          <a href="<?php echo base_url('program/').$td['dir_name']; ?>"><p>【<?php echo $td['program_name']; ?>】</p></a>
          <p>投稿日：<?php echo date('Y年n月j日 H:i', strtotime($td['create_date'])); ?>&nbsp;
            <a href="<?php echo base_url('thread/reply/').$td['dir_name'].'/'.$td['thread_id']; ?>">
            <i class="far fa-comment-alt"></i></a>&nbsp;
            <?php if(isset($td['rcount'])): ?>
              <?php echo $td['rcount']; ?>
            <?php else: ?>
                0
            <?php endif; ?>

            <?php if($is_login == 1): ?>
              <a href="<?php echo base_url('good/').$td['thread_id']; ?>">
            <?php endif; ?>

            <?php if(isset($td['good']) && $td['good'] === "1"): ?>
              <a href="<?php echo base_url('good_delete/').$td['thread_id']; ?>"><i class="fas fa-heart" style="color:red;"></i></a>
            <?php else: ?>
              <i class="far fa-heart"></i>
            <?php endif; ?>

              <?php if(isset($td['count'])): ?>
                <?php echo $td['count']; ?>
              <?php else: ?>
                0
              <?php endif; ?>
            </p>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      投稿はまだありません
    <?php endif; ?>
    <div class="pagenation">
        <p><?php echo $links; ?></p>
    </div>
  </div>
</div>