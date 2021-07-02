<div id="page-wrapper">
    <div class="topitop">
        <div class="programtitle">
            <h4><?php echo $meta_data['program_name']; ?></h4>
        </div>
        <div class="program">
            <div class="programtext" >
                <p><?php if($meta_data['broadcast_name'] === "オールナイトニッポン"): ?><?php echo "ニッポン放送"; ?><?php else: ?><?php echo $meta_data['broadcast_name']; ?><?php endif; ?> : <?php if(strpos($meta_data['day'], '第') != false): ?><?php echo $meta_data['day']; ?><?php else: ?>毎週<?php echo $meta_data['day']; ?><?php endif; ?>曜日<?php echo $meta_data['program_starttime']; ?>〜<?php echo $meta_data['program_finishtime']; ?></p>
                <p>公式HP  <a href="<?php echo $meta_data['officialsite']; ?>" target="_blank"><?php echo $meta_data['officialsite']; ?></a></p>
                <p><?php if($meta_data['mailaddress'] != ""): ?>メール : <a href="mailto:<?php echo $meta_data['mailaddress']; ?>"><?php echo $meta_data['mailaddress']; ?></a><?php endif; ?></p>
            </div>
        </div>
        <?php if( isset($thread_data) && !empty($thread_data) ): ?>
            <?php foreach($thread_data as $td ): ?>
            <div class="topics">
                <img src="<?php echo base_url('public/images/'); ?>onair.png"><a href="<?php echo base_url('/thread/program_bbs/').$td['dir_name'].'/'.$td['thread_id']; ?>"><p><?php echo $td['thread_title']; ?></p></a>
                <a href="<?php echo base_url('program/').$td['dir_name']; ?>"><p>【<?php echo $td['program_name']; ?>】</p></a>
                <p class="postdata">投稿日:<?php echo date('Y年n月j日', strtotime($td['create_date'])); ?> </p>
                <p class="sort">
                    <a href="<?php echo base_url('thread/reply/').$td['dir_name'].'/'.$td['thread_id']; ?>"><i class="far fa-comment-alt"></i></a>&nbsp;<?php if(isset($td['rcount'])): ?><?php echo $td['rcount']; ?><?php else: ?>0<?php endif; ?>
                    <?php if($is_login == 1): ?>
                        <a href="<?php echo base_url('good/').$td['thread_id']; ?>">
                    <?php endif; ?>
                    <?php if(isset($td['good']) && $td['good'] === "1"): ?>
                       <a href="<?php echo base_url('good_delete/').$td['thread_id']; ?>"><i class="fas fa-heart" style="color:red;"></i></a>
                    <?php else: ?>
                        <i class="far fa-heart"></i>
                    <?php endif; ?>
                    </a>&nbsp;<?php if(isset($td['count'])): ?><?php echo $td['count']; ?><?php else: ?>0<?php endif; ?>
                </p>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>