<!-- .search-form -->
<div class="btm-border">
<div class="search-area wrap">
	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<div class="search-box">
			<div class="selectbox">
				<div class="select"><span class="text">テキスト (<?php $catcount = get_category_by_slug('text'); echo $catcount->count; ?>)</span><span class="btn"><span class="icon-menu"></span></span></div>
				<ul class="pulldown">
				<li id="text">テキスト (<?php $catcount = get_category_by_slug('text'); echo $catcount->count; ?>)</li>
				<li id="picture">イラスト (<?php $catcount = get_category_by_slug('picture'); echo $catcount->count; ?>)</li>
				<li id="memo">メモ・草稿 (<?php $catcount = get_category_by_slug('memo'); echo $catcount->count; ?>)</li>
				<!-- <li id="twitter">Twitterログ (<?php //$catcount = get_category_by_slug('twitter'); echo $catcount->count; ?>)</li> -->
				</ul>
			<input type="hidden" name="category" id="category" value="" />
			</div>
			<input type="text" value="" name="s" id="s" class="keyword">
			<input type="submit" class="submit" value="さがす">
		</div>
	</form>
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
	<ul class="search-result">
		<li>［カテゴリ］　<?php if(!empty($catname)) : echo $catname; else : ?>テキスト<?php endif; ?></li>
		<li>［キーワード］　<?php if(!empty($key)) : echo $key; else : ?>--<?php endif; ?></li>
	</ul>
	<?php endif; ?>
</div>
</div>
<!-- .search-form -->
