<?php
function taglist(){
	$posttags = get_the_tags();
	if ($posttags) {
		foreach ($posttags as $tag) {
			$tags[] = $tag->name;
		}
		echo implode(", ", $tags);
		unset($tags);
	}
}
?>

<div class="tabbox">

<div class="btm-border">
	<ul class="wrap-pd0 tab">
		<li class="select">新着テキスト</li>
		<li>新着イラスト</li>
		<li>新着メモ・草稿</li>
	</ul>
</div>

<div class="btm-border tab-wrap">
<ul class="wrap-pd0">
<?php
	$myposts = get_posts(array(
		'numberposts' => 7,
		'category'    => 2
	));
	foreach ($myposts as $post) : setup_postdata( $post );
?>
<li><?php echo newtag(); ?>
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span><?php taglist(); ?></span><span>（<?php echo get_the_date('Y/m/d H:i'); ?>）</span>
</li>
<?php endforeach; wp_reset_postdata(); ?>
</ul>
</div>

<div class="btm-border tab-wrap disnon">
<ul class="wrap-pd0">
<?php
	$myposts = get_posts(array(
		'numberposts' => 11,
		'category'    => 3
	));
	foreach ($myposts as $post) : setup_postdata( $post );
?>
<li>
	<a href="<?php the_permalink(); ?>"><?php 
	$image_id  = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'tab-thumb', true);
	echo '<img src="'.$image_url[0].'" alt="'.get_the_title().'">'; ?></a>
</li>
<?php endforeach; wp_reset_postdata(); ?>
</ul>
</div>

<div class="btm-border tab-wrap disnon">
<ul class="wrap-pd0">
<?php
	$myposts = get_posts(array(
		'numberposts' => 7,
		'category'    => 4
	));
	foreach ($myposts as $post) : setup_postdata( $post );
?>
<li><?php echo newtag(); ?>
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span><?php taglist(); ?></span><span>（<?php echo get_the_date('Y/m/d H:i'); ?>）</span>
</li>
<?php endforeach; wp_reset_postdata(); ?>
</ul>
</div>

</div>
