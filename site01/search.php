<!-- レンタルスペース研究所検索結果 -->

<?php get_header(); ?>
<div class="w-page-question" id="wrapper">
  <main class="main">
  <div class="container">
      <div class="w-title-wrapper">
        <?php 
          $page = get_page(318);
        ; ?>       
        <h1><?php echo $page->post_title; ?></h1>
      </div><!-- /.title-wrapper -->
      <div class="w-content-wrapper effect">
        <span><?php echo $page->post_content; ?></span>
      </div><!-- /.content-wrapper -->
    </div><!-- /.container -->

    <!-- 検索フォーム -->
    <?php get_search_form(); ?>

    <!-- 検索キーワード等 -->
    <div class="search-detail">
      <div class="container">
        <h3 class="search-word">検索キーワード<span class="search-word__word"><span>「</span><?php the_search_query(); ?><span>」</span></h3><!-- /.container -->
      </div><!-- /.container -->
    </div><!-- /.search-word -->


    <!-- 検索結果 -->
    <div class="content result">
      <div class="container">
        <!-- 何も入力されなかった場合 -->
        <?php if (!($s || $get_cats || $get_tags)): ?>
          <div class="search-result-alert">
            <p>検索キーワードを入力してください</p>
          </div><!-- /.search-result-alert -->
        <!-- 文字数が１文字の場合 -->
        <?php elseif ((mb_strwidth($s,'UTF-8')/2)<1): ?>
          <div class="search-result-alert">
            <p>検索文字数が少なすぎます</p>
          </div><!-- /.search-result-alert -->
        <!-- 正常な検索の場合 -->
        <?php else: ?>
          <?php query_posts($query_string.'&posts_per_page=-1'); ?>
          <?php if( have_posts() ) : ?>
            <!-- 質問リスト ！アコーディオン-->
            <ul class="question-lists">
              <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part('template-parts/loop', 'question_question'); ?>
              <?php endwhile; ?>
            </ul><!-- /.question-lists -->
          <?php else: ?>
            <div class="search-result-alert">
              <p>検索結果はありませんでした</p>
            </div><!-- /.search-result-alert -->
          <?php endif; ?>
        <?php endif; ?>
      </div><!-- /.container -->
    </div><!-- /.content -->

    <!-- 一覧へ戻るボタン -->
    <div class="back-button"><a href="<?php echo get_page_link( 318 ); ?>" class="btn bgleft"><span>過去の質問 一覧</span></a></div><!-- /.back-button -->
    
  </main><!-- /main -->
</div><!-- /#wrapper.w-page-question -->
  
<?php get_footer(); ?>