<?php 

/*--------------------------------------------------------
 機能をサポート
--------------------------------------------------------*/

// アイキャッチ登録
add_theme_support( 'post-thumbnails' );
add_image_size( 'top-thumb', 240, 240, true );
add_image_size( 'tab-thumb', 80, 80, true );
// エディタのスタイル
add_theme_support( 'editor-style' );
// ナビゲーションメニュー登録
register_nav_menus( array(
    'global'  => 'グローバルメニュー'
));

function themename_customize_register($wp_customize){

    $wp_customize->add_section('themename_color_scheme', array(
        'title'    => 'メインカラー',
        'priority' => 30,
    ));

    //  =============================
    //  = Select Box                =
    //  =============================
     $wp_customize->add_setting('main_color', array(
        'default'        => 'c0392b',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'main_color',
        'label'   => '色を選択する:',
        'section' => 'themename_color_scheme',
        'type'    => 'select',
        'choices'    => array(
            'c0392b' => 'Pomegranate',
            '2980b9' => 'Belize Hole',
            '16a085' => 'Green Sea',
            'd35400' => 'Pumpkin',
            '27ae60' => 'Nephritis',
        ),
    ));
}

add_action('customize_register', 'themename_customize_register');


/*--------------------------------------------------------
 ヘッダの不要タグを削除
--------------------------------------------------------*/
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator' ); 

/*--------------------------------------------------------
 フィードの生成を停止
--------------------------------------------------------*/
// RDF/RSS 1.0 ( http://example.com/feed/rdf/ )
remove_action('do_feed_rdf', 'do_feed_rdf', 10, 1);
// RSS 0.92 ( http://example.com/feed/rss/ )
remove_action('do_feed_rss', 'do_feed_rss', 10, 1);
// RSS 2.0 ( http://example.com/feed/ )
remove_action('do_feed_rss2', 'do_feed_rss2', 10, 1);
// Atom ( http://example.com/feed/atom/ )
remove_action('do_feed_atom', 'do_feed_atom', 10, 1);
automatic_feed_links(false);

/*--------------------------------------------------------
 moreリンクの#を無効か
--------------------------------------------------------*/
function custom_content_more_link( $output ) {
    $output = preg_replace('/#more-[\d]+/i', '', $output );
    return $output;
}
add_filter( 'the_content_more_link', 'custom_content_more_link' );

/*--------------------------------------------------------
 抜粋の[...]を消去/変更
--------------------------------------------------------*/
function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*--------------------------------------------------------
 抜粋の文字数を指定
--------------------------------------------------------*/
function new_excerpt_mblength($length) {
     return 115;
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

/*--------------------------------------------------------
 更新から一週間newタグをつける
--------------------------------------------------------*/
function newtag() {
    $days  = 7;
    $today = date_i18n( 'U' );
    $entry = get_the_time( 'U' );
    $sa    = date( 'U', ( $today - $entry ) / 86400 );
    if ( $days > $sa ){
        return '<span class="newmark">New!</span>';
    }
}

/*--------------------------------------------------------
        ビジュアルエディタにCSSを適用する
--------------------------------------------------------*/
add_editor_style('editor-style.css');

/*--------------------------------------------------------
 TinyMCEにスタイルを追加
--------------------------------------------------------*/
function my_tiny_mce_before_init( $init_array ) {
    $init_array['theme_advanced_styles'] = "空行（1行）=btm-space1;空行（4行）=btm-space2";
    return $init_array;
}
add_filter( 'tiny_mce_before_init', 'my_tiny_mce_before_init' );

/*--------------------------------------------------------
 JQueryを最新版に置換
--------------------------------------------------------*/
// function wpfme_jquery_enqueue() {
//     wp_deregister_script('jquery');
//     wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9/jquery.min.js", false, null);
//     wp_enqueue_script('jquery');
// }
// if (!is_admin()) add_action("wp_enqueue_scripts", "wpfme_jquery_enqueue", 11);
function load_cdn() {
    if ( !is_admin() ) {
    wp_deregister_script('jquery');
    }
}
add_action('init', 'load_cdn');

/*--------------------------------------------------------
  pre_get_post
--------------------------------------------------------*/
function set_post_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }
    if ( $query->is_home() || $query->is_search() || $query->is_tag() ) {
        $catname = esc_html($_GET["category"]);
        if( empty($catname) ) {
            $query->set( 'posts_per_page', 10 );
            $query->set( 'category_name', 'text' );
            return;
        } elseif( $catname == 'picture' ) {
            $query->set( 'posts_per_page', 9 );
            $query->set( 'category_name', 'picture' );
        } else {
            $query->set( 'posts_per_page', 10 );
            $query->set( 'category_name', $catname );
        }
        return;
    }
}
add_action( 'pre_get_posts', 'set_post_per_page');

/*--------------------------------------------------------
  「○件中○件を表示～」を表示
--------------------------------------------------------*/
function my_result_count() {
  global $wp_query;

  $paged = get_query_var( 'paged' ) - 1;
  $ppp   = get_query_var( 'posts_per_page' );
  $count = $total = $wp_query->post_count;
  $from  = 0;
  if ( 0 < $ppp ) {
    $total = $wp_query->found_posts;
    if ( 0 < $paged )
      $from  = $paged * $ppp;
  }
  printf(
    '<div class="btm-border"><div class="wrap-pd0 result-count">全%1$s件中 %2$s%3$s件目を表示</div></div>',
    $total,
    ( 1 < $count ? ($from + 1 . '〜') : '' ),
    ($from + $count )
  );
}

/*--------------------------------------------------------
  検索結果のタイトル表示
--------------------------------------------------------*/
function search_title(){
    $key = esc_html($_GET["s"]);
    switch (esc_html($_GET["category"])) {
        case 'text'    : $catname = 'テキスト'; break;
        case 'picture' : $catname = 'イラスト'; break;
        case 'memo'    : $catname = 'メモ・草稿'; break;
        case 'twitter' : $catname = 'Twitterログ'; break;
        default        : $catname = 'すべて'; break;
    }
    if(empty($key)) {
        return $catname.'の検索一覧 |';
    } elseif($catname=='すべて') {
        return ' 「'.$key.'」のすべての検索一覧 |';
    } else {
        return ' 「'.$key.'」の'.$catname.'検索一覧 |';
    }
}

/*--------------------------------------------------------
  ページネーション
--------------------------------------------------------*/
function pagination($pages = '', $range = 4){
     $showitems = ($range * 2)+1;
  
     global $paged;
     if(empty($paged)) $paged = 1;
  
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     } 
  
     if(1 != $pages)
     {
         echo "<div class=\"btm-border\"><div class=\"pagination wrap-pd0\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
  
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
  
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div></div>\n";
     }
}

/*--------------------------------------------------------
  コメントコールバック
--------------------------------------------------------*/
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <?php if ($comment->comment_approved == '0') : ?>
        <em>このコメントは管理者の承認待ちです。</em>
        <br />
    <?php endif; ?>
    <div id="comment-<?php comment_ID(); ?>">
    <em><?php comment_author(); ?></em>：<?php comment_text() ?><span>（<?php comment_date('Y/m/d H:i') ?>）</span>
    </div>
<?php
        }
?>
