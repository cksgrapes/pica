<!-- post-list-text -->
<div class="post-list-text">

<?php $count = 0; while ( have_posts() ) : the_post(); ?>
<?php if ($count > 0 && $count % 5 == 0) : ?>
<!-- go to top -->
<div class="btm-border">
<div class="gototop">
<a href="#header"><span class="icon-arrow-up"></span> ページトップへもどる</a>
</div>
</div>
<!-- /go to top -->
<?php endif; ?>
<div class="btm-border">
<a href="<?php echo get_permalink(); ?>" class="post-list wrap">
	<div class="gray-box">
		<?php the_title('<h2>', '</h2>'); //the_excerpt(); ?>
		<?php echo mb_substr(get_the_excerpt(),0, 115);?>
	</div>
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
</div>
<?php $count++; endwhile; ?>

</div>
<!-- /post-list-text -->

<!-- go to top -->
<div class="btm-border">
<div class="gototop">
<a href="#header"><span class="icon-arrow-up"></span> ページトップへもどる</a>
</div>
</div>
<!-- /go to top -->

<!-- pagenation -->
<?php if (function_exists("pagination")) pagination($additional_loop->max_num_pages); ?>
<!-- /pagenation -->
