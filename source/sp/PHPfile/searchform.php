<!-- .search-form -->
<div class="search-area wrap">
	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<div class="search-box">
			<div class="select">
				<select name="category" id="category">
					<option value="text">テキスト</option>
					<option value="picture">イラスト</option>
					<option value="memo">メモ・草稿</option>
				</select>
				<span class="btn"><span class="icon-menu"></span></span>
			</div>
			<div class="keyword">
				<input type="text" value="" name="s" id="s" placeholder="キーワード">
			</div>
			<div class="submit"><input type="submit" value="さがす"></div>
		</div>
	</form>
</div>
<!-- .search-form -->
