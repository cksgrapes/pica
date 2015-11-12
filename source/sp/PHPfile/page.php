<?php get_header(); ?>

<!-- #contents -->
<div id="contents">
<?php while ( have_posts() ) : the_post(); ?>
<div class="btm-border">
<?php the_title('<h2 class="wrap ttl-large">','</h2>'); ?>
</div>
<div class="btm-border">
<div class="wrap">
<?php the_content(); ?>
</div>
</div>
<?php endwhile; ?>
</div>
<!-- / #contents -->

<?php get_footer(); ?>
