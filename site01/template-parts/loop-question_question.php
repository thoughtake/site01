<!-- 質問１ブロック ！openクラス対象-->
<li class="question-lists__list">
  <h3 class="question-title"><span><?php the_field('question-title'); ?></span></h3><!-- /.question-title -->
  <!-- 質問詳細 ！アコーディオン-->
  <div class="question-detail">
    <p class="question-text link-target"><?php the_field('question-text'); ?></p>
    <!-- 写真 -->
    <?php 
    if((get_field('question-picture01')) 
    or (get_field('question-picture02')) 
    or (get_field('question-picture03'))
    or (get_field('question-picture04')))
    : ?>
    <div class="picture-wrapper">
      <?php if(get_field('question-picture01')): ?>
        <div class="picture-box">
          <img class="js-modal-open" src="<?php echo the_field('question-picture01'); ?>" alt="質問者画像1" data-target="for-modal">
        </div><!-- /.picture-box --> 
      <?php endif; ?>
      <?php if(get_field('question-picture02')): ?>
        <div class="picture-box">
          <img class="js-modal-open" src="<?php echo the_field('question-picture02'); ?>" alt="質問者画像2" data-target="for-modal">
        </div><!-- /.picture-box --> 
      <?php endif; ?>
      <?php if(get_field('question-picture03')): ?>
        <div class="picture-box">
          <img class="js-modal-open" src="<?php echo the_field('question-picture03'); ?>" alt="質問者画像3" data-target="for-modal">
        </div><!-- /.picture-box -->
      <?php endif; ?>
      <?php if(get_field('question-picture04')): ?> 
        <div class="picture-box">
          <img class="js-modal-open" src="<?php echo the_field('question-picture04'); ?>" alt="質問者画像4" data-target="for-modal">
        </div><!-- /.picture-box --> 
      <?php endif; ?>
    </div><!-- /.picture-wrapper -->
    <?php endif; ?>
    <!-- 添付ファイル -->
    <?php if(get_field('question-file01')): ?>
    <div class="file-wrapper">
      <a href="<?php echo the_field('question-file01'); ?>" target="_blank"><span>添付ファイル</span></a>
    </div><!-- /.file-wrapper -->
    <?php endif; ?>

    <!-- 回答者１ -->
    <div class="answer-box">
      <div class="answer-name"><span><?php the_field('answer-name01'); ?></span></div><!-- /.answer-name -->
      <p class="answer-text link-target"><?php the_field('answer-text01'); ?></p>
      <!-- 写真 -->
      <?php 
      if((get_field('answer-picture01-01')) 
      or (get_field('answer-picture01-02')) 
      or (get_field('answer-picture01-03'))
      or (get_field('answer-picture01-04')))
      : ?>
      <div class="picture-wrapper">
        <?php if(get_field('answer-picture01-01')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture01-01'); ?>" alt="回答者1画像1" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
        <?php if(get_field('answer-picture01-02')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture01-02'); ?>" alt="回答者1画像2" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
        <?php if(get_field('answer-picture01-03')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture01-03'); ?>" alt="回答者1画像3" data-target="for-modal">
          </div><!-- /.picture-box -->
        <?php endif; ?>
        <?php if(get_field('answer-picture01-04')): ?> 
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture01-04'); ?>" alt="回答者1画像4" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
      </div><!-- /.picture-wrapper -->
      <?php endif; ?>
      <!-- 添付ファイル -->
      <?php if(get_field('answer-file01-01')): ?>
      <div class="file-wrapper">
        <a href="<?php echo the_field('answer-file01-01'); ?>" target="_blank"><span>添付ファイル</span></a>
      </div><!-- /.file-wrapper -->
      <?php endif; ?>
    </div><!-- /.answer-box -->

    <!-- 回答者２ -->
    <?php if(get_field('answer-name02')): ?>
      <div class="answer-box">
      <div class="answer-name"><span><?php the_field('answer-name02'); ?></span></div><!-- /.answer-name -->
      <p class="answer-text link-target"><?php the_field('answer-text02'); ?></p>
      <!-- 写真 -->
      <?php 
      if((get_field('answer-picture02-01')) 
      or (get_field('answer-picture02-02')) 
      or (get_field('answer-picture02-03'))
      or (get_field('answer-picture02-04')))
      : ?>
      <div class="picture-wrapper">
        <?php if(get_field('answer-picture02-01')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture02-01'); ?>" alt="回答者2画像1" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
        <?php if(get_field('answer-picture02-02')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture02-02'); ?>" alt="回答者2画像2" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
        <?php if(get_field('answer-picture02-03')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture02-03'); ?>" alt="回答者2画像3" data-target="for-modal">
          </div><!-- /.picture-box -->
        <?php endif; ?>
        <?php if(get_field('answer-picture02-04')): ?> 
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture02-04'); ?>" alt="回答者2画像4" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
      </div><!-- /.picture-wrapper -->
      <?php endif; ?>
      <?php if(get_field('answer-file02-01')): ?>
      <!-- 添付ファイル -->
      <div class="file-wrapper">
        <a href="<?php echo the_field('answer-file02-01'); ?>" target="_blank"><span>添付ファイル</span></a>
      </div><!-- /.file-wrapper -->
      <?php endif; ?>
    </div><!-- /.answer-box -->
    <?php endif; ?>

    <!-- 添付ファイル -->
    <?php if(get_field('answer-name03')): ?>
      <div class="answer-box">
      <div class="answer-name"><span><?php the_field('answer-name03'); ?></span></div><!-- /.answer-name -->
      <p class="answer-text link-target"><?php the_field('answer-text03'); ?></p>
      <!-- 写真 -->
      <?php 
      if((get_field('answer-picture03-01')) 
      or (get_field('answer-picture03-02')) 
      or (get_field('answer-picture03-03'))
      or (get_field('answer-picture03-04')))
      : ?>
      <div class="picture-wrapper">
        <?php if(get_field('answer-picture03-01')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture03-01'); ?>" alt="回答者3画像1" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
        <?php if(get_field('answer-picture03-02')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture03-02'); ?>" alt="回答者3画像2" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
        <?php if(get_field('answer-picture03-03')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture03-03'); ?>" alt="回答者3画像3" data-target="for-modal">
          </div><!-- /.picture-box -->
        <?php endif; ?>
        <?php if(get_field('answer-picture03-04')): ?> 
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture03-04'); ?>" alt="回答者3画像4" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
      </div><!-- /.picture-wrapper -->
      <?php endif; ?>
      <?php if(get_field('answer-file03-01')): ?>
      <div class="file-wrapper">
        <a href="<?php echo the_field('answer-file03-01'); ?>" target="_blank"><span>添付ファイル</span></a>
      </div><!-- /.file-wrapper -->
      <?php endif; ?>
    </div><!-- /.answer-box -->
    <?php endif; ?>

    <!-- 回答者４ -->
    <?php if(get_field('answer-name04')): ?>
      <div class="answer-box">
      <div class="answer-name"><span><?php the_field('answer-name04'); ?></span></div><!-- /.answer-name -->
      <p class="answer-text link-target"><?php the_field('answer-text04'); ?></p>
      <!-- 写真 -->
      <?php 
      if((get_field('answer-picture04-01')) 
      or (get_field('answer-picture04-02')) 
      or (get_field('answer-picture04-03'))
      or (get_field('answer-picture04-04')))
      : ?>
      <div class="picture-wrapper">
        <?php if(get_field('answer-picture04-01')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture04-01'); ?>" alt="回答者4画像1" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
        <?php if(get_field('answer-picture04-02')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture04-02'); ?>" alt="回答者4画像2" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
        <?php if(get_field('answer-picture04-03')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture04-03'); ?>" alt="回答者4画像3" data-target="for-modal">
          </div><!-- /.picture-box -->
        <?php endif; ?>
        <?php if(get_field('answer-picture04-04')): ?> 
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture04-04'); ?>" alt="回答者4画像4" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
      </div><!-- /.picture-wrapper -->
      <?php endif; ?>
      <!-- 添付ファイル -->
      <?php if(get_field('answer-file04-01')): ?>
      <div class="file-wrapper">
        <a href="<?php echo the_field('answer-file04-01'); ?>" target="_blank"><span>添付ファイル</span></a>
      </div><!-- /.file-wrapper -->
      <?php endif; ?>
    </div><!-- /.answer-box -->
    <?php endif; ?>

    <!-- 添付ファイル -->
    <?php if(get_field('answer-name05')): ?>
      <div class="answer-box">
      <div class="answer-name"><span><?php the_field('answer-name05'); ?></span></div><!-- /.answer-name -->
      <p class="answer-text link-target"><?php the_field('answer-text05'); ?></p>
      <!-- 写真 -->
      <?php 
      if((get_field('answer-picture05-01')) 
      or (get_field('answer-picture05-02')) 
      or (get_field('answer-picture05-03'))
      or (get_field('answer-picture05-04')))
      : ?>
      <div class="picture-wrapper">
        <?php if(get_field('answer-picture05-01')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture05-01'); ?>" alt="回答者5画像1" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
        <?php if(get_field('answer-picture05-02')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture05-02'); ?>" alt="回答者5画像2" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
        <?php if(get_field('answer-picture05-03')): ?>
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture05-03'); ?>" alt="回答者5画像3" data-target="for-modal">
          </div><!-- /.picture-box -->
        <?php endif; ?>
        <?php if(get_field('answer-picture05-04')): ?> 
          <div class="picture-box">
            <img class="js-modal-open" src="<?php echo the_field('answer-picture05-04'); ?>" alt="回答者5画像4" data-target="for-modal">
          </div><!-- /.picture-box --> 
        <?php endif; ?>
      </div><!-- /.picture-wrapper -->
      <?php endif; ?>
      <?php if(get_field('answer-file05-01')): ?>
      <div class="file-wrapper">
        <a href="<?php echo the_field('answer-file05-01'); ?>" target="_blank"><span>添付ファイル</span></a>
      </div><!-- /.file-wrapper -->
      <?php endif; ?>
    </div><!-- /.answer-box -->
    <?php endif; ?>
  </div><!-- /.question-detail -->
</li><!-- /.question-lists__list -->