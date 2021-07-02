<div id="page-wrapper">
    <div class="top-description">
        <h4>ラジボドってどんなサイト？？</h4>
    </div>
    <div class="description">
        <p>ラジボドとは、ラジオ好きのラジオ好きによるラジオ好きのための掲示板です。</p>
        <p>「ラジオが好きだけど周りで話す人がいない・・・」</p>
        <p>「この番組の面白いところやいいところを発信したい」</p>
        <p>など、テーマは無限。</p>
        <p>『とにかくラジオが好きだ！！』という思いを語り尽くす場です！！</p>
    </div><!-- description -->
    <div class="topitop">
        <div class="topititle">
            <img src="<?php echo base_url('public/images/'); ?>radio.png"><h3>ラジオボドトピックス</h3>
        </div>
        <div class="topibutton">
            <h3><a href="<?php echo base_url('thread/newpost'); ?>">新規投稿する</a></h3>
            <!--div class="search">
                <form action="#" method="post">
                    <input type="text" name="search" placeholder="検索" class="searchtxt">
                </form>
            </div-->
        </div>
        <?php foreach($thread_data as $td ): ?>
        <div class="topics">
            <img src="<?php echo base_url('public/images/'); ?>onair.png"><a href="<?php echo base_url('/thread/bbs/').$td['dir_name'].'/'.$td['thread_id']; ?>"><p><?php echo $td['title']; ?></p></a>
            <a href="<?php echo base_url('program/').$td['dir_name']; ?>"><p>【<?php echo $td['program_name']; ?>】</p></a>
            <p class="postdata">投稿日:<?php echo date('Y年n月j日', strtotime($td['created_at'])); ?> </p>
            <p class="sort">
                <a href="<?php echo base_url('thread/reply/').$td['dir_name'].'/'.$td['thread_id']; ?>"><i class="far fa-comment-alt"></i></a>&nbsp;<?php if(isset($td['rcount'])): ?><?php echo $td['rcount']; ?><?php else: ?>0<?php endif; ?>
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
    </div>
    </div>
    <div id="pagenation">
        <p><?php echo $links; ?></p>
    </div>