<!-- Q&A -->

<?php get_header(); ?>
<div id="wrapper" class="w-page-question">

  <main class="main" id="js-main">
    <div class="container">
      <div class="w-title-wrapper">
        <h1><?php the_title(); ?></h1>
      </div><!-- /.title-wrapper -->
      <div class="w-content-wrapper effect">
        <span><?php the_content(); ?></span>
      </div><!-- /.content-wrapper -->
    </div><!-- /.container -->

    <!-- 検索フォーム -->
    <?php get_search_form(); ?>

    <!-- カテゴリーと質問リスト -->
    <div class="content">
      <div class="container">
        <ul class="category-lists">
          <? 
          // 質問の種類を取得
          $kinds = get_terms(array(
            'taxonomy' => 'kind',
            'orderby' => 'description',
            'order' => 'ASC',
          ));
          if (!empty($kinds)):
          ?>
          <?php foreach($kinds as $kind): ?>
            <?php get_template_part('template-parts/loop', 'question_category', $kind); ?>
          <?php endforeach; ?>
          <?php endif; ?>       
        </ul><!-- /.category-lists -->
      </div><!-- /.container -->
    </div><!-- /.content -->
    
  </main><!-- /main -->

  <?php get_sidebar(); ?>
  
</div><!-- /#wrapper.page-question -->


  
<?php get_footer(); ?>