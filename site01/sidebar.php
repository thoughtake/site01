<div class="archive-button-open" id="js-archive-button-open">
  <span></span><span></span><span></span>
</div><!-- /.archive__button -->
<aside class="sidebar-archive" id="js-archive">
  <div class="archive-button-close" id="js-archive-button-close">
    <span></span><span></span><span></span>
  </div><!-- /.archive__button -->
  <!-- ホームへ戻る -->
  <div class="archive-section-wrapper">
    <div class="archive-title"><span>ホーム</span></div><!-- /.archive-title -->
    <ul class="archive-lists top">
      <li class="archive-lists__list"><a href="<?php echo home_url(); ?>">ホーム</a></li><!-- /.archive-lists__list -->
    </ul><!-- /.archive-lists -->
  </div><!-- /.sideber-section-wrapper -->

  <!-- 今日の連絡 -->
  <?php 
    $today_post = get_posts(array(
      'post_type' => 'post',
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'DESC',
      'category' => '70',
    ));
    $today_id = $today_post[0]->ID;
    $today_url = get_page_link($today_id);
    $today_content = $today_post[0]->post_content;
    $today_cat = get_category('70');
    // $today_content = wp_strip_all_tags($today_content);
    // $today_content = strip_shortcodes($today_content);
    if (!empty($today_content)):
    ?>
    <div class="archive-section-wrapper">
      <div class="archive-title"><span><?php echo $today_cat->name; ?></span></div><!-- /.archive-title -->
      <ul class="archive-lists top">
        <li class="archive-lists__list"><a href="<?php echo $today_url; ?>"><?php echo $today_cat->name; ?></a></li><!-- /.archive-lists__list -->
        <li class="archive-lists__list"><a href="<?php echo get_category_link( 70 ); ?>">過去の連絡</a></li><!-- /.archive-lists__list -->
      </ul><!-- /.archive-lists -->
    </div><!-- /.sideber-section-wrapper -->
  <?php endif; ?>

  <!-- 更新記事 -->
  <? 
  //投稿タイプ
  $postargs = array(
    'post_type' => array('post'),
    'posts_per_page' => 5,
    'orderby' => 'modified',
    'order' => 'DESC',
    'cat' => array('-28', '-70'),
  );
  $the_query = new WP_Query($postargs);
  if (!empty($the_query)):
    ?>
    <?php if( $the_query->have_posts() ) : ?>
    <div class="archive-section-wrapper">
      <div class="archive-title"><span>更新記事</span></div><!-- /.archive-title -->
      <ul class="archive-lists">
      <?php if( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php get_template_part('template-parts/loop', 'sidebar_news_list'); ?>
        <?php endwhile; ?>
      <?php endif; ?>
      </ul><!-- /.archive-lists -->
    </div><!-- /.archive-section-wrapper -->  
    <?php endif; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

  <!-- 記事一覧 -->
  <div class="archive-section-wrapper">
    <div class="archive-title"><span>記事一覧</span></div><!-- /.archive-title -->
    <ul class="archive-lists">
      <li class="archive-lists__list"><a href="<?php echo get_page_link( 668 ); ?>">記事一覧</a></li><!-- /.archive-lists__list -->
    </ul><!-- /.archive-lists -->
  </div><!-- /.archive-section-wrapper -->

  <!-- メニュー一覧 -->
  <? 
  $menus = wp_get_nav_menus(
    array(
      'orderby' => 'name',
      'order' => 'ASC',
    )
  );
  if (!empty($menus)):
  ?>
  <?php foreach($menus as $menu): ?>
    <?php get_template_part('template-parts/loop', 'sidebar_menu', $menu); ?>
  <?php endforeach; ?>
  <?php endif; ?>   

  <!-- 告知 -->
  <? 
  //投稿タイプ
  $postargs = array(
    'post_type' => array('post'),
    'posts_per_page' => 2,
    'orderby' => 'modified',
    'order' => 'DESC',
    'cat' => '28',
  );
  $the_query = new WP_Query($postargs);
  $announce_cat = get_category('28');
  if (!empty($the_query)):
    ?>
    <?php if( $the_query->have_posts() ) : ?>
    <div class="archive-section-wrapper">
      <div class="archive-title"><span><?php echo $announce_cat->name; ?></span></div><!-- /.archive-title -->
      <ul class="archive-lists">
      <?php if( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php get_template_part('template-parts/loop', 'sidebar_news_list'); ?>
        <?php endwhile; ?>
      <?php endif; ?>
      </ul><!-- /.archive-lists -->
    </div><!-- /.archive-section-wrapper -->  
    <?php endif; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

  <!-- その他 -->
  <? 
  //投稿タイプ
  $postargs = array(
    'post_type' => array('post'),
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
  );
  //カテゴリーで絞り込む
  $taxquerysp = array('relation' => 'AND');
  $taxquerysp[] = array(
    'taxonomy' => 'category',
    // 'terms' => 'other',
    // 'field' => 'slug',
    'terms' => '29',
    'field' => 'ID',
  );
  $postargs['tax_query'] = $taxquerysp;
  $the_query = new WP_Query($postargs);
  $other_cat = get_category('29');
  if (!empty($the_query)):
    ?>
    <?php if( $the_query->have_posts() ) : ?>
    <div class="archive-section-wrapper">
      <div class="archive-title"><span><?php echo $other_cat->name; ?></span></div><!-- /.archive-title -->
      <ul class="archive-lists">
      <?php if( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php get_template_part('template-parts/loop', 'sidebar_news_list'); ?>
        <?php endwhile; ?>
      <?php endif; ?>
      </ul><!-- /.archive-lists -->    
    </div><!-- /.archive-section-wrapper -->
    <?php endif; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

  <div class="archive-section-wrapper">
      <div class="archive-title"><span>ユーザー</span></div><!-- /.archive-title -->
      <ul class="archive-lists">
        <li class="archive-lists__list"><a href="<?php echo wp_logout_url(); ?>">ログアウト</a></li><!-- /.archive-lists__list -->
      </ul><!-- /.archive-lists -->    
    </div><!-- /.archive-section-wrapper -->


</aside><!-- /.archive -->