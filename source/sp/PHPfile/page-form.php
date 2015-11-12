<!DOCTYPE
/*Template Name: Form*/
 html>
<!--[if IE 7]><html class="lte-ie8 lte-ie7 ie7" lang="ja"><![endif]-->
<!--[if IE 8]><html class="lte-ie8 ie8" lang="ja"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ja"><!--<![endif]-->
<head>
<!-- ===== meta ===== -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=600">
<title>Mail form | <?php bloginfo('name');?></title>
<meta name="format-detection" content="telephone=no">
<!-- ===== common styleseet ===== -->
<link href="/css/common.css" rel="stylesheet">
<link href="/css/base.css" rel="stylesheet">
<link href="/css/unique.css" rel="stylesheet">
<!-- ===== javascript ===== -->
<script src="/shared/js/modernizr.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/jquery.js"><\/script>')</script>
</head>

<body id="mailform">
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
</body>
</html>
