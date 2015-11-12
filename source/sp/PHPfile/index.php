<?php get_header(); ?>

<!-- #contents -->
<div id="contents">

<?php
	switch (esc_html($_GET["category"])) {
		case 'text'    : $catname = 'テキスト'; break;
		case 'picture' : $catname = 'イラスト'; break;
		case 'memo'    : $catname = 'メモ・草稿'; break;
		case 'twitter' : $catname = 'Twitterログ'; break;
	}
	$key = esc_html($_GET["s"]);
	?>

<?php if(!is_single()) : ?>
<ul class="search-result wrap">
	<li>［カテゴリ］　<?php if(!empty($catname)) : echo $catname; else : ?>テキスト<?php endif; ?></li>
	<li>［キーワード］　<?php if(!empty($key)) : echo $key; else : ?>--<?php endif; ?></li>
</ul>
<?php endif; ?>
<?php if(!empty($posts)) : get_template_part( 'loop', esc_html($_GET["category"]) ); ?>
<?php else : ?>
<div class="wrap">
<p>404 not found</p>
<p>お探しの記事が見つかりませんでした。</p>
</div>
<?php endif; ?>

<?php get_search_form(); ?>

<!-- go to top -->
<div class="btm-border">
<div class="gototop">
<a href="#header"><span class="icon-arrow-up"></span> ページトップへもどる</a>
</div>
</div>
<!-- /go to top -->

</div>
<!-- / #contents -->

<?php get_footer(); ?>
