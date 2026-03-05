<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['form'])) {
    wp_redirect(home_url('/reservation/'));
    exit();
}

$_SESSION['confirmed'] = true;

$form = $_SESSION['form'];
$thanks_page = get_page_by_path('reservation/confirm/thanks');
$thanks_url = $thanks_page ? get_permalink($thanks_page->ID) : home_url('/reservation/');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/confirm.css">
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('includes/header'); ?>

    <main>
        <div class="wrapper-1200">
            <section class="confirm">
                <div class="pankuzu-space">
                    <?php my_breadcrumb(); ?>
                </div>
                <h1 class="confirm-title">ご予約の確認</h1>
                <div class="confirm-table">
                    <div class="inner-box">
                        <div class="row nam">
                            <p class="title">お名前</p>
                            <p class="item"><span><?php echo hsc($form['fullname']) ?></span></p>
                        </div>
                        <div class="row ema">
                            <p class="title">メールアドレス</p>
                            <p class="item"><?php echo hsc($form['email']); ?></p>
                        </div>
                        <div class="row">
                            <p class="title">電話番号</p>
                            <p class="item"><?php echo hsc($form['tel']); ?></p>
                        </div>
                        <div class="row row4">
                            <p class="title">ご住所</p>
                            <p class="item">
                                <?php echo '〒' . hsc($form['postal']) . '<br>'; ?>
                                <?php echo hsc($form['prefecture']) . '<br>'; ?>
                                <?php echo hsc($form['city']) . '<br>'; ?>
                                <?php echo hsc($form['street']); ?>
                            </p>
                        </div>
                        <div class="row">
                            <p class="title">チェックイン日</p>
                            <p class="item"><?php echo hsc($form['checkin']); ?></p>
                        </div>
                        <div class="row">
                            <p class="title">チェックアウト日</p>
                            <p class="item"><?php echo hsc($form['checkout']); ?></p>
                        </div>
                        <div class="row">
                            <p class="title">部屋のタイプ</p>
                            <p class="item"><?php echo hsc($form['selectplan']); ?></p>
                        </div>
                        <div class="row">
                            <p class="title">大人の人数</p>
                            <p class="item"><?php echo hsc($form['adults']); ?></p>
                        </div>
                        <div class="row">
                            <p class="title">お子様の人数</p>
                            <p class="item"><?php echo hsc($form['children']); ?></p>
                        </div>
                        <div class="row req">
                            <p class="title">特別リクエスト</p>
                            <p class="item request"><?php echo hsc($form['message']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="confirm-detail">
                    <p class="text">上記の内容で送信いたします</p>
                    <form action="<?php echo esc_url($thanks_url); ?>" method="post">

                        <?php wp_nonce_field('reserve_thanks', 'reserve_thanks_nonce'); ?>

                        <?php foreach ($form as $k => $v): ?>
                            <input type="hidden" name="<?php echo esc_attr($k); ?>" value="<?php echo esc_attr($v); ?>">
                        <?php endforeach; ?>

                        <button type="submit" class="button">送信する</button>
                    </form>
                </div>
            </section>
        </div>
    </main>

    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>

</body>

</html>