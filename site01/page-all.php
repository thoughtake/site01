<!-- 投稿一覧 -->

<?php get_header(); ?>
<div id="wrapper" class="w-index">
  <div class="main" id="js-main">
    <div class="content">
      <div class="container">
        <!-- 新着を取得 -->
        <section class="section-article">
          <h1>
            記事一覧
          </h1>     
          <!-- カテゴリーセレクトボックス -->
          <?php 
          $categories = get_categories(array(
            'orderby' => 'description'
          ));
          ?>
          <?php if($categories): ?>
            <div class="category_select-wrapper">
              <select name="cat" id="js-category_select" class="category_select">
                <option hidden>カテゴリ</option>
                <!-- <option value="all">すべて</option> -->
                <?php foreach($categories as $category): ?>
                  <option value="<?php echo $category->slug ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
              </select>
              <!-- <span class="category_select-comment">カテゴリー</span> -->
            </div><!-- /.category_select-wrapper -->
          <?php endif; ?>
          <ul class="menu-lists menu-article" id="js-menu-lists">
          <? 
            $paged = get_query_var('paged')? get_query_var('paged') : 1;
            //投稿タイプ
            $postargs = array(
              'post_type' => array('post'),
              'posts_per_page' => 10,
              'orderby' => 'modified',
              'order' => 'DESC',
              'paged' => $paged,
            );
            $the_query = new WP_Query($postargs);
            if (!empty($the_query)):
            ?>
            <?php if( $the_query->have_posts() ) : ?>
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php get_template_part('template-parts/loop', 'article_list_noimage'); ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </ul>
          <?php if (function_exists('wp_pagenavi')) { wp_pagenavi(array('query'=>$the_query));} ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </section>
      </div><!-- /.container -->
    </div><!-- /.content -->
  </div><!-- /#js-main.main -->
  <?php get_sidebar(); ?>
</div><!-- /#wrapper.w-index -->

<?php get_footer(); ?>