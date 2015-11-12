<!DOCTYPE html>
<html lang="ja">
<head>
<!-- ===== meta ===== -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
<title><?php if(is_search()||esc_html($_GET["category"])!='') { echo search_title(); } else { wp_title('|',true,'right'); } ?> <?php bloginfo('name');?></title>
<meta name="format-detection" content="telephone=no">
<!-- ===== common styleseet ===== -->
<link href="/css/font.css" rel="stylesheet">
<link href="/sp/css/common.css" rel="stylesheet">
<link href="/sp/css/base.css" rel="stylesheet">
<link href="/sp/css/layout.css" rel="stylesheet">
<link href="/sp/css/modules.css" rel="stylesheet">
<link href="/sp/css/unique.css" rel="stylesheet">
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

<!-- container -->
<div id="container">

<!-- header -->
<div id="header">
<h1><a href="<?php echo home_url( '/' ); ?>"><img src="/sp/img/logo.png" alt="PICA" width="140"></a></h1>
<?php wp_nav_menu(array(
			'theme_location'=>'global', 
			'container'     =>'', 
			'menu_class'    =>'global-menu')); ?> 
</div>
<!-- /header -->


