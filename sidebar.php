<div class="col-lg-4">
    <!-- Latest Posts widget -->
    <div class="card mb-4">
        <div class="card-header">Latest Posts</div>
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                <?php
                $latest_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php the_time('F j, Y'); ?></li>
                <?php
                    endwhile;
                else :
                    echo '<li>No posts found</li>';
                endif;
                ?>
            </ul>
        </div>
    </div>
    <!-- Latest Products widget -->
    <div class="card mb-4">
        <div class="card-header">Latest Products</div>
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                <?php
                $latest_products = new WP_Query(array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($latest_products->have_posts()) :
                    while ($latest_products->have_posts()) : $latest_products->the_post();
                ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
                    endwhile;
                else :
                    echo '<li>No products found</li>';
                endif;
                ?>
            </ul>
        </div>
    </div>
</div>
