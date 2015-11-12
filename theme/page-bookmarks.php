<?php
/*Template Name: Bookmarks*/
 get_header(); ?>

<!-- contents -->
<div id="contents">

<div class="btm-border">
	<h2 class="wrap ttl-large">Bookmarks</h2>
</div>

<?php
$count = 0;
$genre = array('テニスの王子様','遙かなる時空の中で','Scared Rider Xechs','サーチ・リンク');
foreach ($genre as $key) :
$bookmarks = wp_list_bookmarks(array(
	'category_name'	   => $key,
	'title_li'         => '',
	'categorize'       => 0,
	'show_description' => 1,
	'show_images'      => 0,
	'echo'             => 0
	));
?>
<div class="btm-border">
<?php if ($count % 2 == 0) : ?>
<div class="wrap page-box-left">
<?php else : ?>
<div class="wrap page-box-right">
<?php endif; ?>
	<h2 class="page-title"><?php echo $key; ?></h2>
	<div class="page-content">
	<ul class="bookmarks">
	<?php echo $bookmarks; ?>
	</ul>
	</div>
</div>
</div>
<?php $count++; endforeach; ?>

<!-- go to top -->
<div class="btm-border">
<div class="gototop">
<a href="#header"><span class="icon-arrow-up"></span> ページトップへもどる</a>
</div>
</div>
<!-- /go to top -->

</div>
<!-- /contents -->

<?php get_footer(); ?>
