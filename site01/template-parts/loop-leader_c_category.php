<div class="leader-c-category-wrapper js-accordion">
  <h4 class="leader-c-category js-accordion__target">
    <?php echo $args->name; ?>
  </h4><!-- /.leader-c-category -->
  <!-- リーダーリスト ！アコーディオン-->
  <ul class="leader-lists js-accordion__content">
    <? 
    // 投稿タイプ
    $postargs = array(
      'post_type' => 'p_leader',
      'posts_per_page' => -1,
      'meta_key'			=> 'leader_class',
      'orderby'			=> 'meta_value',
      'order'				=> 'ASC'
    );
    //リーダータイプで絞り込む
    $taxquerysp = array('relation' => 'AND');
    $taxquerysp[] = array(
      'taxonomy' => 't_leader',
      'terms' => $args->slug,
      'field' => 'slug',
    );
    $postargs['tax_query'] = $taxquerysp;

    $the_query = new WP_Query($postargs);
    ?>
    <?php if( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php get_template_part('template-parts/loop', 'leader_content', $args); ?>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </ul><!-- /.leader-lists -->
</div><!-- /.leader-c-category-wrapper -->