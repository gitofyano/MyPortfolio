<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['form']) || !isset($_SESSION['confirmed']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    wp_redirect(home_url('/reservation/'));
    exit();
}

if (!isset($_POST['reserve_thanks_nonce']) || !wp_verify_nonce($_POST['reserve_thanks_nonce'], 'reserve_thanks')) {
    wp_redirect(home_url('/reservation/'));
    exit();
}

$form = $_SESSION['form'];

// 確認画面の内容を入力メールアドレスと管理者に送信
send_reservation_emails($form);

unset($_SESSION['form']);
unset($_SESSION['confirmed']);
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/thanks.css">
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('includes/header'); ?>

    <main>
        <div class="wrapper-1200">
            <section class="thanks">
                <div class="pankuzu-space">
                    <?php my_breadcrumb(); ?>
                </div>
                <h1 class="thanks-title">予約が完了しました</h1>
                <div class="thanks-description">
                    <p class="uptext">「楽園雅苑 - 桜庭温泉の隠れ家 -」へのご予約、誠にありがとうございます。<br class="pc-only">お客様の予約が正常に受け付けられました。</p>
                    <p class="caution">ご注意事項:<br>ご予約に関する特別なリクエストや変更がある場合、お手続きの前に当宿のスタッフがご連絡いたします。<br>予約内容の変更やキャンセルについては、ご予約確認メールに記載の手順に従ってご連絡いただけます。</p>
                    <p class="detail">「楽園雅苑」でのご滞在が、素晴らしい思い出とくつろぎに満ちたひとときとなることを心より願っております。<br class="pc-only">何かご質問やご要望がある場合は、いつでもご連絡いただけます。<br>お客様にお会いできることを楽しみにしております。</p>
                </div>
            </section>
        </div>
    </main>

    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>

</body>

</html>