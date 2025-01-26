<li class="menu-lists__list">
<!-- カスタム投稿:外部リンク の場合 -->
<?php if(get_post_type($args->object_id) == 'p_link'): ?>
  <a href="<?php the_field('link_url', $args->object_id); ?>" target="_blank">
    <h3 class="list-title"><span><?php echo $args->title; ?></span></h3>
    <div class="list-content">
      <?php if(get_field('link_image', $args->object_id)): ?>
        <img src="<?php the_field('link_image', $args->object_id); ?>" alt="記事画像">
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/salon-logo-icon.png" alt="記事画像">
      <?php endif; ?>
        <div class="list-content__wrapper">
          <div class="list-excerpt js-char-limit" data-sp="40" data-md="80" data-lg="100">
          <?php if(get_field('link_excerpt', $args->object_id)): ?>
            <?php the_field('link_excerpt', $args->object_id); ?>
          <?php endif; ?>
          </div>
          <div class="list-category">
            <span class="list-category__link">リンク</span>
          </div><!-- /.list-category -->
        </div><!-- /.list-content__wrapper -->
    </div><!-- /.list-content -->
  </a>
<!-- それ以外 -->
<?php else: ?>
  <a href="<?php echo $args->url; ?>">
    <h3 class="list-title"><span><?php echo $args->title; ?></span></h3>
    <div class="list-content">
      <?php if(get_the_post_thumbnail_url($args->object_id)): ?>
        <img src="<?php echo get_the_post_thumbnail_url($args->object_id); ?>" alt="記事画像">
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/salon-logo-icon.png" alt="記事画像">
      <?php endif; ?>
      <div class="list-content__wrapper">
        <div class="list-excerpt js-char-limit" data-sp="40" data-md="80" data-lg="100">
        <?php if($args->object != "category"): ?>
          <?php if(get_the_excerpt($args->object_id)): ?>
            <?php echo get_the_excerpt($args->object_id); ?>
          <?php elseif (get_the_content($args->object_id)): ?>
            <?php 
              $content = get_the_content($args->object_id);
              $content = wp_strip_all_tags($content);
              $content = strip_shortcodes($content);
            ?>
            <?php echo $content; ?>
          <?php endif; ?>
        <?php else: ?>
            <?php 
              $menu_category = get_category($args->object_id); 
              if ($menu_category) {
                echo $menu_category->name.'の記事一覧';
              }
              ?>
        <?php endif; ?>
        </div>
        <?php $categories = get_the_category($args->object_id); ?>
        <div class="list-category">
          <?php if ($categories): ?>
            <?php foreach($categories as $category): ?>
              <span class="list-category__<?php echo $category->slug; ?>"><?php echo $category->name; ?></span>
            <?php endforeach; ?>
          <?php endif; ?>
        </div><!-- /.list-category -->
      </div><!-- /.list-content__wrapper -->
    </div><!-- /.list-content -->
  </a>
<?php endif; ?>
</li>