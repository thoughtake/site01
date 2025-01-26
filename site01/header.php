<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css?<?php echo date('Ymd-Hi'); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?<?php echo date('Ymd-Hi'); ?>">
  <?php 
    $user = wp_get_current_user();
    if ( isset( $user->data ) && $user->has_cap( 'edit_posts' ) ):
   ?>
    <style type="text/css">
      .header, .sidebar-archive, .archive-button-open {
        margin-top: 46px;
      }
      @media screen and (min-width: 768px) {
        .header, .sidebar-archive, .archive-button-open {
          margin-top: 32px;
        }
      } 
    </style>
  <?php endif; ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="header">
    <nav class="header-nav">
      <div class="container">
      <?php if ( is_front_page() ): ?>
        <h1 class="header-nav__logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/salon_logo_blue.png" alt="レンタルスペース研究所"></a></h1><!-- /.header-nav__logo -->
      <?php else: ?>
        <div class="header-nav__logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/salon_logo_blue.png" alt="レンタルスペース研究所"></a></div><!-- /.header-nav__logo -->
      <?php endif; ?>
        <div class="header-nav__toggle" id="header-toggle">
          <span></span><span></span><span></span>
        </div><!-- /.header-nav__toggle -->
      </div><!-- /.container -->
    </nav><!-- /.header-nav -->
  </header><!-- /header -->