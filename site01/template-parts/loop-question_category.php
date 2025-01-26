          <!-- カテゴリー１ブロック ！openクラス対象-->
          <li class="category-lists__list <?php echo $args->slug; ?>">
            <h2 class="category-title"><span><?php echo $args->name; ?></span></h2><!-- /.category-title -->
            <!-- カテゴリーごとの質問リスト ！アコーディオン-->
            <ul class="question-lists">
              <? 
              //投稿タイプ
              $postargs = array(
                'post_type' => 'q_and_a',
                'posts_per_page' => -1,
              );
              //回答の種類で絞り込む
              $taxquerysp = array('relation' => 'AND');
              $taxquerysp[] = array(
                'taxonomy' => 'kind',
                'terms' => $args->slug,
                'field' => 'slug',
              );
              $postargs['tax_query'] = $taxquerysp;

              $the_query = new WP_Query($postargs);
              if (!empty($the_query)):
              ?>
                <?php if( $the_query->have_posts() ) : ?>
                  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php get_template_part('template-parts/loop', 'question_question'); ?>
                  <?php endwhile; ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>
            </ul><!-- /.question-lists -->
          </li><!-- /.category-lists__list -->