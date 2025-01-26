<h3 class="leader-p-category">
  <?php echo $args->name; ?>
</h3><!-- /.leader-p-category -->
<? 
// リーダーの種類(子)を取得
$kinds = get_terms(array(
  'taxonomy' => 't_leader',
  'orderby' => 'description',
  'order' => 'ASC',
  'parent' => $args->term_id,
));
if (!empty($kinds)):
?>
<?php foreach($kinds as $kind): ?>
  <?php get_template_part('template-parts/loop', 'leader_c_category', $kind); ?>
<?php endforeach; ?>
<?php endif; ?>   