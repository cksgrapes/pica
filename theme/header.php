<!DOCTYPE html>
<!--[if IE 7]><html class="lte-ie8 lte-ie7 ie7" lang="ja"><![endif]-->
<!--[if IE 8]><html class="lte-ie8 ie8" lang="ja"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ja"><!--<![endif]-->
<head>
<!-- ===== meta ===== -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=1100">
<title><?php if(is_search()||esc_html($_GET["category"])!='') { echo search_title(); } else { wp_title('|',true,'right'); } ?> <?php bloginfo('name');?></title>
<meta name="format-detection" content="telephone=no">
<!-- ===== common styleseet ===== -->
<link href="/css/font.css" rel="stylesheet">
<link href="/css/common.css" rel="stylesheet">
<link href="/css/base.css" rel="stylesheet">
<link href="/css/layout.css" rel="stylesheet">
<link href="/css/modules.css" rel="stylesheet">
<link href="/css/unique.css" rel="stylesheet">
<style type="text/css">
	a,
	.post-list-pic h2,
	.post-list-text h2 { color: #<?php echo get_option('main_color'); ?>; }
	.global-menu .current-menu-item a,
	.global-menu a:hover,
	.pagination a:hover,
	.pagination .current { background: #<?php echo get_option('main_color'); ?>; }
	.single-data-area .font-size-switch li.active,
	#submit { background: #<?php echo get_option('main_color'); ?>; border-color: #<?php echo get_option('main_color'); ?>; }
</style>
<!-- ===== javascript ===== -->
<script src="/js/modernizr.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/jquery.js"><\/script>')</script>
<script src="/js/jquery.easing.min.js"></script>
<script src="/js/midway.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/jquery.tile.min.js"></script>
<script src="/js/jquery.wikipedia.js"></script>
<script src="/js/common.js"></script>
<!-- ===== Wordpress ===== -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--[if lt IE 8]>  <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display='none'; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>    <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>      <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>      <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>        <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>あなたは旧式ブラウザをご利用中です</div>        <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>このウェブサイトを快適に閲覧するにはブラウザをアップグレードしてください。</div>      </div>      <div style='width: 75px; float: left;'><a href='http://www.mozilla.jp' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>      <div style='width: 75px; float: left;'><a href='http://www.microsoft.com/downloads/details.aspx?FamilyID=341c2ad5-8c3d-4347-8c03-08cdecd8852b&DisplayLang=ja' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>      <div style='width: 73px; float: left;'><a href='http://www.apple.com/jp/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>      <div style='float: left;'><a href='http://www.google.com/chrome?hl=ja' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>    </div>  </div>  <![endif]-->

<!-- container -->
<div id="container">

<!-- header -->
<div class="btm-border">
	<div id="header" class="wrap-pd0">
		<h1><a href="/"><img src="/img/logo.png" alt="PICA"></a></h1>
		<?php wp_nav_menu(array(
			'theme_location'=>'global', 
			'container'     =>'', 
			'menu_class'    =>'global-menu')); ?> 
	</div>
</div>
<!-- /header -->
