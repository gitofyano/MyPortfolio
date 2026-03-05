<div class="footer-outbox">
    <div class="wrapper-1200">
        <footer class="footer">
            <div class="img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_gold.png" alt="ロゴ">
            </div>
            <ul class="menu">
                <li><a href="<?php echo home_url('/'); ?>#room">お部屋</a></li>
                <li><a href="<?php echo home_url('/'); ?>#plan">プラン</a></li>
                <li><a href="<?php echo home_url('/'); ?>#season">四季</a></li>
                <li><a href="<?php echo home_url('/'); ?>#access">アクセス</a></li>
                <li><a href="<?php echo home_url('/service/'); ?>">楽園雅苑のサービス</a></li>
                <li><a href="<?php echo esc_url(get_archive_link()); ?>">ブログ</a></li>
                <li><a href="<?php echo esc_url(get_news_link()); ?>">お知らせ</a></li>
            </ul>
            <ul class="menu-bottom">

                <!-- パソコン表示用 -->
                <li class="pc-only"><a href="<?php echo home_url('/company/'); ?>">運営会社情報</a></li>
                <li class="pc-only"><a href="<?php echo home_url('/privacy/'); ?>">プライバシーポリシー</a></li>
                <li class="pc-only">利用規約</li>

                <!-- スマホ表示用 -->
                <li class="sp-only"><a href="<?php echo home_url('/privacy/'); ?>">プライバシーポリシー</a></li>
                <li class="sp-only">利用規約</li>
                <li class="sp-only"><a href="<?php echo home_url('/company/'); ?>">運営会社情報</a></li>
            </ul>
            <p class="copyright">©︎ RAKUENGAEN.</p>
        </footer>
    </div>
</div>