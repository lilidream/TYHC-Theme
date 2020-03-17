<?php
/**
 * TOYOHAY Cloud的主题
 * 
 * @package TYHC Theme 
 * @author TOYOHAY
 * @version 1.0
 * @link http://nightship.cn
 */
?>
<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="guide">
	<ul>
		<li><a href="http://wg.nightship.cn/" target="_blank">WeatherGirl</a></li>
		<li><a href="http://n.nightship.cn/" target="_blank">WeatherGirl Navigation</a></li>
		<li><a href="http://mcu.nightship.cn/" target="_blank">MythCraft University</a></li>
	</ul>
</div>

<?php $this->need('sidebar.php'); ?>
<div class="col-mb-12 col-8" id="main" role="main">
	<?php while($this->next()): ?>
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
			<h2 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<ul class="post-meta">
				<li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
				<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
				<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
				<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
			</ul>
            <div class="post-content-small" itemprop="articleBody">
				<?php
					if(preg_match('/<!--more-->/',$this->content)||mb_strlen($this->content, 'utf-8') < 140)
					{
						$this->content('> 阅读全文 <');
					}
					else
					{ 
						$c=mb_substr($this->content, 0, 140, 'utf-8');
						echo $c.'...';
						echo '</br><p class="more"><a href="',$this->permalink(),'" title="',$this->title(),'">> 阅读全文<</a></p>';
					}
				?>
            </div>
        </article>
	<?php endwhile; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
</div>