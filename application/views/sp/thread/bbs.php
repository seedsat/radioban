<div id="page-wrapper">
    <div class="programtitle">
            <h4><?php echo $meta_data['program_name']; ?></h4>
        </div>
        <div class="program">
            <div class="programtext" >
                <p><?php if($meta_data['broadcast_name'] === "オールナイトニッポン"): ?><?php echo "ニッポン放送"; ?><?php else: ?><?php echo $meta_data['broadcast_name']; ?><?php endif; ?> : <?php if(strpos($meta_data['day_name'], '第') != false): ?><?php echo $meta_data['day_name']; ?><?php else: ?>毎週<?php echo $meta_data['day_name']; ?><?php endif; ?>曜日<?php echo $meta_data['program_starttime']; ?>〜<?php echo $meta_data['program_finishtime']; ?></p>
                <p>公式HP  <a href="<?php echo $meta_data['officialsite']; ?>" target="_blank"><?php echo $meta_data['officialsite']; ?></a></p>
                <p><?php if($meta_data['mailaddress'] != ""): ?>メール : <a href="mailto:<?php echo $meta_data['mailaddress']; ?>"><?php echo $meta_data['mailaddress']; ?></a><?php endif; ?></p>
            </div>
        </div>
    <?php foreach($program_bbs as $pb ): ?>
    <div class="postwrap" id="thread<?php echo $pb['thread_id']; ?>">
        <h2>No.<?php echo $pb['thread_id']; ?>：【<?php echo $pb['title']; ?>】</h2>
        <p>RN.<?php echo $pb['user_name']; ?>&nbsp;投稿日：<?php echo date('Y/n/j', strtotime($pb['created_at'])); ?>&nbsp;<?php echo date('G:i', strtotime($pb['created_at'])); ?></p>
        <p class="reply"><a href="<?php echo base_url('thread/reply/').$pb['dir_name'].'/'.$pb['thread_id']; ?>">返信する</a></p>
        <p class="tweet" onClick="return confirm('ツイートしていいですか？');" ><a href="<?php echo base_url('oauth/post_tweet/').$pb['dir_name'].'/'.$pb['thread_id']; ?>">ツイートする</a></p>
    </div>
    <div class="content">
        <p><?php echo nl2br($pb['content']); ?></p>
    </div>
    <?php endforeach; ?>
    <div class="spreplylist">
        <ul>
            <li><i class="far fa-comments fa-3x"></i></li>
            <li class="splisttitle">返信一覧</li>
        </ul>
        <?php foreach($reply_bbs as $rb ): ?>
            <?php foreach($program_bbs as $pb ): ?>
            <div class="title" id="thread<?php echo $rb['reply_id']; ?>">
                <p><i class="fas fa-reply"></i>&nbsp;<a href="#thread<?php echo $rb['to_reply_id']; ?>">No.<?php echo $rb['to_reply_id']; ?></a></p>
                <p>RN：<?php echo $rb['user_name']; ?></p>
                    <p class="replytitle">No.<?php echo $rb['reply_id']; ?>：【<?php echo $rb['reply_title']; ?>】</p>
                    <p>投稿日：<?php echo date('Y/n/j', strtotime($rb['created_at'])); ?>&nbsp;<?php echo date('G:i', strtotime($rb['created_at'])); ?></p>
                    <p class="replybutton"><a href="<?php echo base_url('thread/to_reply/').$pb['dir_name'].'/'.$rb['reply_id']; ?>">返信する</a></p>
                <div class="replycontent">
                    <h4><?php echo nl2br($rb['reply_content']); ?></h4>
                </div>
            </div>
            <?php endforeach; ?> 
        <?php endforeach; ?> 
    </div>
</div>