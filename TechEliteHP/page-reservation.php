<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$form = [
  'fullname'       => '',
  'email'      => '',
  'tel'        => '',
  'postal'     => '',
  'prefecture' => '',
  'city'       => '',
  'street'     => '',
  'checkin'    => '',
  'checkout'   => '',
  'selectplan' => '',
  'adults'     => '',
  'children'   => '',
  'message'    => '',
];

$rules = [
  'fullname'       => ['required'],
  'email'      => ['required'],
  'tel'        => ['required'],
  'postal'     => ['required'],
  'prefecture' => ['required'],
  'city'       => ['required'],
  'street'     => ['required'],
  'checkin'    => ['required'],
  'checkout'   => ['required'],
  'selectplan' => ['required'],
  'adults'     => ['required'],
  'children'   => ['required'],
  'message'    => [],
];

$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    foreach ($form as $key => $value) {
        $form[$key] = isset($_POST[$key]) ? trim($_POST[$key]) : '';
    }

    foreach ($rules as $key => $ruleList) {
        if (in_array('required', $ruleList, true) && $form[$key] === '') {
        $error[$key] = 'blank';
        }
    }

    if (empty($error)) {
        $_SESSION['form'] = $form;

        $confirm_page = get_page_by_path('reservation/confirm');
        $confirm_url  = $confirm_page ? get_permalink($confirm_page->ID) : home_url('/reservation/');

        wp_redirect($confirm_url);
        exit;
    }
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reservation.css">
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('includes/header'); ?>
    <main>
        <div class="pankuzu-space"><?php my_breadcrumb(); ?></div>
        <div class="wrapper-1200">
            <section class="reservation" id="reservation">
                <div class="pankuzu-space">
                    <?php my_breadcrumb(); ?>
                </div> 
                <h2 class="reservation-title">ご予約</h2>
                <p class="description">「楽園雅苑 - 桜庭温泉の隠れ家 -」へのご予約、心よりお待ちしております。お手数をおかけいたしますが、以下のフォームに必要事項をご記入の上、ご送信ください。</p>
                <form action="" method="post" novalidate id="reserveForm">
                    <div class="detail">
                        <div class="row">
                            <div class="subtitle"><label for="fullname">お名前<span class="red">＊</span></label></div>
                            <div class="content">
                                <input type="text" name="fullname" id="fullname" autocomplete="name" value="<?php echo hsc($form['fullname']) ?>" required>
                                <p class="error" data-form="fullname"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="subtitle"><label for="email">メールアドレス<span class="red">＊</span></label></div>
                            <div class="content">
                                <input type="email" name="email" id="email" inputmode="email" autocomplete="email" value="<?php echo hsc($form['email']) ?>" required>
                                <p class="error" data-form="email"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="subtitle"><label for="tel">電話番号<span class="red">＊</span></label></div>
                            <div class="content">
                                <input type="tel" name="tel" id="tel" inputmode="numeric" maxlength="11" pattern="[0-9]*" autocomplete="tel" value="<?php echo hsc($form['tel']) ?>" required>
                                <p class="error" data-form="tel"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="subtitle position">ご住所<span class="red">＊</span></div>
                            <div class="inner-box">
                                <div class="inner-row">
                                    <div class="subtitle"><label for="postal">郵便番号</label></div>
                                    <div class="content">
                                        <input type="text" name="postal" id="postal" inputmode="numeric" maxlength="8" pattern="\d{3}-?\d{4}" autocomplete="postal-code" value="<?php echo hsc($form['postal']) ?>" required>
                                        <p class="error" data-form="postal"></p>
                                    </div>
                                </div>
                                <div class="inner-row">
                                    <div class="subtitle"><label for="prefecture">都道府県</label></div>
                                    <div class="content">
                                        <input type="text" name="prefecture" id="prefecture" autocomplete="address-level1" value="<?php echo hsc($form['prefecture']) ?>" required>
                                        <p class="error" data-form="prefecture"></p>
                                    </div>
                                </div>
                                <div class="inner-row">
                                    <div class="subtitle"><label for="city">市区町村</label></div>
                                    <div class="content">
                                        <input type="text" name="city" id="city" autocomplete="address-level2" value="<?php echo hsc($form['city']) ?>" required>
                                        <p class="error" data-form="city"></p>
                                    </div>
                                </div>
                                <div class="inner-row">
                                    <div class="subtitle"><label for="street">町域・番地<br class="pc-only"><span class="sp-only">・</span>建物名</label></div>
                                    <div class="content">
                                        <input type="text" name="street" id="street" autocomplete="street-address" value="<?php echo hsc($form['street']) ?>" required>
                                        <p class="error" data-form="street"></p>
                                    </div>
                                </div>
                            </div>
                            <!-- div.inner-box -->
                        </div>
                        <!-- div.row -->
                        <div class="row">
                            <div class="subtitle"><label for="checkin">チェックイン日<span class="red">＊</span></label></div>
                            <div class="content type-select">
                                <input type="text" name="checkin" id="checkin" placeholder="選択してください" value="<?php echo hsc($form['checkin']) ?>" readonly required>
                                <span class="arrow"></span>
                                <p class="error" data-form="checkin"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="subtitle"><label for="checkout">チェックアウト日<span class="red">＊</span></label></div>
                            <div class="content type-select">
                                <input type="text" name="checkout" id="checkout" placeholder="選択してください" value="<?php echo hsc($form['checkout']) ?>" readonly required>
                                <span class="arrow"></span>
                                <p class="error" data-form="checkout"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="subtitle"><label for="selectplan">ご希望の宿泊プラン<span class="red">＊</span></label></div>
                            <div class="content type-select">
                                <select name="selectplan" id="selectplan" required>
                                    <option value="" disabled hidden <?php echo $form['selectplan'] === '' ? 'selected' : ''; ?>>選択してください</option>
                                    <option value="スタンダードルーム" <?php echo $form['selectplan'] === 'スタンダードルーム' ? 'selected' : ''; ?>>スタンダードルーム</option>
                                    <option value="デラックスルーム" <?php echo $form['selectplan'] === 'デラックスルーム' ? 'selected' : ''; ?>>デラックスルーム</option>
                                    <option value="プレミアスィート" <?php echo $form['selectplan'] === 'プレミアスィート' ? 'selected' : ''; ?>>プレミアスィート</option>
                                </select>
                                <span class="arrow"></span>
                                <p class="error" data-form="selectplan"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="subtitle"><label for="adults">大人の人数<span class="red">＊</span></label></div>
                            <div class="content type-select">
                                <select name="adults" id="adults" required>
                                    <option value="" disabled hidden <?php echo $form['adults'] === '' ? 'selected' : '' ?>>選択してください</option>
                                    <option value="1名" <?php echo $form['adults'] === '1名' ? 'selected' : '' ?>>1名</option>
                                    <option value="2名" <?php echo $form['adults'] === '2名' ? 'selected' : '' ?>>2名</option>
                                    <option value="3名" <?php echo $form['adults'] === '3名' ? 'selected' : '' ?>>3名</option>
                                    <option value="4名" <?php echo $form['adults'] === '4名' ? 'selected' : '' ?>>4名</option>
                                </select>
                                <span class="arrow"></span>
                                <p class="error" data-form="adults"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="subtitle font"><label for="children">お子様の人数<span class="red">＊</span><br class="pc-only"><span class="small">(12歳未満)</span></label></div>
                            <div class="content type-select">
                                <select name="children" id="children" required>
                                    <option value="" disabled hidden <?php echo $form['children'] === '' ? 'selected' : '' ?>>選択してください</option>
                                    <option value="0名" <?php echo $form['children'] === '0名' ? 'selected' : '' ?>>0名</option>
                                    <option value="1名" <?php echo $form['children'] === '1名' ? 'selected' : '' ?>>1名</option>
                                    <option value="2名" <?php echo $form['children'] === '2名' ? 'selected' : '' ?>>2名</option>
                                    <option value="3名" <?php echo $form['children'] === '3名' ? 'selected' : '' ?>>3名</option>
                                    <option value="4名" <?php echo $form['children'] === '4名' ? 'selected' : '' ?>>4名</option>
                                </select>
                                <span class="arrow"></span>
                                <p class="error" data-form="children"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="subtitle position"><label for="message">特別リクエスト</label></div>
                            <div class="content">
                                <textarea name="message" id="message" maxlength="1000"><?php echo hsc($form['message']) ?></textarea>
                                <p class="error" data-form="message"></p>
                            </div>
                        </div>
                    </div>
                    <p class="text">予約を確認するため、お客様の連絡先情報をご提供いただきます。ご予約に関する詳細情報や特別なリクエストがございましたら、お知らせください。心よりお待ちしております。</p>
                    <button class="form-btn" type="submit">送信する</button>
                    <p class="error last" data-form="submit"></p>
                </form>
            </section>
        </div>
        <!-- div.wrapper-1200 -->
    </main>
    
    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>
</body>

</html>