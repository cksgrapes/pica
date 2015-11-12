<!-- post-list-pic -->
<div class="post-list-pic wrap-pd0">

<?php while ( have_posts() ) : the_post(); ?>
<a href="<?php echo get_permalink(); ?>" class="wrap">
	<?php 
	$image_id  = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'top-thumb', true);
	echo '<img src="'.$image_url[0].'" alt="'.get_the_title().'" width="80">'; ?>
	<div class="inner">
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
	</div>
</a>
<?php endwhile; ?>

</div>
<!-- /post-list-pic -->

<!-- pagenation -->
<div class="postsNav"><?php posts_nav_link(' | ','&lt; 前へ','次へ &gt;'); ?></div>
<!-- /pagenation -->
