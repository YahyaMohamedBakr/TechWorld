<?php get_header(); 
$url=  get_the_post_thumbnail_url(get_option('page_on_front'))?>
<!-- Hero Section -->
<section class="py-5">
    <div class="container px-5">
        <!-- <h1 class="fw-bolder fs-5 mb-4">Company Blog</h1> -->
        <div class="card border-0 shadow rounded-3 overflow-hidden">
            <div class="card-body p-0">
                <div class="row gx-0">
                    <div class="col-lg-6 col-xl-5 py-lg-5">
                        <div class="p-4 p-md-5">
                            <!-- <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div> -->
                            <div class="h2 fw-bolder"><?php bloginfo('name'); ?></div>
                            <p><?php echo get_the_excerpt(get_option('page_on_front')); ?></p>
                            <!-- <a class="stretched-link text-decoration-none" href="#!">
                                Read more
                                <i class="bi bi-arrow-right"></i>
                            </a> -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog" style="background-image: url('<?php echo $url?>')"></div></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Posts Section -->

<section class="py-5">
    <div class="container px-5">
        <h2 class="fw-bolder fs-5 mb-4">Latest Blog Posts</h2>
        <div class="row gx-5">
            <?php 
              $latest_posts = new WP_Query(array(
                  'post_type' => 'post',
                  'posts_per_page' => 3
              ));
              if ($latest_posts->have_posts()) :
                  while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
            
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="..." />
                    <div class="card-body p-4">
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                        <a class="text-decoration-none link-dark stretched-link" href="<?php the_permalink(); ?>"><div class="h5 card-title mb-3"><?php the_title(); ?></div></a>
                        <p class="card-text mb-0"><?php the_excerpt(); ?></p>
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle me-3" src="<?= get_avatar_url(get_the_author_meta('user_email'), array('size' => 40)); ?>" alt="..." />
                                <div class="small">
                                    <div class="fw-bold"><?php the_author(); ?></div>
                                    <div class="text-muted"><?php echo get_the_date(); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <div class="text-end mb-5 mb-xl-0">
            <!-- <a class="text-decoration-none" href="#!">
                More stories
                <i class="bi bi-arrow-right"></i>
            </a> -->
        </div>
    </div>
</section>
<!-- Top Products Section -->

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
    <h2 class="fw-bolder fs-5 mb-4">Top Products</h2>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            $top_products = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page' => 3
            ));
            if ($top_products->have_posts()) :
                while ($top_products->have_posts()) : $top_products->the_post(); ?>

            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <!-- Product reviews-->
                            <!-- <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div> -->
                            <!-- Product price-->
                            <!-- <span class="text-muted text-decoration-line-through">$20.00</span> -->
                            $<?= get_post_meta(get_the_ID(), '_price', true); ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php the_permalink(); ?>">By Now</a></div>
                    </div>
                </div>
            </div>
            <?php endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>
