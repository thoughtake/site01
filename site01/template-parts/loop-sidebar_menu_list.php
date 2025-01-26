<?php if(get_post_type($args->object_id) == 'p_link'): ?>
  <li class="archive-lists__list"><a href="<?php the_field('link_url', $args->object_id); ?>" target="_blank"><?php echo $args->title; ?></a></li><!-- /.archive-lists__list -->
<?php else: ?>
  <li class="archive-lists__list"><a href="<?php echo $args->url; ?>"><?php echo $args->title; ?></a></li><!-- /.archive-lists__list -->
<?php endif; ?>