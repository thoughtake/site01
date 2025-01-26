<!-- 投稿ページ -->

<?php get_header(); ?>

<div id="wrapper" class="w-single">
  <main class="main" id="js-main">
    <div class="container">
    <?php if( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="w-title-wrapper">
          <h1><?php the_title(); ?></h1>
        </div><!-- /.title-wrapper -->
        <div class="w-content-wrapper link-target">
          <?php the_content(); ?>
        </div><!-- /.content-wrapper -->
        <div class="w-other-wrapper">
          <?php 
            $category = get_the_category(); 
            if (in_category(array('28'))) :
          ?>
            <?php echo do_shortcode("[wp_ulike]"); ?>
          <?php elseif (in_category(array('70'))): ?>
            <?php echo do_shortcode("[wp_ulike]"); ?>
            <a href="https://twitter.com/intent/tweet?hashtags=スペ研"   target="_blank" rel="nofollow" class="share-button" id="share-twitter">ツイートする</a>
          <?php endif; ?>
        </div><!-- /.w-other-wrapper -->
      <?php endwhile; ?>
    <?php endif; ?>
    </div><!-- /.container -->
    
  </main><!-- /main -->
  <?php get_sidebar(); ?>
</div><!-- /#wrapper.w-single -->
  
<?php get_footer(); ?>