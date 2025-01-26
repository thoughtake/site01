<!-- リーダー紹介 -->

<?php get_header(); ?>
<div id="wrapper" class="w-page-leader">

  <main class="main" id="js-main">
    <div class="container">
      <div class="w-title-wrapper">
        <h1><?php the_title(); ?></h1>
      </div><!-- /.title-wrapper -->
      <div class="w-content-wrapper effect">
        <span><?php the_content(); ?></span>
      </div><!-- /.content-wrapper -->
    </div><!-- /.container -->

    <div class="content">
      <div class="container">
          <? 
          // リーダーの種類(親)を取得
          $kinds = get_terms(array(
            'taxonomy' => 't_leader',
            'orderby' => 'description',
            'order' => 'ASC',
            'parent' => 0,
          ));
          if (!empty($kinds)):
          ?>
          <?php foreach($kinds as $kind): ?>
            <?php get_template_part('template-parts/loop', 'leader_p_category', $kind); ?>
          <?php endforeach; ?>
          <?php endif; ?>       
      </div><!-- /.container -->
    </div><!-- /.content -->

    <div class="image-box">
      <div class="container">
        <img src="<?php echo get_template_directory_uri(); ?>/img/leader_shirt.png" alt="リーダーさんありがとう">
      </div><!-- /.container -->
    </div><!-- /.image-box -->
    
  </main><!-- /main -->

  <?php get_sidebar(); ?>
  
</div><!-- /#wrapper.page-leader -->


  
<?php get_footer(); ?>