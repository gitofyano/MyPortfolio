<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/archive-news.css">
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('includes/header'); ?>

    <main>
        <div class="wrapper-1200">
            <section class="newsarch">
                <div class="pankuzu-space">
                    <?php my_breadcrumb(); ?>
                </div>
                <h1 class="newsarch-h1-title">お知らせ</h1>
                <hr class="newsarch-topline">
                <div class="newsarch-area">
                    <?php
                    $paged = get_query_var('paged') ? (int) get_query_var('paged') : 1;
                    $args_newsarch = array(
                        'posts_per_page' => 10,
                        'paged'          => $paged,
                        'post_type'      => 'news',
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'post_status'    => 'publish',
                    );
                    $newsarch_query = new WP_Query($args_newsarch);
                    if ($newsarch_query->have_posts()):
                        while ($newsarch_query->have_posts()): $newsarch_query->the_post(); ?>
                            <div class="newsarch-box">
                                <div class="textbox">
                                    <div class="newsarch-date"><?php the_time(get_option('date_format')); ?></div>
                                    <div class="newsarch-title"><?php the_title(); ?></div>
                                </div>
                                <div class="logobox">
                                    <a href="<?php the_permalink(); ?>" class="logo-link">
                                        <div class="logo"></div>
                                    </a>
                                </div>
                            </div>
                            <hr class="newsarch-bottomline">
                        <?php endwhile; ?>
                        <?php
                        wp_reset_postdata();
                        if ($newsarch_query->max_num_pages > 1) :
                            echo '<nav class="navigation pagination" role="navigation" aria-label="投稿">';
                            echo '<div class="nav-links">';
                            echo paginate_links(array(
                                'total'   => $newsarch_query->max_num_pages,
                                'current' => $paged,
                                'prev_next' => false,
                                'mid_size' => 2,
                            ));
                            echo '</div>';
                            echo '</nav>';
                        endif;
                        ?>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </main>

    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>

</body>

</html>