<!-- トップページ -->

<?php get_header(); ?>
  <div id="wrapper" class="w-front-page">
    <div class="mainvisual">
      <img src="<?php echo get_template_directory_uri(); ?>/img/mainvisual.jpg" alt="メイン画像" class="mainvisual__image">
      <div class="mainvisual__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/img/salon_logo.jpg" alt="レンタルスペース研究所" class="wow bounceIn">
      </div><!-- /.mainvisual__logo -->
    </div><!-- /.main-visual -->
    <div class="main" id="js-main">
      <div class="content">
        <div class="container">

          <!-- 今日の連絡 -->
          <?php 
            $postargs = array(
              'post_type' => array('post'),
              'posts_per_page' => 1,
              'orderby' => 'date',
              'order' => 'DESC',
              'cat' => '70',
            );
            $the_query = new WP_Query($postargs);
            $today_cat = get_category('70');
            if (!empty($the_query)):
           ?>
           <?php if( $the_query->have_posts() ) : ?>
            <section class="section-today">
              <h2 class="menu-title">
                <span class="post-main-title"><?php echo strtoupper($today_cat->slug); ?></span>
                <span class="post-sub-title"><?php echo $today_cat->name; ?></span>
              </h2>
              <?php if( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  <div class="section-today__comment" id="js-today-comment" data-width="">
                    <div class="today-date" id="js-today-date"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?></time></div><!-- /.today-date -->
                    <div class="section-today__comment__content-wrapper" id="js-today-content-wrapper">
                      <span class="link-target" id="js-today-content"><?php the_content(); ?></span>
                    </div><!-- /.section-today__content-wrapper -->
                    <div class="section-today__comment__other">
                      <?php echo do_shortcode("[wp_ulike]"); ?>
                      <a href="https://twitter.com/intent/tweet?hashtags=スペ研"   target="_blank" rel="nofollow" class="share-button twitter-front" id="share-twitter"></a>
                    </div><!-- /.section-today__other -->
                    <div class="today-more" id="js-today-more">
                      <span class="close">たたむ</span>
                      <span class="open">もっと読む</span>
                    </div><!-- /.today-more -->
                  </div><!-- /.today__comment -->
                <?php endwhile; ?>
              <?php endif; ?>
            </section><!-- /.section-today -->
            <?php endif; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>

          <!-- 過去の連絡 -->
          <?php if(get_category_link( 70 )): ?>
          <section class="section-index-link">
            <div class="index-link"><a href="<?php echo get_category_link( 70 ); ?>" class="btn bgleft"><span>過去の連絡</span></a></div><!-- /.index-link -->
          </section><!-- /.section-index-link -->
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
            <section class="section-news">
              <h2 class="menu-title">
                <span class="post-main-title">UPDATES</span>
                <span class="post-sub-title">更新記事</span>
              </h2>        
              <ul class="menu-lists menu-article">
                <?php if( $the_query->have_posts() ) : ?>
                  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php get_template_part('template-parts/loop', 'article_list_update'); ?>
                  <?php endwhile; ?>
                <?php endif; ?>
              </ul>
            </section><!-- /.section-news -->
            <?php endif; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
          
          <!-- 記事一覧ボタン -->
          <?php if(get_page_link( 668 )): ?>
          <section class="section-index-link">
            <div class="index-link"><a href="<?php echo get_page_link( 668 ); ?>" class="btn bgleft"><span>記事一覧</span></a></div><!-- /.index-link -->
          </section><!-- /.section-index-link -->
          <?php endif; ?>

          <!-- カスタムメニュー -->
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
            <?php get_template_part('template-parts/loop', 'front_menu', $menu); ?>
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
            <section class="section-announce">
            <h2 class="menu-title">
                <span class="post-main-title"><?php echo strtoupper($announce_cat->slug); ?></span>
                <span class="post-sub-title"><?php echo $announce_cat->name; ?></span>
              </h2>        
              <ul class="menu-lists menu-article">
                <?php if( $the_query->have_posts() ) : ?>
                  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php get_template_part('template-parts/loop', 'article_list_noimage'); ?>
                  <?php endwhile; ?>
                <?php endif; ?>
              </ul>            
            </section><!-- /.section-announce -->
            <?php endif; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>

          <!-- オーナーを取得 -->
          <?php if(get_page_link( 389 )): ?>
          <section class="section-owner">
            <h2 class="menu-title">
              <span class="post-main-title">OWNER</span>
              <span class="post-sub-title">オーナー</span>
            </h2>    
            <a class="section-owner__image" href="<?php echo get_page_link( 389 )?>">
            <?php if(get_the_post_thumbnail_url( 389 )): ?>
              <img src="<?php echo get_the_post_thumbnail_url( 389 ) ?>" alt="オーナー画像" class>
            <?php endif; ?>
            </a><!-- /.section-owner__image -->
          </section><!-- /.section-owner -->
          <?php endif; ?>

        </div><!-- /.container -->
      </div><!-- /.content -->
    </div><!-- /#js-main.main -->
  <?php get_sidebar(); ?>
  <div class="subvisual">
    <img src="<?php echo get_template_directory_uri(); ?>/img/subvisual01.jpg" alt="フッター画像1">
    <img src="<?php echo get_template_directory_uri(); ?>/img/subvisual02.jpg" alt="フッター画像2">
  </div><!-- /.subvisual -->
</div><!-- /#wrapper.w-front-page -->
<?php get_footer(); ?>