<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/index.css">
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('includes/header'); ?>

    <main>
        <div class="mainvisual">
            <div class="box">
                <div class="text">
                    <h1 class="title"><span class="no-break">大自然と調和する、</span><span class="no-break">極上の癒し。</span></h1>
                    <p class="description">大分の自然環境と共に、<br>身も心も癒やされる<span class="no-break">至福のひとときを提供します。</span></p>
                </div>
            </div>
            <div class="vertical pc-only">
                <p class="vertical-text">SCROOLL</p>
                <span class="vertical-line"></span>
            </div>
        </div>
        <div class="about wrapper-1200">
            <div class="detail">
                <div class="img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_gold.png" alt="ロゴ">
                </div>
                <div class="text">
                    <p class="description">自然美に囲まれた楽園で、<br>贅沢な癒しのひとときを<br>お過ごしください。</p>
                </div>
            </div>
            <div class="img-group">
                <div class="img1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about_img_1.png" alt="料理画像">
                </div>
                <div class="img2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about_img_2.png" alt="料理画像">
                </div>
            </div>
        </div>
        <!-- div.about wrapper-1200 -->
        <section class="room" id="room">
            <div class="wrapper-1200">
                <div class="img-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/room_cloud.png" alt="">
                </div>
                <h2 class="title">
                    <span class="jp">お部屋</span>
                    <span class="en">room</span>
                </h2>
                <p class="description">「楽園雅苑」の豪華なお部屋は、大分県自然の美しさと格式の高いサービスが調和した完璧な空間を提供します。桜花の調べが響くプレミアスィート、静寂の庭園に囲まれたデラックスルーム、そして自然のぬくもりを感じるスタンダードルーム。どの部屋も極上の癒しとくつろぎがお待ちしております。贅沢な温泉体験と非日常のくつろぎをお楽しみください。</p>
                <div class="detail">
                    <ul class="item">
                        <li class="active">
                            <a href="">
                                <div class="box">
                                    <p>スタンダードルーム</p>
                                    <p>- 自然のぬくもり -</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="box">
                                    <p>デラックスルーム</p>
                                    <p>- 静寂の庭園 -</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="box">
                                    <p>プレミアスィート</p>
                                    <p>- 桜花の調べ -</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="selection active">
                        <div class="img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/room1.jpg" alt="スタンダードルーム">
                        </div>
                        <div class="text">
                            <h2 class="subtitle">自然のぬくもり</h2>
                            <p class="comment">「自然のぬくもり」スタンダードルームは、自然との共感を感じるお部屋です。山の景色を楽しむことができ、ナチュラルリトリートプランには朝食が含まれています。心地よいぬくもりとくつろぎのひとときを提供します。</p>
                        </div>
                    </div>
                    <div class="selection">
                        <div class="img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/room2.jpg" alt="デラックスルーム">
                        </div>
                        <div class="text">
                            <h2 class="subtitle">静寂の庭園</h2>
                            <p class="comment">「静寂の庭園」デラックスルームは、静寂と美しさに包まれた部屋です。個別の温泉ビューバルコニーからは、美しい庭園と温泉の景色が広がります。ロマンティックゲットアウェイプランで、特別なひとときを過ごしましょう。</p>
                        </div>
                    </div>
                    <div class="selection">
                        <div class="img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/room3.jpg" alt="プレミアスィート">
                        </div>
                        <div class="text">
                            <h2 class="subtitle">桜花の調べ</h2>
                            <p class="comment">「桜花の調べ」プレミアスィートは、最高級のラグジュアリーを追求した特別なお部屋です。広々とした空間に、温泉露天風呂が設けられ、そこからは四季折々の美しい景色を楽しむことができます。</p>
                        </div>
                        <!-- di.text -->
                    </div>
                    <!-- div.selection -->
                </div>
                <!-- div.detail -->
            </div>
            <!-- div.wrapper-1200 -->
        </section>
        <!-- section.room -->
        <section class="plan" id="plan">
            <div class="wrapper-1200">
                <div class="img-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/planlogo.png" alt="">
                </div>
                <h2 class="title">
                    <span class="jp">プラン</span>
                    <span class="en">plan</span>
                </h2>
                <div class="content">
                    <ul class="item">
                        <li class="item-list">
                            <h2 class="subtitle">
                                <span>スタンダードルーム</span>
                                <span>- 自然のぬくもり -</span>
                            </h2>
                            <ul class="menu">
                                <li>
                                    <span class="label"><span class="pc-only">・</span>一泊の値段 :</span>
                                    <span class="value"> 30,000円/1部屋</span>
                                </li>
                                <li>
                                    <span class="label"><span class="pc-only">・</span>チェックイン時間 :</span>
                                    <span class="value"> 16:00</span>
                                </li>
                                <li>
                                    <span class="label"><span class="pc-only">・</span>チェックアウト時間 :</span>
                                    <span class="value"> 10:00</span>
                                </li>
                            </ul>
                            <div class="btn-box">
                                <a href="<?php echo home_url('/reservation/'); ?>" class="reserve-btn" data-plan="スタンダードルーム">予約</a>
                            </div>
                        </li>
                        <li class="item-list">
                            <h2 class="subtitle">
                                <span>デラックスルーム</span>
                                <span>- 静寂の庭園 -</span>
                            </h2>
                            <ul class="menu">
                                <li>
                                    <span class="label"><span class="pc-only">・</span>一泊の値段 :</span>
                                    <span class="value"> 50,000円/1部屋</span>
                                </li>
                                <li>
                                    <span class="label"><span class="pc-only">・</span>チェックイン時間 :</span>
                                    <span class="value"> 14:00</span>
                                </li>
                                <li>
                                    <span class="label"><span class="pc-only">・</span>チェックアウト時間 :</span>
                                    <span class="value"> 12:00</span>
                                </li>
                            </ul>
                            <div class="btn-box">
                                <a href="<?php echo home_url('/reservation/'); ?>" class="reserve-btn" data-plan="デラックスルーム">予約</a>
                            </div>
                        </li>
                        <li class="item-list">
                            <h2 class="subtitle">
                                <span>プレミアスィート</span>
                                <span>- 桜花の調べ -</span>
                            </h2>
                            <ul class="menu">
                                <li>
                                    <span class="label"><span class="pc-only">・</span>一泊の値段 :</span>
                                    <span class="value"> 100,000円</span>
                                </li>
                                <li>
                                    <span class="label"><span class="pc-only">・</span>チェックイン時間 :</span>
                                    <span class="value"> 15:00</span>
                                </li>
                                <li>
                                    <span class="label"><span class="pc-only">・</span>チェックアウト時間 :</span>
                                    <span class="value"> 11:00</span>
                                </li>
                            </ul>
                            <a href="<?php echo home_url('/reservation/'); ?>" class="reserve-btn" data-plan="プレミアスィート">予約</a>
                        </li>
                        <!-- li.item-list -->
                    </ul>
                    <!-- ul.item -->
                </div>
                <!-- div.content -->
            </div>
            <!-- div.wrapper-1200 -->
        </section>
        <!-- section.plan -->
        <section class="season" id="season">
            <div class="wrapper-1200">
                <h2 class="title">
                    <span class="jp">四季</span>
                    <span class="en">seasons</span>
                </h2>
                <p class="description">
                    「楽園雅苑」は、大分県自然の美しさが四季折々に変化する場所です。春には桜花が舞い、夏には新緑が輝き、秋には紅葉が魅了し、冬には雪景色が広がります。四季折々の風景や風味を楽しむためのアクティビティや特別なイベントが用意されています。どの季節に訪れても、自然の美しさに囲まれた楽園で贅沢なひとときを過ごしませんか？
                </p>
            </div>
            <div class="img-group">
                <div class="img-left">
                    <div class="img-top">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/season1.png" alt="四季画像1">
                        <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/season11.png" alt="四季画像2">
                    </div>
                    <div class="img-bottom">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/season3.png" alt="四季画像4">
                        <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/season33.png" alt="四季画像5">
                    </div>
                </div>
                <div class="img-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/season2.png" alt="四季画像3">
                </div>
            </div>
            <!-- <div class="wrapper-1440"> -->
            <div class="carousel">
                <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/carousel1.png" alt="景色画像1">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/carousel2.png" alt="景色画像2">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/carousel3.png" alt="景色画像3">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/carousel4.png" alt="景色画像4">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/carousel5.png" alt="景色画像5">
                </div>
            </div>
            <!-- div.carousel -->
            <div class="common-btnbox">
                <div class="common-btn">
                    <a href="<?php echo home_url('/service/'); ?>">
                        <span class="common-btn-text">楽園雅苑のサービス</span>
                    </a>
                </div>
            </div>
            <!-- </div> -->
            <!-- div.wrapper-1440 -->
        </section>
        <!-- section.season -->
        <section class="access" id="access">
            <h2 class="title wrapper-1200">
                <span class="jp">アクセス</span>
                <span class="en">access</span>
            </h2>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26715.914040263022!2d131.3492808592193!3d33.17503307461767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3546b15d4081bd39%3A0x3353f0a4a0b6def7!2z44CSODc5LTU0MjUg5aSn5YiG55yM55Sx5biD5biC5bqE5YaF55S65riV!5e0!3m2!1sja!2sjp!4v1767042914160!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="wrapper-1200">
                <div class="detail">
                    <div class="img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_gold.png" alt="ロゴ">
                    </div>
                    <address class="address">〒879-5425 <br class="sp-only">大分県由布市　庄内町渕</address>
                </div>
                <p class="description">当宿からのアクセスは便利で、お車や公共交通機関をご利用いただけます。<br><br class="sp-only">自家用車をご利用の場合、ご宿泊の方には無料の駐車場がご用意されております。<br><br class="sp-only">公共交通機関をご利用の場合、最寄り駅からはバス、タクシー、またはレンタサイクルを利用してお越しいただけます。</p>
            </div>
        </section>
        <section class="blog-story">
            <h2 class="title wrapper-1200">
                <span class="jp">ブログ</span>
                <span class="en">blog</span>
            </h2>
            <div class="blog-area wrapper-1200">
                <?php
                $parent_id = get_the_ID();
                $args = array(
                    'posts_per_page' => 3,
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                );
                $top_query = new WP_Query($args);
                if ($top_query->have_posts()):
                    while ($top_query->have_posts()): $top_query->the_post();
                ?>
                        <a href="<?php the_permalink(); ?>" class="blog-link">
                            <div class="blog-box">
                                <div class="img-area">
                                    <img src="<?php echo esc_url(get_eyecatch_or_default()); ?>" alt="">
                                </div>
                                <div class="text-area">
                                    <div class="blog-date"><?php the_time(get_option('date_format')); ?></div>
                                    <div class="blog-title"><?php the_title(); ?></div>
                                    <div class="blog-tags"><?php the_post_tags_plain(); ?></div>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p>ブログ記事はありません</p>
                    <?php endif; ?>
            </div>
            <div class="common-btnbox">
                <div class="common-btn">
                    <a href="<?php echo esc_url(get_archive_link()); ?>">
                        <span class="common-btn-text">ブログ一覧はこちら</span>
                    </a>
                </div>
            </div>
        </section>
        <section class="news" id="news">
            <div class="wrapper-1200">
                <h2 class="title">
                    <span class="jp">お知らせ</span>
                    <span class="en">news</span>
                </h2>
                <hr class="news-topline">
                <div class="news-area">
                    <?php
                    $parent_id = get_the_ID();
                    $args_news = array(
                        'posts_per_page' => 3,
                        'post_type' => 'news',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_status' => 'publish',
                    );
                    $news_query = new WP_Query($args_news);
                    if ($news_query->have_posts()):
                        while ($news_query->have_posts()): $news_query->the_post(); ?>
                            <div class="news-box">
                                <div class="textbox">
                                    <div class="news-date"><?php the_time(get_option('date_format')); ?></div>
                                    <div class="news-title"><?php the_title(); ?></div>
                                </div>
                                <div class="logobox">
                                    <a href="<?php the_permalink(); ?>" class="logo-link">
                                        <div class="logo"></div>
                                    </a>
                                </div>
                            </div>
                            <hr class="news-bottomline">
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="common-btnbox news-btnbox">
                <div class="common-btn">
                    <a href="<?php echo esc_url(get_news_link()); ?>">
                        <span class="common-btn-text">お知らせ一覧はこちら</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>
</body>

</html>