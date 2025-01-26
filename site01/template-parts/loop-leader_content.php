<?php 
  $member_id = get_field('member');
  // $member = get_post($member_id);
  ?>
<li class="leader-lists__list js-accordion">
  <div class="leader-lists__list__name-wrapper js-accordion__target">
    <?php if(get_field('image', $member_id)): ?>
      <img src="<?php the_field('image', $member_id); ?>" alt="リーダー画像">
    <?php else: ?>
      <img src="<?php echo get_template_directory_uri(); ?>/img/user.png" alt="リーダー画像">
    <?php endif; ?>
    <h5 class="leader-lists__list__name">
      <?php the_field('name', $member_id); ?>
    </h5><!-- /.leader-lists__list__name -->
    <div class="leader-lists__list__leader-class">
      <?php if(get_field('leader_class')['value'] == "02_sub"): ?>
        <span>サブリーダー</span>
      <?php endif; ?>
    </div><!-- /.leader-lists__list__leader-class -->
  </div><!-- /.leader-lists__list__name-wrapper -->
  <?php if(
    (get_field('comment')
    or get_field('twitter', $member_id)
    or get_field('discord', $member_id))
  ): ?>
    <div class="leader-lists__list__content js-accordion__content">
      <?php if(get_field('comment')): ?>
        <div class="leader-lists__list__content__comment link-target">
          <?php the_field('comment'); ?>
        </div><!-- /.leader-lists__list__content__comment -->
      <?php endif; ?>
      <?php if(get_field('twitter', $member_id)): ?>
        <p class="leader-lists__list__content__sns twitter link-target">
          <?php the_field('twitter', $member_id); ?>
        </p><!-- /.leader-lists__list__content__sns.twitter -->
      <?php endif; ?>
      <?php if(get_field('discord', $member_id)): ?>
        <p class="leader-lists__list__content__sns discord">
          <?php the_field('discord' ,$member_id); ?>
        </p><!-- /.leader-lists__list__content__sns.discord -->
      <?php endif; ?>
      <?php if(get_field('line', $member_id)): ?>
        <p class="leader-lists__list__content__sns line">
          <?php the_field('line' ,$member_id); ?>
        </p><!-- /.leader-lists__list__content__sns.discord -->
      <?php endif; ?>
      <?php if(get_field('instagram', $member_id)): ?>
        <p class="leader-lists__list__content__sns instagram link-target">
          <?php the_field('instagram' ,$member_id); ?>
        </p><!-- /.leader-lists__list__content__sns.discord -->
      <?php endif; ?>
      <?php if(get_field('email', $member_id)): ?>
        <p class="leader-lists__list__content__sns email">
          <?php the_field('email' ,$member_id); ?>
        </p><!-- /.leader-lists__list__content__sns.discord -->
      <?php endif; ?>
    </div><!-- /.leader-lists__list__content -->
  <?php endif; ?>
</li><!-- /.leader-lists__list -->