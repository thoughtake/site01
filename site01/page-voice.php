<!-- 音声一覧 -->

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

    <div class="content">
      <div class="container">
          <? 
          // リーダーの種類(親)を取得
          $posts = get_posts(array(
            'category' => '69',
            'orderby' => 'modified',
            'order' => 'DESC',
            'posts_per_page' => -1,
          ));
          if (!empty($posts)):
          ?>
          <?php foreach($posts as $post): ?>
            <?php get_template_part('template-parts/loop', 'page_article', $post); ?>
          <?php endforeach; ?>
          <?php endif; ?>       
      </div><!-- /.container -->
    </div><!-- /.content -->
    
  </main><!-- /main -->

  <?php get_sidebar(); ?>
  
</div><!-- /#wrapper.page-leader -->


  
<?php get_footer(); ?>