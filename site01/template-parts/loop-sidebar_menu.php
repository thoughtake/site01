<div class="archive-section-wrapper">
  <?php 
    $menu_title = preg_split( '/\//', $args->name);
    $items = wp_get_nav_menu_items(
      $args->slug,
      array(
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'post_type' => 'nav_menu_item',
      )
    ); 
  ?> 
  <?php if($menu_title[1]): ?>
    <div class="archive-title"><span><?php echo strtoupper($menu_title[2]); ?></span></div><!-- /.archive-title -->
  <?php endif; ?>
  <?php if (!empty($items)): ?>
    <ul class="archive-lists">
    <?php foreach($items as $item): ?>
      <?php get_template_part('template-parts/loop', 'sidebar_menu_list', $item); ?>
    <?php endforeach; ?>
    </ul><!-- /.archive-lists -->
  <?php endif; ?>
</div><!-- /.archive-section-wrapper -->