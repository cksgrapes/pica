<?php get_header(); ?>
<?php $cat = get_the_category(); $cat = $cat[0]; ?>

<!-- #contents -->
<div id="contents">

<?php if(!empty($posts)) : while ( have_posts() ) : the_post(); ?>

<?php the_title('<h2 class="wrap ttl-large">','</h2>'); ?>


<?php if($cat->slug=='picture') : ?>
<div class="wrap single-pic-area">
		<?php 
	$image_id  = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'full', true);
	echo '<a href="'.$image_url[0].'"><img src="'.$image_url[0].'" alt="'.get_the_title().'" width="100%"></a>'; ?>
		<p class="my-comment"><?php the_field('comment'); ?></p>
</div>
<?php else : ?>
<div class="wrap text-single-area">
		<?php the_content(); ?>
		<p class="my-comment"><?php the_field('comment'); ?></p>
</div>
<?php endif; ?>

<?php get_search_form(); ?>

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
