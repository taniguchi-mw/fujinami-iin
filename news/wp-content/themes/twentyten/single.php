<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta name="viewport" content="target-densitydpi=device-dpi, width=980, maximum-scale=1.0, user-scalable=yes">
<title>
<?php the_title(); ?>
| 当院からのお知らせ | 広島市西区の内科 藤浪医院</title>
<meta name="keywords" content="藤浪医院,内科,広島,プラセンタ注射,美容皮膚,お知らせ,ニュース" />
<meta name="description" content="藤浪医院からのお知らせです。" />
<link rel="shortcut icon" href="http://fujinami-iin.com/images/favicon.ico" />
<link rel="stylesheet" href="http://fujinami-iin.com/css/layout.css" type="text/css" />
<link rel="stylesheet" href="http://fujinami-iin.com/css/set.css" type="text/css" />
<link rel="stylesheet" href="http://fujinami-iin.com/css/editor-style.css" type="text/css" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">google.load("jquery", "1.4");</script>
<script type="text/javascript" src="http://fujinami-iin.com/js/all.js"></script>
</head>
<body>
<?php include_once("http://fujinami-iin.com/analyticstracking.php") ?>
<div id="container">
  <div id="global-header">
    <h1>
      <?php the_title(); ?>
      | 当院からのお知らせ | 広島市西区の内科・美容皮膚・自由診療</h1>
    <?php get_header(); ?>
  </div>
  <div id="pankuzu"><a href="http://fujinami-iin.com/index.php">トップページ</a> &gt; <a href="<?php bloginfo(url); ?>">当院からのお知らせ一覧</a> &gt;
    <?php the_title(); ?>
  </div>
  <div id="contents">
    <h2>当院からのお知らせ</h2>
    <div class="w610_mb30 p_pb10" id="newslist">
      <?php if(have_posts()):while(have_posts()):the_post(); ?>
      <span class="datetime_list">
      <?php the_time('Y.m.d') ?>
      </span>
      <h3>
        <?php the_title(); ?>
      </h3>
      <div class="newslist_contents">
        <?php the_content(); ?>
      </div>
      <div class="navlink clearfix">
        <p class="prev">
          <?php previous_posts_link('« 前のページ');?>
        </p>
        <p class="next">
          <?php next_posts_link('次のページ»'); ?>
        </p>
      </div>
      <?php endwhile;endif; ?>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
</body>
</html>
