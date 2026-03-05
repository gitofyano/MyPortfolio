<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/home.css">
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('includes/header'); ?>
    <main>
        <div class="wrapper-1200">
            <section class="bloglist">
                <div class="pankuzu-space">
                    <?php my_breadcrumb(); ?>
                </div>
                <h1 class="bloglist-title">ブログ</h1>
                <div class="tag-space">
                    <div class="tag-filter">
                        <?php
                        $current_tag_id = is_tag() ? get_queried_object_id() : 0;
                        ?>
                        <div class="blog-tags">
                            <a href="<?php echo esc_url(get_archive_link()); ?>">
                                <div class="tag<?php echo $current_tag_id === 0 ? ' is-active' : ''; ?>">ALL</div>
                            </a>
                        </div>
                        <?php
                        $tags = get_tags();
                        foreach ($tags as $tag) :
                            $is_active = (int) $tag->term_id === (int) $current_tag_id;
                        ?>
                            <div class="blog-tags rv">
                                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                                    <div class="tag rv<?php echo $is_active ? ' is-active' : ''; ?>">
                                        <?php echo esc_html($tag->name); ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="blog-area">
                    <?php if (have_posts()): ?>
                        <?php while (have_posts()): the_post(); ?>
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
                    <?php endif; ?>
                </div>
                <?php
                the_posts_pagination(array(
                    'mid_size'   => 2,
                    'prev_next'  => false,
                ));
                ?>
            </section>
        </div>
    </main>
    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>
</body>

</html>