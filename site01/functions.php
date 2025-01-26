<?php 
// <title>タグを出力
add_theme_support('title-tag'); 

//区切り文字変更
add_filter( 'document_title_separator', 'my_document_title_separator');
function my_document_title_separator($separator) {
  $separator = "|";
  return $separator;
}

/* 【管理画面】Q&A編集画面で不要な項目を非表示にする */
function my_remove_post_support() {
  remove_post_type_support('q_and_a','title');           // タイトル
  remove_post_type_support('q_and_a','editor');          // 本文
}
add_action('init','my_remove_post_support');


// Q&A投稿のカテゴリーBOXを非表示に
function qanda_label_meta_box_remove() {
  $id = 'kinddiv';
  $post_type = 'q_and_a';
  $position = 'side';
  remove_meta_box( $id, $post_type, $position );
}
add_action( 'admin_menu', 'qanda_label_meta_box_remove');

// リーダー投稿のカテゴリーBOXを非表示に
function leader_label_meta_box_remove() {
  $id = 't_leaderdiv';
  $post_type = 'p_leader';
  $position = 'side';
  remove_meta_box( $id, $post_type, $position );
}
add_action( 'admin_menu', 'leader_label_meta_box_remove');

//一覧表示時のQ&Aのデフォルトタイトルを変更
function my_auto_title($title_message){
  global $post;
  /* ポストタイプがカスタムかどうかチェック */
  if( $post->post_type == 'q_and_a' ) {
    $question_title = get_post_custom_values('question-title');
    if( $question_title ){
    $title_message = $question_title[0];
    }
  }
  return $title_message;
}
add_filter('single_post_title', 'my_auto_title');
add_filter('the_title', 'my_auto_title');

//タイトルの自動生成
function rename_post_title($post_id){
  global $post;
  if($post->post_type == 'p_member'){ #投稿タイプの確認
    //タイトルになる文字列を生成
    $title = get_post_meta($post_id, 'name', true);

    //もし現在のタイトルと異なる場合のみ、タイトルを更新（ループ回避）
    if(get_the_title($post_id) !== $title){
      wp_update_post(['ID' => $post_id, 'post_title' => $title]); #生成したタイトルに書き換え
    }
  }
  if($post->post_type == 'p_leader'){ #投稿タイプの確認
    //タイトルになる文字列を生成
    $id = get_post_meta($post_id, 'member', true);
    $title = get_post_meta($id, 'name', true);

    //もし現在のタイトルと異なる場合のみ、タイトルを更新（ループ回避）
    if(get_the_title($post_id) !== $title){
      wp_update_post(['ID' => $post_id, 'post_title' => $title]); #生成したタイトルに書き換え
    }
  }
  if($post->post_type == 'p_link'){ #投稿タイプの確認
    //タイトルになる文字列を生成
    $title = get_post_meta($post_id, 'link_name', true);

    //もし現在のタイトルと異なる場合のみ、タイトルを更新（ループ回避）
    if(get_the_title($post_id) !== $title){
      wp_update_post(['ID' => $post_id, 'post_title' => $title]); #生成したタイトルに書き換え
    }
  }
}

add_action('save_post', 'rename_post_title', 10);


// 検索対象をカスタムフィールドに
function custom_search($search, $wp_query) {
  global $wpdb;

  if (!$wp_query->is_search)
    return $search;
  if (!isset($wp_query->query_vars))
    return $search;
  if (is_admin()) 
    return $search;

  $str = mb_convert_kana(isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '','s','utf-8');
  $search_words = explode(' ', $str);
  if ( count($search_words) > 0 ) {
    $search = '';
    // 対象をカスタムフィールド に
    $search .= "AND post_type = 'q_and_a'";
    foreach ( $search_words as $word ) {
      if ( !empty($word) ) {
          $search_word = '%' . esc_sql( $word ) . '%';
          $search .= " AND (
            --   {$wpdb->posts}.post_title LIKE '{$search_word}'
            -- OR {$wpdb->posts}.post_content LIKE '{$search_word}'
            -- OR 
            {$wpdb->posts}.ID IN (
            SELECT distinct post_id
            FROM {$wpdb->postmeta}
            WHERE meta_value LIKE '{$search_word}'
            )
          ) ";
      }
    }
  }
  return $search;
}
add_filter('posts_search','custom_search', 10, 2);


// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');

// カスタムメニューを追加
add_theme_support('menus');

//固定ページで抜粋を使えるようにする
add_post_type_support( 'page', 'excerpt' );

//投稿一覧にサムネイルカラム追加
function customize_manage_columns($columns) {
  $columns['thumbnail'] = __('Thumbnail');
  return $columns;
}
add_filter( 'manage_posts_columns', 'customize_manage_columns' );
add_filter( 'manage_pages_columns', 'customize_manage_columns' );

// リーダー一覧にリーダータイプカラム追加
function add_leader_posts_columns( $columns ) {
  $columns['leader_type'] = 'リーダータイプ';
  $columns['leader_class'] = 'リーダー区分';
  return $columns;
}
add_filter( 'manage_p_leader_posts_columns', 'add_leader_posts_columns' );

// メンバー一覧にプロフィール画像カラム追加
function add_member_posts_columns( $columns ) {
  $columns['profile_image'] = 'プロフィール画像';
  $columns['c_twitter'] = 'Twitter';
  $columns['c_discord'] = 'Discord';
  $columns['c_line'] = 'Line';
  $columns['c_instagram'] = 'Instagram';
  $columns['c_email'] = 'メール';
  return $columns;
}
add_filter( 'manage_p_member_posts_columns', 'add_member_posts_columns' );

//投稿一覧にサムネイル画像表示設定
function customize_manage_custom_column($column_name, $post_id) {
  if ( 'thumbnail' == $column_name ) {
    $thumb = get_the_post_thumbnail($post_id, array(100,100), 'thumbnail');
    echo ( $thumb ) ? $thumb : '－';
    }
}
add_action( 'manage_posts_custom_column', 'customize_manage_custom_column', 10, 2 );
add_action( 'manage_pages_custom_column', 'customize_manage_custom_column', 10, 2 );


// メンバーカラムの表示内容設定
function add_member_posts_columns_row( $column_name, $post_id ) {
  // プロフィール画像
  if ( 'profile_image' == $column_name ) {
    $image_data = get_post_meta( $post_id, 'image', true);
    if ( isset($image_data) && $image_data ) {
      $attachment_id = get_field('image',$post->ID);
      echo "<img src=\"" . $attachment_id . "\" width=\"100\" height=\"100\">";
    } else {
      echo __('None');
    }
  }
  // Twitter
  if ( 'c_twitter' == $column_name ) {
    $twitter_data = get_post_meta( $post_id, 'twitter', true);
    if ( isset($twitter_data) && $twitter_data ) {
      echo esc_attr($twitter_data);
    } else {
      echo __('None');
    }
  }
  // Discord
  if ( 'c_discord' == $column_name ) {
    $discord_data = get_post_meta( $post_id, 'discord', true);
    if ( isset($discord_data) && $discord_data ) {
      echo esc_attr($discord_data);
    } else {
      echo __('None');
    }
  }
  // Line
  if ( 'c_line' == $column_name ) {
    $line_data = get_post_meta( $post_id, 'line', true);
    if ( isset($line_data) && $line_data ) {
      echo esc_attr($line_data);
    } else {
      echo __('None');
    }
  }
  // Instagram
  if ( 'c_instagram' == $column_name ) {
    $instagram_data = get_post_meta( $post_id, 'instagram', true);
    if ( isset($instagram_data) && $instagram_data ) {
      echo esc_attr($instagram_data);
    } else {
      echo __('None');
    }
  }
  // Mail
  if ( 'c_email' == $column_name ) {
    $mail_data = get_post_meta( $post_id, 'email', true);
    if ( isset($mail_data) && $mail_data ) {
      echo esc_attr($mail_data);
    } else {
      echo __('None');
    }
  }
}
add_action( 'manage_p_member_posts_custom_column', 'add_member_posts_columns_row', 10, 2 );


// リーダーカラムの表示内容設定
function add_leader_posts_columns_row( $column_name, $post_id ) {
  if ( $column_name == 'leader_type' ) {
    $term_id = get_post_meta( $post_id , 'leader_type' , true );
    $term = get_term($term_id , 't_leader');
    $cf_data = $term->name;
    if (isset($cf_data) && $cf_data) {
      echo esc_attr($cf_data);
    } else {
      echo __('None');
    }
  }
  if ( $column_name == 'leader_class' ) {
    $class_data = get_field('leader_class', $post_id);
    $class_value = $class_data['value'];
    $class_label = $class_data['label'];
    if (isset($class_label) && $class_label) {
      echo esc_attr($class_label);
    } else {
      echo __('None');
    }
  }
}
add_action( 'manage_p_leader_posts_custom_column', 'add_leader_posts_columns_row', 10, 2 );


// カラムにソート機能
function custom_sortable_columns($sortable_column) {
  $sortable_column['leader_type'] = 'leader_type_sort';
  return $sortable_column;
}
add_filter( 'manage_edit-p_leader_sortable_columns', 'custom_sortable_columns' );


//「投稿一覧」の「クイック編集」で表示される「この投稿を先頭に固定表示」を非表示
function custom_hidden_quick_page_sticky() {
  ?>
  <script type="text/javascript">
      jQuery(document).ready(function($){
          $(".inline-edit-col-right .inline-edit-group:eq(1) label:eq(1)").css("display","none");
      });
  </script>
  <?php
}
add_action( 'admin_head-edit.php', 'custom_hidden_quick_page_sticky' ); //ファイルを読み込む

//「投稿の編集」で表示される「ブログのトップに固定」を非表示
function custom_hidden_post_page_sticky() {
  ?>
  <style type="text/css">
      .edit-post-post-status .components-panel__row:nth-of-type(3) {display:none !important;}
  </style>
  <?php
}
add_action( 'admin_print_styles-post.php', 'custom_hidden_post_page_sticky' ); //スタイルを直接書き込む

//「新規投稿の追加」で表示される「ブログのトップに固定」「レビュー待ち」を非表示
function custom_hidden_postnew_page_sticky() {
  ?>
  <style type="text/css">
      .edit-post-post-status .components-panel__row:nth-of-type(n+3) {display:none !important;}
  </style>
  <?php
}
add_action( 'admin_print_styles-post-new.php', 'custom_hidden_postnew_page_sticky' ); 

/**
* スラッグの日本語禁止
*/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
  if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
  $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
  }
  return $slug;
  }
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );

// 管理画面へのアクセスを拒否
add_action( 'auth_redirect', 'subscriber_go_to_home' );
function subscriber_go_to_home( $user_id ) {
    $user = get_userdata( $user_id );
    if ( !$user->has_cap( 'edit_posts' ) ) {
        wp_redirect( get_home_url() );
        exit();
    }
}

// 購読者のツールバー削除
add_action( 'after_setup_theme', 'subscriber_hide_admin_bar' );
function subscriber_hide_admin_bar() {
  $user = wp_get_current_user();
  if ( isset( $user->data ) && !$user->has_cap( 'edit_posts' ) ) {
  show_admin_bar( false );
  }
}

// ログイン時のラベルを変更
function change_loginpage_username_label($label){
  if (in_array($GLOBALS['pagenow'], array('wp-login.php'))) {
    if ($label == 'ユーザー名またはメールアドレス') { 
    $label = 'メールアドレス';
    }
  }
  return $label;
}
  add_filter( 'gettext', 'change_loginpage_username_label' );
