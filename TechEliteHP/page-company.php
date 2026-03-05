<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/company.css">
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('includes/header'); ?>
    <main>
        <div class="wrapper-1200">
            <section class="company" id="company">
                <div class="pankuzu-space">
                    <?php my_breadcrumb(); ?>
                </div>
                <h2 class="company-title">運営会社情報</h2>
                <dl class="detail">
                    <dt>会社名</dt>
                    <dd>桜庭観光株式会社</dd>
                    <dt>所在地</dt>
                    <dd>〒879-5425 大分県由布市庄内町渕</dd>
                    <dt>電話番号</dt>
                    <dd>0123-456-7890</dd>
                    <dt>メールアドレス</dt>
                    <dd class="underline-blue">info@sakuraba-ryokan.com</dd>
                    <dt>ウェブサイト</dt>
                    <dd><a href="<?php echo home_url('/'); ?>" class="underline-blue">楽園雅苑ウェブサイト</a></dd>
                    <dt>代表者名</dt>
                    <dd>山田太郎</dd>
                    <dt>設立年</dt>
                    <dd>1998年</dd>
                    <dt>事業内容</dt>
                    <dd>温泉宿「楽園雅苑」の運営</dd>
                    <dt>会社概要</dt>
                    <dd>桜庭観光株式会社は、大分県内で美しい自然環境と伝統的な温泉文化を提供するリゾート施設を運営する会社です。私たちの温泉宿「楽園雅苑」では、四季折々の美しい景色と温泉を楽しむ贅沢な滞在を提供しております。</dd>
                </dl>
            </section>
        </div>
    </main>

    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>
</body>
</html>