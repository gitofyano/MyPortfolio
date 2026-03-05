<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/news.css">

</head>

<body <?php body_class(); ?>>
    <?php get_template_part('includes/header'); ?>

    <main>

        <section class="news">
            <div class="wrapper-1200">
                <div class="pankuzu-space">
                    <?php my_breadcrumb(); ?>
                </div>
                <div class="news-description">
                    <?php if (have_posts()):
                        while (have_posts()): the_post(); ?>
                            <div class=" news-date"><?php the_date(); ?></div>
                            <h1 class="news-title"><?php the_title(); ?></h1>
                            <div class="news-content"><?php the_content(); ?></div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="common-btnbox news-kobetu">
                <div class="common-btn">
                    <a href="<?php echo home_url('/news/'); ?>">
                        <span class="common-btn-text">一覧に戻る</span>
                    </a>
                </div>
            </div>

        </section>

    </main>

    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>

</body>

</html>