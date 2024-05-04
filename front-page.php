<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero">
<div class="hero-background" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_option('page_on_front')); ?>');"></div>

<div class="overlay">

    <div class="container">
        <div class="hero-content">
        <h1 class="display-4 text-white home-title"><?php echo get_the_title(get_option('page_on_front')); ?></h1>
            <p class="lead text-white home-excerpt"><?php echo get_the_excerpt(get_option('page_on_front')); ?></p>
        </div>
        </div>
    </div>
</div>
</section>

<!-- Latest Blog Posts Section -->
<section class="latest-posts my-5">
    <div class="container">
        <h2 class="text-center mb-4">Latest Blog Posts</h2>
        <div class="row">
            <?php
            $latest_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3
            ));
            if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                    <div class="col-md-4">
                        <article class="latest-post card h-100">
                            <div class="card-body">
                                <h3 class="card-title"><?php the_title(); ?></h3>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </article>
                    </div>
            <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<!-- Top Products Section -->
<section class="top-products my-5">
    <div class="container">
        <h2 class="text-center mb-4">Top Products</h2>
        <div class="row">
            <?php
            $top_products = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page' => 3
            ));
            if ($top_products->have_posts()) :
                while ($top_products->have_posts()) : $top_products->the_post(); ?>
                    <div class="col-md-4">
                        <article class="top-product card h-100">
                            <div class="card-body">
                                <h3 class="card-title"><?php the_title(); ?></h3>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Product</a>
                            </div>
                        </article>
                    </div>
            <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
