jQuery(function() {
  // テンプレートパスとホームパス
  var wp_temp_uri = tmp_path.temp_uri;
  var wp_home_url = tmp_path.home_url;

  // wow
  new WOW().init();

  // formzu
  if (window.addEventListener) {
    window.addEventListener( 'load', formzuInitialSetting, false );
  }
  else if (window.attachEvent) {
    window.attachEvent( 'onload', formzuInitialSetting );
  }
  else {
    window.onload = formzuInitialSetting;
  }
  function formzuInitialSetting() {
    formzuInitialLoad = true;
  }

  //アコーディオンメニュー
  // カテゴリー押下時
  jQuery('.category-title').on('click', function(e) {
    e.preventDefault();
    var parent_list = jQuery(this).parent('.category-lists__list');
    var question_list = parent_list.find('.question-lists__list');
    // 開いているとき
    if (parent_list.hasClass('open')) {
      // 質問リストを消す
      jQuery(this).next('.question-lists').slideUp();
      // open フラグを削除
      parent_list.removeClass('open');
      // 質問が開いていたらそちらも閉じる
      question_list.removeClass('open');
      question_list.children('.question-detail').slideUp();
    // 閉じているとき
    } else {
      // 質問リストを出す
      jQuery(this).next('.question-lists').slideDown();
      // open フラグを追加
      parent_list.addClass('open');
    }
  })
  // 質問押下時
  jQuery('.question-title').on('click', function(e) {
    e.preventDefault();
    var parent_list = jQuery(this).parent('.question-lists__list');
    jQuery(this).addClass('open');
    // 質問詳細が開いているとき
    if (parent_list.hasClass('open')) {
      // 質問詳細を消す
      jQuery(this).next('.question-detail').slideUp();
      // open フラグを削除
      parent_list.removeClass('open');
    // 質問詳細が閉じているとき
    } else {
      // 質問詳細を出す
      jQuery(this).next('.question-detail').slideDown();
      // open フラグを追加
      parent_list.addClass('open');
    }
    // 他の質問を閉じる処理
    var the_others = jQuery('.question-title').not(this);
    the_others.removeClass('open');
  })

  // アコーディオン（過去の質問以外）
  function toggle_accordion($element) {
    $element.on('click', function() {
      $content = jQuery(this).next('.js-accordion__content');
      if ($content) {
        jQuery(this).toggleClass('-open')
        $content.slideToggle();
        $content.toggleClass('-open');
      }
      $content_accordion = $content.find('.js-accordion__target');
      $content_content = $content_accordion.next('.js-accordion__content');
      if($content_accordion && $content_content) {
        $content_accordion.removeClass('-open');
        $content_content.slideUp();
        $content_content.removeClass('-open');
      }
    })
  } 
  $accordion_target = jQuery('.js-accordion__target');
  toggle_accordion($accordion_target);


  // モーダルメニュー
  jQuery('.js-modal-open').on('click', function(e) {
    e.preventDefault();
    // 画像情報取得
    var src = jQuery(this).attr('src');
    var alt = jQuery(this).attr('alt');
    // 画像の置き換えと表示
    var target = jQuery(this).data('target');
    jQuery('.' + target + ' img').attr('src', src);
    jQuery('.' + target + ' img').attr('alt', alt);
    jQuery('.' + target).addClass('is-show');
  })

  // 投稿画像
  jQuery('.wp-block-image').on('click', function(e) {
    e.preventDefault();
    var $image = jQuery(this).find('img');
    // 画像情報取得
    var src = $image.attr('src');
    var alt = $image.attr('alt');
    // 画像の置き換えと表示
    var target = "for-modal";
    jQuery('.' + target + ' img').attr('src', src);
    jQuery('.' + target + ' img').attr('alt', alt);
    jQuery('.' + target).addClass('is-show');
  })

  jQuery('.for-modal').on('click', function(e) {
    e.preventDefault();
    jQuery(this).removeClass('is-show');
  })

  // http、httpsなどで始まる文字列に自動リンク追加
  // jQuery('.link-target').each(function(){
  // var exp = /((https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
  // // var exp = /((?<!href="|href='|src="|src=')(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
  // jQuery(this).html( jQuery(this).html().replace(exp, '<a href="$1" target="_blank">$1</a> ') );
  // });
  
  // http、httpsなどで始まる文字列に自動リンク追加
  // jQuery('.link-target').each(function(){
  //   ref_pattern = /((href="|href='|src="|src='|srcset='|srcset="|, )(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig
  //   url_pattern = /((https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
  //   var $target = jQuery(this);
  //   var text = jQuery(this).text();
  //   var edit_text = String(text).replace(ref_pattern, "");
  //   var urls = edit_text.match(url_pattern);
  //   if (urls) {
  //     urls = urls.filter(function(x, i, self) {
  //       return self.indexOf(x) === i;
  //     });
  //     jQuery.each(urls, function(index, url) {
  //       // urlを正規表現に変換 &amp;対応
  //       reg_url = url.replace(/([\/\.\*\+\.\?\{\}\(\)\[\]\^\$\-\|])/g, '\\$1');
  //       reg_url = reg_url.replace(/&/g, '(&|&amp;)');
  //       // var $hoge = $target.find('p').contents().filter(function() {
  //       //   return this.nodeType == 3;
  //       // }) 
  //       // $hoge.each(function() {
  //       //   jQuery(this).replaceWith(this.nodeValue.replace("テ", "b"));
  //       // })

  //       // いちどaタグを解除
  //       $target.find(`a[href='${url}']`).contents().unwrap();

  //       var regExp = new RegExp(reg_url, "g");
  //       $target.html(
  //         $target.html().replace(regExp, `<a href="${url}" target="_blank">${url}</a>`)
  //       );
  //     })
  //   }
  // });

  // http、httpsなどで始まる文字列に自動リンク追加
  jQuery('.link-target').each(function(){
    var url_pattern = /((https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;

    // var $text01 = getTextNode(jQuery(this));
    var $text01 = jQuery(this).contents().filter(function() {
      return this.nodeType === 3;
    });
    var $text02 = jQuery(this).find('p').contents().filter(function() {
      return this.nodeType === 3;
    });
    $text01.each(function() {
      jQuery(this).replaceWith(this.nodeValue.replace(url_pattern, '<a href="$1" target="_blank">$1</a>'));
    })
    $text02.each(function() {
      jQuery(this).replaceWith(this.nodeValue.replace(url_pattern, '<a href="$1" target="_blank">$1</a>'));
    })

  });




  
  // pagatopボタン動き
  var pagetop = jQuery('#pagetop');   
  pagetop.hide();
  jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 100) {  //100pxスクロールしたら表示
          pagetop.fadeIn();
      } else {
          pagetop.fadeOut();
      }
  });
  pagetop.click(function () {
      jQuery('body,html').animate({
          scrollTop: 0
      }, 500); //0.5秒かけてトップへ移動
      return false;
  });


  // サイドバー
  var $archive = jQuery('#js-archive');
  // オープンボタン // タブレット以上のみ使用
  var $archive_open_button = jQuery('#js-archive-button-open');
  // クローズボタン // タブレット以上のみ使用
  var $archive_close_button = jQuery('#js-archive-button-close');
  // ヘッダーボタン
  var $header_toggle = jQuery('#header-toggle');
  // メインコンテンツ
  var $wrapper = jQuery('#wrapper');
  $archive_open_button.on('click', function() {
    jQuery(this).addClass('open');
    $archive_close_button.addClass('open');
    $archive.addClass('open');
    $header_toggle.addClass('open');
    $wrapper.addClass('archive-open');
  })
  $archive_close_button.on('click', function() {
    $archive_open_button.removeClass('open');
    jQuery(this).removeClass('open');
    $archive.removeClass('open');
    $header_toggle.removeClass('open');
    $wrapper.removeClass('archive-open');    
  })
  $header_toggle.on('click', function() {
    $archive_open_button.toggleClass('open');
    $archive_close_button.toggleClass('open');
    $archive.toggleClass('open');
    jQuery(this).toggleClass('open');
    $wrapper.toggleClass('archive-open');  
  })

  // メニューの文字数を制限
  jQuery(window).on('load resize', function() {
    var window_width = window.innerWidth;
    $target = jQuery('.js-char-limit');
    if (window_width < 768) {
      $target.each(function() {
        var count = jQuery(this).data('sp');
        var txt = jQuery(this).text();
        if(txt.replace(/\s+/g,'').length > count){
            txt = txt.replace(/\s+/g,'').substr(0, count);
            jQuery(this).text(txt + "...");
        }
      })
    } else if (window_width < 992) {
      $target.each(function() {
        var count = jQuery(this).data('md');
        var txt = jQuery(this).text();
        if(txt.replace(/\s+/g,'').length > count){
          txt = txt.replace(/\s+/g,'').substr(0, count);
            jQuery(this).text(txt + "...");
        }
      })    
    } else {
      $target.each(function() {
        var count = jQuery(this).data('lg');
        var txt = jQuery(this).text();
        if(txt.replace(/\s+/g,'').length > count){
            txt = txt.replace(/\s+/g,'').substr(0, count);
            jQuery(this).text(txt + "...");
        }
      })      
    }
  })

  // 一覧表示のセレクトボックスイベント
  var $category_select = jQuery("#js-category_select");

  $category_select.change(function(){
    var str = jQuery(this).val();
    if (str === "all") {
      window.location.href = `${wp_home_url}/all`;
    } else {
      window.location.href = `${wp_home_url}/category/${str}`;
    }
  });


  // 今日の連絡
  var $today_comment = jQuery('#js-today-comment');
  var $today_content_wrapper = jQuery('#js-today-content-wrapper');
  var $today_content = jQuery('#js-today-content');
  var $today_more = jQuery('#js-today-more');
  jQuery(window).on('load resize', function() {
    var window_width = window.innerWidth;
    var past_width = $today_comment.attr('data-width');
    if (window_width != past_width) {
      $today_comment.attr('data-width', window_width);
      $today_more.removeClass('-open');
      $today_comment.removeClass('-open');
      $today_content_wrapper.removeClass('-open');
      var content_height = $today_content.outerHeight();
      if (content_height <= 300) {
        $today_more.hide();
      } else {
        $today_more.show();
      }
    }
  })

  $today_more.on('click', function() {
    if (jQuery(this).hasClass('-open')) {
      $today_comment.removeClass('-open');
      $today_content_wrapper.removeClass('-open');
      jQuery(this).removeClass('-open');
    } else {
      $today_comment.addClass('-open');
      $today_content_wrapper.addClass('-open');
      jQuery(this).addClass('-open');
    }
  })

})