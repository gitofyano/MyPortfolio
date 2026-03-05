<?php wp_body_open(); ?>

<header class="header">
    <div class="inner-header">
        <div class="logo">
            <a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_white.png" alt="楽園雅苑 ロゴ"></a>
        </div>
        <nav class="menu">
            <ul class="item">
                <li><a href="<?php echo home_url('/'); ?>#room">お部屋</a></li>
                <li><a href="<?php echo home_url('/'); ?>#plan">プラン</a></li>
                <li><a href="<?php echo home_url('/'); ?>#season">四季</a></li>
                <li><a href="<?php echo home_url('/'); ?>#access">アクセス</a></li>
                <li><a href="<?php echo home_url('/service/'); ?>">楽園雅苑のサービス</a></li>
            </ul>
            <a href="<?php echo home_url('/reservation/'); ?>" class="reserve-btn border-shadow">予約</a>
            <div class="hamburger sp-only">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                <span class="text">menu</span>
            </div>
        </nav>
    </div>
</header>