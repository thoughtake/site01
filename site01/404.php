<!-- 404 not found -->

<?php get_header(); ?>
<div id="wrapper" class="w-front-page">
  <main class="main" id="js-main">  
    <div class="container">
      <div class="not-found">
        <h2>404 NOT FOUND</h2>
        <p>お探しのページが見つかりませんでした。</p>
        <p>申し訳ございませんが、<a href="<?php echo home_url('/'); ?>">こちらのリンク</a>からトップページにお戻りください</p>
      </div><!-- /.not-found -->
    </div><!-- /.container -->
  </main><!-- /main -->
  <?php get_sidebar(); ?>
</div><!-- /#wrapper.w-front-page -->
  
<?php get_footer(); ?>