<?php

function hsc($value) {
  return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function get_eyecatch_or_default() {
    if (has_post_thumbnail()) {
        $id  = get_post_thumbnail_id();
        $img = wp_get_attachment_image_src($id, 'full');
        if ($img && isset($img[0])) {
            return $img[0];
        }
    }
    return get_template_directory_uri() . '/assets/img/kv.png';
}

function the_post_tags_plain($class = 'tag') {
    $tags = get_the_tags();

    if (!$tags) {
        return;
    }

    foreach ($tags as $tag) {
        echo '<span class="' . esc_attr($class) . '">'
            . esc_html($tag->name)
            . '</span>';
    }
}
function get_archive_link() {
  $posts_page_id = get_option('page_for_posts');
  if ($posts_page_id) {
    return get_permalink($posts_page_id);
  }
  return home_url('/');
}
function get_news_link() {
  $url = get_post_type_archive_link('news');
  return $url ? $url : home_url('/');
}

add_theme_support('post-thumbnails');


function teckelite_blog_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_home()) {
        $query->set('posts_per_page', 9);
    }
}
add_action('pre_get_posts', 'teckelite_blog_posts_per_page');

add_image_size(
  'single-eyecatch', 
  780,    
  470,          
  true          
);

function my_breadcrumb() {
  if (is_front_page()) return;

  $sep = '<span class="bc-sep">&gt;</span>';

  //トップ
  echo '<nav class="breadcrumb">';
  echo '<span class="bc-item">';
  echo '<a href="' . esc_url(home_url('/')) . '">トップ</a>';
  echo '</span>';

  // お知らせ一覧（archive-news.php）
  // トップ ＞ お知らせ
  if (is_post_type_archive('news')) {
    echo '<span class="bc-item">';
    echo $sep;
    echo '<span class="bc-current">お知らせ</span>';
    echo '</span>';
  }

  // お知らせ（single-news.php）
  // トップ ＞ お知らせ ＞ タイトル
  if (is_single() && get_post_type() === 'news') {
    echo '<span class="bc-item">';
    echo $sep;
    echo '<a href="' . esc_url(home_url('/news/')) . '">お知らせ</a>';
    echo '</span>';
    echo '<span class="bc-item">';
    echo $sep;
    echo '<span class="bc-current">' . esc_html(get_the_title()) . '</span>';
    echo '</span>';
  }

  // 投稿ページ（single.php）
  // トップ ＞ ブログ一覧 ＞ 記事タイトル
  if (is_single() && get_post_type() !== 'news') {

    $posts_page_id = get_option('page_for_posts');

    if ($posts_page_id) {
      echo '<span class="bc-item">';
      echo $sep;
      echo '<a href="' . esc_url(get_permalink($posts_page_id)) . '">';
      echo esc_html(get_the_title($posts_page_id)) . '一覧' ;
      echo '</a>';
      echo '</span>';
    } 

    echo '<span class="bc-item">';
    echo $sep;
    echo '<span class="bc-current">' . esc_html(get_the_title()) . '</span>';
    echo '</span>';
  }

  // 固定ページ（page.php）
  // トップ ＞ 親 ＞ 子
  if (is_page()) {
    global $post;

    if ($post->post_parent) {
      $parents = array_reverse(get_post_ancestors($post->ID));
      foreach ($parents as $parent_id) {
        echo '<span class="bc-item">';
        echo $sep;
        echo '<a href="' . esc_url(get_permalink($parent_id)) . '">';
        echo esc_html(get_the_title($parent_id));
        echo '</a>';
        echo '</span>';
      }
    }

    echo '<span class="bc-item">';
    echo $sep;
    echo '<span class="bc-current">' . esc_html(get_the_title()) . '</span>';
    echo '</span>';
  }

  if (is_home()) {
    echo '<span class="bc-item">';
    echo $sep;
    echo '<span class="bc-current">' . 'ブログ一覧' . '</span>';
    echo '</span>';
  }

    // タグアーカイブ
  // トップ ＞ ブログ（または投稿トップのタイトル）＞ タグ名
  if (is_tag()) {
    $posts_page_id = get_option('page_for_posts');
    if ($posts_page_id) {
      echo '<span class="bc-item">';
      echo $sep;
      echo '<a href="' . esc_url(get_permalink($posts_page_id)) . '">';
      echo esc_html(get_the_title($posts_page_id)) .'一覧';
      echo '</a>';
      echo '</span>';
    } else {
      echo '<span class="bc-item">';
      echo $sep;
      echo '<span class="bc-label">ブログ一覧</span>';
      echo '</span>';
    }
    $tag = get_queried_object();
    echo '<span class="bc-item">';
    echo $sep;
    echo '<span class="bc-current">' . esc_html($tag->name) . '</span>';
    echo '</span>';
  }

  echo '</nav>';
}

function theme_widgets_init() {
  register_sidebar(array(
    'name' => 'サイドバーウィジェットエリア',
    'id' => 'primary-widget-area',
    'description' => '固定ページのサイドバー',
    'before_widget' => '<aside class="side-inner">',
    'after_widget' => '</aside>',
    'before_title' => '<h4 class="title">',
    'after_title' => '</h4>',
  ));
}
add_action('widgets_init', 'theme_widgets_init');

// 予約内容
function get_reservation_detail_lines($form) {
    $lines = [
        'お名前: ' . ($form['fullname'] ?? ''),
        'メールアドレス: ' . ($form['email'] ?? ''),
        '電話番号: ' . ($form['tel'] ?? ''),
        'ご住所:',
        '〒' . ($form['postal'] ?? ''),
        ($form['prefecture'] ?? '') . ' ' . ($form['city'] ?? '') . ' ' . ($form['street'] ?? ''),
        'チェックイン日: ' . ($form['checkin'] ?? ''),
        'チェックアウト日: ' . ($form['checkout'] ?? ''),
        '部屋のタイプ: ' . ($form['selectplan'] ?? ''),
        '大人の人数: ' . ($form['adults'] ?? ''),
        'お子様の人数: ' . ($form['children'] ?? ''),
        '特別リクエスト: ' . ($form['message'] ?? '（なし）'),
    ];
    return implode("\n", $lines);
}

// お客様向けメール
function get_reservation_email_body($form) {
    $detail = get_reservation_detail_lines($form);
    $lines = [
        'ご予約ありがとうございます。以下の内容で予約を承りました。',
        '────────────────',
        $detail,
        '────────────────',
        'このメールは「楽園雅苑」から自動送信されています。',
    ];
    return implode("\n", $lines);
}

// 管理者向けメール
function get_reservation_admin_email_body($form) {
    $detail = get_reservation_detail_lines($form);
    $lines = [
        '以下の内容で予約を受け付けました。',
        '────────────────',
        $detail,
        '────────────────',
        '以上。',
  ];
  return implode("\n", $lines);
}

// 入力メールアドレスと管理者に確認内容を送信
function send_reservation_emails($form) {
    if (empty($form['email']) || !is_email($form['email'])) {
        return false;
    }

    $subject_user = 'ご予約の確認';
    $subject_admin = '新規予約がありました - ' . ($form['fullname'] ?? '');
    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    $sent_user = wp_mail($form['email'], $subject_user, get_reservation_email_body($form), $headers);
    $sent_admin = wp_mail(get_option('admin_email'), $subject_admin, get_reservation_admin_email_body($form), $headers);

    return $sent_user || $sent_admin;
}

add_action('init', function(){

  register_post_type('news',[
    'label' => 'ニュース',
    'public' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-text-page',
    'supports' => ['thumbnail', 'title', 'editor'],
    'has_archive' => true,
    'rewrite' => [
      'slug' => 'news',
      'with_front' => false
    ],
  ]);

});
  


