<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta name="viewport" content="target-densitydpi=device-dpi, width=980, maximum-scale=1.0, user-scalable=yes">
<title>当院からのお知らせ一覧 | 広島市西区の内科・美容皮膚・自由診療 藤浪医院</title>
<meta name="keywords" content="藤浪医院,内科,広島,プラセンタ注射,美容皮膚,お知らせ,ニュース" />
<meta name="description" content="藤浪医院からのお知らせ一覧です。" />
<link rel="shortcut icon" href="http://fujinami-iin.com/images/favicon.ico" />
<link rel="stylesheet" href="http://fujinami-iin.com/css/layout.css" type="text/css" />
<link rel="stylesheet" href="http://fujinami-iin.com/css/set.css" type="text/css" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">google.load("jquery", "1.4");</script>
<script type="text/javascript" src="http://fujinami-iin.com/js/all.js"></script>
</head>
<body>
<?php include_once("http://fujinami-iin.com/analyticstracking.php") ?>
<div id="container">
  <div id="global-header">
    <h1>当院からのお知らせ | 広島市西区の内科・美容皮膚・自由診療</h1>
<?php get_header(); ?>
  </div>
  <div id="pankuzu"><a href="../index.php">トップページ</a> &gt; 当院からのお知らせ一覧</div>
  <div id="contents">
    <h2>当院からのお知らせ</h2>
    <p class="w610_mb30">藤浪医院からのお知らせ一覧です。</p>
    <?php $paged = get_query_var('paged'); ?>
    <?php query_posts($query_string . '&posts_per_page=10&paged='.$paged); ?>
    <ul id="newslist">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <li> <span class="datetime_list">
        <?php the_time('Y.m.d') ?>
        </span>
        <h3> <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a> </h3>
        <p><?php echo mb_substr(strip_tags($post-> post_content), 0, 100); ?> <a href="<?php the_permalink(); ?>"><span class="detail">続きを読む</span></a ></p>
      </li>
      <?php endwhile; endif; ?>
    </ul>
    <div class="navlink clearfix">
      <p class="prev">
        <?php previous_posts_link('« 前のページ');?>
      </p>
      <p class="next">
        <?php next_posts_link('次のページ»'); ?>
      </p>
    </div>
    <?php wp_reset_query(); ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
</body>
</html>
