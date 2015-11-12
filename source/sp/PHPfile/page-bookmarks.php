<?php
/*Template Name: Bookmarks*/
 get_header(); ?>

<!-- contents -->
<div id="contents">

<?php
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
<h2 class="ttl-large"><?php echo $key; ?></h2>
<div class="wrap page-content">
<ul class="bookmarks">
<?php echo $bookmarks; ?>
</ul>
</div>
<?php endforeach; ?>

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
