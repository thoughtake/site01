 <!-- フロントページのメニュー部分 -->
<?php 
  $menu_title = preg_split( '/\//', $args->name);
  $items = wp_get_nav_menu_items(
    $args->slug,
    array(
      'order' => 'ASC',
      'orderby' => 'menu_order',
      'post_type' => 'nav_menu_item',
    )
  )
  ; ?>
<section class="<?php if($menu_title[1]) { echo 'section-'.$menu_title[1]; } ?>">
  <h2 class="menu-title">
    <?php if($menu_title[1]): ?>
    <span class="post-main-title"><?php echo strtoupper($menu_title[1]); ?></span>
    <?php endif; ?>
    <?php if($menu_title[2]): ?>
    <span class="post-sub-title"><?php echo $menu_title[2]; ?></span>
    <?php endif; ?>
  </h2>
  <ul class="menu-lists menu-<?php echo $menu_title[1]; if ($menu_title[3] == "square") { echo ' menu-'.$menu_title[3];} ?>">
    <?php if (!empty($items)): ?>
    <?php foreach($items as $item): ?>
      <?php get_template_part('template-parts/loop', 'front_menu_list', $item); ?>
    <?php endforeach; ?>
    <?php endif; ?>
  </ul>
</section>