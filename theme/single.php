<?php get_header(); ?>

<!-- #contents -->
<div id="contents">

<?php get_search_form(); ?>

<?php if(!empty($posts)) : while ( have_posts() ) : the_post(); ?>

<div class="btm-border">
	<div class="single-data-area wrap-pd0">
		<ul class="post-data">
			<li><span class="icon-folder-open"></span> <?php $cat = get_the_category();
				$cat = $cat[0]; echo $cat->cat_name; ?></li>
			<li><span class="icon-calendar"></span> <?php echo get_the_date('Y/m/d H:i'); ?></li>
			<li><span class="icon-tag"></span> <?php
					$posttags = get_the_tags();
					if ($posttags) {
						foreach ($posttags as $tag) {
							$tags[] = $tag->name;
						}
						echo implode(", ", $tags);
						unset($tags);
					} ?></li>
		</ul>
		<?php if($cat->slug=='text') : ?>
		<ul class="font-size-switch">
			<li id="fontS">小</li>
			<li id="fontM" class="active">中</li>
			<li id="fontL">大</li>
		</ul>
	<?php endif; ?>
	</div>
</div>

<div class="btm-border">
	<?php the_title('<h2 class="wrap ttl-large">','</h2>'); ?>
</div>

<div class="btm-border">
<?php if($cat->slug=='picture') : ?>
<div class="wrap single-pic-area">
		<?php the_content(); ?>
		<p class="my-comment"><?php the_field('comment'); ?></p>
</div>
<?php else : ?>
<div class="wrap single-text-area">
	<div class="gray-box">
		<?php the_content(); ?>
		<p class="my-comment"><?php the_field('comment'); ?></p>
	</div>
</div>
<?php endif; ?>
</div>

<div class="btm-border">
<div class="wrap comments-area">
	<p>コメント：</p>
	<?php comments_template(); ?>
</div>
</div>

<?php get_template_part('news'); ?>

<div class="btm-border">
<div class="post-navi wrap">
		<div class="post-navi-next"><?php next_post_link('%link','<span class="icon-arrow-left"></span> %title',true); ?></div>
		<div class="post-navi-prev"><?php previous_post_link('%link','%title <span class="icon-arrow-right"></span>',true); ?></div>
	</div>
</div>

<?php endwhile; ?>

<!-- go to top -->
<div class="btm-border">
<div class="gototop">
<a href="#header"><span class="icon-arrow-up"></span> ページトップへもどる</a>
</div>
</div>
<!-- /go to top -->

<?php if(is_user_logged_in()) { edit_post_link('この記事を編集', '<div class="btm-border"><div class="post-edit-link wrap-pd0">', '</div></div>'); } ?>
<?php else : ?>
<div class="btm-border">
<div class="wrap">
<p>404 not found</p>
<p>お探しの記事が見つかりませんでした。</p>
</div>
</div>
<?php endif; ?>

</div>
<!-- / #contents -->

<?php get_footer(); ?>
