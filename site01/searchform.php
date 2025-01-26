<!-- 検索フォーム -->
<form action="<?php echo home_url('/') ?>" method="get" class="search-form">
  <div class="container">
    <div class="input-box">
      <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="検索キーワードを入力">
      <!-- 投稿タイプをQ&Aに限定 -->
      <input type="hidden" value="q_and_a" name="post_type" id="post_type">
      <input type="submit" value="">
    </div><!-- /.input-box -->
  </div><!-- /.container -->
</form><!-- /.form -->