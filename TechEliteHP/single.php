<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single.css">
</head>

<body <?php body_class(); ?>>

    <?php get_template_part('includes/header'); ?>

    <main>
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <div class="wrapper-1200">
                    <section class="post">
                        <div class="pankuzu-space">
                            <?php my_breadcrumb(); ?>
                        </div>
                        <div class="inner-box">
                            <div class="article-area">
                                <h1 class="article-title"><?php the_title(); ?></h1>
                                <div class="article-info">
                                    <div class="date"><?php the_time(get_option('date_format')); ?></div>
                                    <div class="tag"><?php the_tags('', '', ''); ?></div>
                                </div>
                                <div class="article-img">
                                    <img src="<?php echo esc_url(get_eyecatch_or_default()); ?>" alt="アイキャッチ画像">
                                </div>
                                <div class="article-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <div class="sidebar-area">
                                <?php get_sidebar(); ?>
                            </div>
                            <div class="other-area">
                                <p class="comment">こんな記事も読まれています</p>
                                <div class="other-box">
                                    <?php
                                    $args = [
                                        'post_type'      => 'post',
                                        'posts_per_page' => 2,
                                        'orderby'        => 'rand',
                                        'post_status'    => 'publish',
                                        'post__not_in'   => [get_the_ID()]
                                    ];
                                    $query = new WP_Query($args);
                                    ?>
                                    <?php if ($query->have_posts()): ?>
                                        <?php while ($query->have_posts()): $query->the_post(); ?>
                                            <a href="<?php the_permalink(); ?>" class="blog-linkbox">
                                                <div class="blog-box">
                                                    <div class="blog-img">
                                                        <img src="<?php echo esc_url(get_eyecatch_or_default()); ?>" alt="">
                                                    </div>
                                                    <div class="blog-text">
                                                        <div class="blog-date"><?php the_time(get_option('date_format')); ?></div>
                                                        <div class="blog-title"><?php the_title(); ?></div>
                                                        <div class="blog-tags"><?php the_post_tags_plain(); ?></div>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>

    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>
</body>

</html>