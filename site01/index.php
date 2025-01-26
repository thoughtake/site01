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
                <select name="cat" id="js-category_select" class="category_select" data-category="<?php echo get_query_var('category_name'); ?>">
                  <option value="all">すべて</option>
                  <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->slug; ?>" <?php if (get_query_var('category_name') === $category->slug) { echo 'selected'; } ?>><?php echo $category->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div><!-- /.category_select-wrapper -->
            <?php endif; ?>
            <ul class="menu-lists menu-article" id="js-menu-lists">
            <? 
              $paged = get_query_var('paged') ? get_query_var('paged') : 1; 
              query_posts( $query_string.'&orderby=modified&posts_per_page=10&paged='.$paged);
              ?>
              <?php if( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                  <?php get_template_part('template-parts/loop', 'article_list_noimage'); ?>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </section>
          <?php if (function_exists('wp_pagenavi')) { wp_pagenavi();} ?>
          <?php wp_reset_query(); ?>
        </div><!-- /.container -->
      </div><!-- /.content -->
    </div><!-- /#js-main.main -->
    <?php get_sidebar(); ?>
  </div><!-- /#wrapper.w-index -->

<?php get_footer(); ?>