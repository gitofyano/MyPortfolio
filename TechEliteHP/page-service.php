<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/service.css">
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('includes/header'); ?>

    <main>
        <div class="wrapper-1200">
            <section class="service" id="service">
                <div class="pankuzu-space">
                    <?php my_breadcrumb(); ?>
                </div>
                <h2 class="service-title">楽園雅苑のサービス</h2>
                <div class="content">
                    <h3 class="sub-title">温泉</h3>
                    <p class="text">癒しの源泉、<br class="sp-only">心と体を満たす至福の温泉体験</p>
                    <div class="description">
                        <p>「楽園雅苑 - 桜庭温泉の隠れ家 -」では、自然の恵みに満ちた温泉を誇ります。当館の温泉は、大自然の地下深くから湧き出る温泉源を利用し、厳選された泉質が心と体を癒やします。その美しい湯色と温かさは、まるで天然の温もりを感じるかのよう。疲れた心と体を癒し、日々の喧騒から解放される贅沢な時間を提供します。楽園雅苑の温泉で、極上の癒しとリフレッシュをご体験ください。</p>
                        <div class="img-box column2">
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-1.png" alt=""></div>
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-2.png" alt=""></div>
                        </div>
                    </div>
                    <dl>
                        <dt>泉質</dt>
                        <dd>「桜庭温泉」の泉質は、硫黄泉とナトリウム・カルシウム硫酸塩泉が混ざり合った特別な組み合わせです。硫黄の特有の香りと透明感のある湯色が特徴で、温泉浴後に肌がつるつるになる感覚を提供します。</dd>
                        <dt>効能</dt>
                        <dd>
                            <ul>
                                <li>疲労回復: 泉質の特性から、疲れた筋肉をほぐし、日々のストレスや疲れを和らげます。</li>
                                <li>皮膚の健康: 温泉のミネラルが肌に潤いを与え、肌トラブルを緩和します。</li>
                                <li>血行促進: 温まった温泉効果で血行が促進され、身体全体をリフレッシュします。</li>
                                <li>神経のリラックス: 温かい泉質が神経を鎮め、リラックスした状態をもたらします。</li>
                            </ul>
                            このような泉質と効能は、体のリラックスやリフレッシュに役立ちます。
                        </dd>
                    </dl>
                </div>
                <div class="content">
                    <h3 class="sub-title">施設情報</h3>
                    <p class="text">客室</p>
                    <div class="description">
                        <p class="center">プレミアスィート、デラックスルーム、スタンダードルームの豊富な選択肢。<br class="pc-only">快適なベッドとモダンな設備完備。<br class="pc-only">自然の風景を望む客室や温泉露天風呂付き客室をご用意しております。</p>
                        <div class="img-box column3">
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-3.jpg" alt=""></div>
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-4.jpg" alt=""></div>
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-5.jpg" alt=""></div>
                        </div>
                        <div class="common-btnbox">

                            <div class="common-btn">
                                <a href="<?php echo home_url('/'); ?>#plan">
                                    <span class="common-btn-text">宿泊プランを見る</span>
                                </a>
                            </div>

                        </div>
                    </div>
                    <p class="text">レストラン・ダイニング</p>
                    <div class="description space">
                        <p class="center">地元の食材を使用した料理を楽しめるレストラン。<br class="pc-only">お部屋食や個室も用意され、贅沢な食体験を提供。</p>
                        <div class="img-box column2">
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-6.png" alt=""></div>
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-7.png" alt=""></div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="top">
                            <p class="row">朝食7:00 ~ 10:00<br class="sp-only"> (ラストオーダー 9:30)</p>
                            <p>ランチ11:30 ~ 14:00<br class="sp-only"> (ラストオーダー 13:30)</p>
                            <p>ディナー18:00 ~ 21:00<br class="sp-only"> (ラストオーダー 20:30)</p>
                        </div>
                        <p class="bottom">※ 営業時間は季節や施設の状況によって変更される場合がございますので、事前にご確認ください。</p>
                    </div>
                </div>
                <div class="content">
                    <h3 class="sub-title">その他施設・サービス</h3>
                    <p class="text space">会議室、イベントスペース</p>
                    <div class="description sspace">
                        <div class="img-box column2">
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-8.png" alt=""></div>
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-9.png" alt=""></div>
                        </div>
                    </div>
                    <p class="text ssspace">マッサージ</p>
                    <div class="description">
                        <div class="img-box column2">
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-10.png" alt=""></div>
                            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-11.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>

</body>

</html>