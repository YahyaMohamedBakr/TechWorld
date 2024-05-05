<?php 
get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
 <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php the_post_thumbnail_url(); ?>" alt="<?php  the_title(); echo 'image'  ?>" /></div>
                    <div class="col-md-6">
                        <!-- <div class="small mb-1">SKU: BST-498</div> -->
                        <h1 class="display-5 fw-bolder"><?php the_title();?> </h1>
                        <div class="fs-5 mb-5">
                            <span>$<?= get_post_meta(get_the_ID(), '_price', true); ?></span>
                        </div>
                        <p class="lead"><?php the_content();?></p>
                        <div class="d-flex">
                            <!-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" /> -->
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                By Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php endwhile; endif; 
get_footer();
?>