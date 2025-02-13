<!-- カスタム投稿:外部リンク の場合 -->
<?php if(get_post_type() == 'p_link'): ?>
  <li class="menu-lists__list link">
    <a href="<?php the_field('link_url', get_the_ID()); ?>" target="_blank">
      <h3 class="list-title"><span><?php the_title(); ?></span></h3>
      <div class="list-date"><time datetime="<?php echo get_the_modified_date('Y-m-d', get_the_ID()); ?>"><?php echo get_the_modified_date('Y年m月d日', get_the_ID()); ?></time></div><!-- /.list-date -->
      <div class="list-content">
        <?php if(get_field('link_image', get_the_ID())): ?>
          <img src="<?php the_field('link_image', get_the_ID()); ?>" alt="記事画像">
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/img/salon-logo-icon.png" alt="記事画像">
        <?php endif; ?>
        <div class="list-content__wrapper">
          <div class="list-excerpt js-char-limit" data-sp="40" data-md="65" data-lg="90">
          <?php if(get_field('link_excerpt', get_the_ID())): ?>
          <?php the_field('link_excerpt', get_the_ID()); ?>
          <?php endif; ?>
          </div>
          <div class="list-category">
              <span class="list-category__link">リンク</span>
          </div><!-- /.list-category -->
        </div><!-- /.list-content__wrapper -->
      </div><!-- /.list-content -->
    </a>
  </li>
<!-- それ以外 -->
<?php else: ?>
<?php 
  $categories = get_the_category(get_the_ID()); 
  $category_class = "";
  if ($categories) {
    foreach($categories as $index => $category) {
      if ($index == 0) {
        $category_class = $category_class.$category->slug;
      } else {
        $category_class = $category_class.' '.$category->slug;
      }
    }
  }
?>
<li class="menu-lists__list <?php if ($categories) { echo $category_class; } ?>">
  <a href="<?php the_permalink(); ?>">
    <h3 class="list-title"><span><?php the_title(); ?></span></h3>
    <div class="list-date"><time datetime="<?php echo get_the_modified_date('Y-m-d'); ?>"><?php echo get_the_modified_date('Y年m月d日'); ?></time></div><!-- /.list-date -->
    <div class="list-content">
      <?php if(get_the_post_thumbnail_url(get_the_ID())): ?>
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="記事画像">
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/salon-logo-icon.png" alt="記事画像">
      <?php endif; ?>
      <div class="list-content__wrapper">
        <div class="list-excerpt js-char-limit" data-sp="40" data-md="65" data-lg="90">
        <?php if(has_excerpt()): ?>
          <?php echo the_excerpt(); ?>
        <?php elseif (get_the_content()): ?>
          <?php 
            $content = get_the_content();
            $content = wp_strip_all_tags($content);
            $content = strip_shortcodes($content);
          ?>
          <?php echo $content; ?>
        <?php endif; ?>
        </div>
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
</li>
<?php endif; ?>
</li>