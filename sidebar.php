<?php 
    if (!defined('__TYPECHO_ROOT_DIR__')) exit;

    function getGravatar( $email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

?>


<div class="col-mb-12  col-3" id="secondary" role="complementary">

    <section class="widget">
        <div id="avatar"></div>
        <div id="author">TOYOHAY</div>
        <div id="social">
            <a href='https://weibo.com/1919420312'><div id="weibo" class='icon'></div>粒粒梦想</a>
            <a href='https://ubuntullmx.lofter.com/'><div id="lofter" class='icon'></div>ubuntullmx</a>
        </div>
    </section>

    <section class="widget" style="text-align:center;padding-bottom:20px;">
        <p>文笔很差 文章很杂</p>
        <p>分享想法与技术的伶仃之地</p>
    </section>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>

    <section class="widget small-hide">

		<h2 class="widget-title"><?php _e('最新文章'); ?></h2>

        <ul class="widget-list">

            <?php $this->widget('Widget_Contents_Post_Recent')

            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>

        </ul>

    </section>

    <?php endif; ?>



    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>

    <section class="widget small-hide" >

		<h2 class="widget-title "><?php _e('最近回复'); ?></h2>

        <ul class="widget-list">

        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>

        <?php while($comments->next()): ?>

            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>

        <?php endwhile; ?>

        </ul>

    </section>

    <?php endif; ?>



    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>

    <section class="widget" id="small1">

		<h2 class="widget-title" ><?php _e('分类'); ?></h2>

        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>

	</section>

    <?php endif; ?>



<section class="widget" id="small1">

		<h2 class="widget-title" ><?php _e('友情链接'); ?></h2>

        <ul class="widget-list">

<li><a href="http://cyanku.com/" target='_blank'>通过以太水晶传送</li>

</ul>

	</section>





    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>

    <section class="widget small-hide">

		<h2 class="widget-title "><?php _e('归档'); ?></h2>

        <ul class="widget-list">

            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')

            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>

        </ul>

	</section>

    <?php endif; ?>



    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>

	<section class="widget small-hide">

		<h2 class="widget-title "><?php _e('其它'); ?></h2>

        <ul class="widget-list">

            <?php if($this->user->hasLogin()): ?>

				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>

                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>

            <?php else: ?>

                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>

            <?php endif; ?>

            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>

            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>

            <li><a href="http://www.typecho.org">Typecho</a></li>

        </ul>

	</section>

    <?php endif; ?>



</div><!-- end #sidebar -->

