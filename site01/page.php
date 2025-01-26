<!-- 固定ページテンプレート -->

<?php get_header(); ?>
<div id="wrapper" class="w-page">

  <main class="main" id="js-main">
    <div class="container">
      <div class="w-title-wrapper">
        <h1><?php the_title(); ?></h1>
      </div><!-- /.title-wrapper -->
      <div class="w-content-wrapper">
        <span><?php the_content(); ?></span>
      </div><!-- /.content-wrapper -->
    </div><!-- /.container -->
    
  </main><!-- /main -->

  <?php get_sidebar(); ?>
  
</div><!-- /#wrapper.page-leader -->


  
<?php get_footer(); ?>