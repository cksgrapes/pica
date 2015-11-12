<?php get_header(); ?>

<!-- #contents -->
<div id="contents">

<?php get_search_form(); get_template_part('news'); ?>
<?php if(!empty($posts)) : get_template_part( 'loop', esc_html($_GET["category"]) ); ?>
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
