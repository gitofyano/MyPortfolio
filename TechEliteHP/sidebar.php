<div class="content-side">
    <div class="side-box">
        <h3 class="side-title">人気記事</h3>
        <ul class="popular-posts-list">
            <?php
            $current_id = is_singular('post') ? get_the_ID() : 0;
            $args = [
                'post_type'      => 'post',
                'posts_per_page' => 10,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'post_status'    => 'publish',
                'post__not_in'   => $current_id ? [$current_id] : [],
            ];
            $popular_query = new WP_Query($args);
            ?>
            <?php if ($popular_query->have_posts()): ?>
                <?php while ($popular_query->have_posts()): $popular_query->the_post(); ?>
                    <li class="popular-posts-item">
                        <a href="<?php the_permalink(); ?>" class="popular-posts-link">
                            <span class="popular-posts-thumb">
                                <img src="<?php echo esc_url(get_eyecatch_or_default()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="53" height="34">
                            </span>
                            <span class="popular-posts-title"><?php the_title(); ?></span>
                        </a>
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
