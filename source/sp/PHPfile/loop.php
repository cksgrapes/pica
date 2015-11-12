<!-- post-list-text -->
<div class="post-list-text">

<?php while ( have_posts() ) : the_post(); ?>
<a href="<?php echo get_permalink(); ?>" class="wrap">
	<?php the_title('<h2>', '</h2>'); //the_excerpt(); ?>
	<p><?php echo mb_substr(get_the_excerpt(),0, 50);?>[...]</p>
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
<?php endwhile; ?>

</div>
<!-- /post-list-text -->

<!-- pagenation -->
<div class="postsNav"><?php posts_nav_link(' | ','&lt; 前へ','次へ &gt;'); ?></div>
<!-- /pagenation -->
