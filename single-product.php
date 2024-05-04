<?php 
get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if (has_post_thumbnail()) {
                        echo '<div class="product-thumbnail">';
                        the_post_thumbnail('large'); 
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <div class="product-price">
                            <?php
                            get_post_meta(get_the_ID(), 'price', true); 
                            ?>
                        </div>
                    </header>
                    <div class="entry-content text-truncate">
                        <?php
                        the_content();
                        ?>
                    </div>
                    <div class="entry-footer">
                        <button class="buy-now-button">Buy Now </button>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php endwhile; endif; 
get_footer();
?>