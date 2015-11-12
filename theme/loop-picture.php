<!-- post-list-pic -->
<div class="btm-border">
<div class="post-list-pic wrap-pd0">

<div class="top-border">
<?php $count = 0; while ( have_posts() ) : the_post(); ?>
<?php if ($count > 0 && $count % 3 == 0) : ?>
</div>
<div class="top-border">
<?php endif; ?>
<a href="<?php echo get_permalink(); ?>" class="post-list">
	<?php 
	$image_id  = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'top-thumb', true);
	echo '<img src="'.$image_url[0].'" alt="'.get_the_title().'">'; ?>
	<?php the_title('<h2>', '</h2>'); ?>
	<ul class="post-data">
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
</a>
<?php $count++; endwhile; ?>
</div>

</div>
</div>
<!-- /post-list-pic -->

<!-- pagenation -->
<?php if (function_exists("pagination")) pagination($additional_loop->max_num_pages); ?>
<!-- /pagenation -->
