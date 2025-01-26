  <!-- モーダル -->
  <div class="for-modal">
    <div class="modal-box">
      <img src="" alt="" class="modal-image">
    </div><!-- /.modal-box -->
  </div><!-- /.for-modal -->

  <!-- トップへ戻るボタン -->
  <button class="pagetop" id="pagetop"><span></span><span></span></button>  
  
  <footer class="footer">
    <p>Copyright &copy レンタルスペース研究所 All rights reserved.</p>
  </footer><!-- /footer -->
  <?php 
  wp_enqueue_script('jquery') ;
  wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '1.0.0', true);
  wp_enqueue_script('rental-space-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.4', true);
  $tmp_path_arr = array(
    'temp_uri' => get_template_directory_uri(),
    'home_url' => home_url()
   );
   wp_localize_script( 'rental-space-main', 'tmp_path', $tmp_path_arr );
  wp_footer(); 
  ?>
</body>
</html>