<?php get_header(); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h1 class="mt-4"><?php the_title(); ?></h1>
                <p class="lead">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></p>
                <hr>
                <p>Posted on <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
                <hr>
                <?php if ( has_post_thumbnail() ) : ?>
                    <img class="img-fluid rounded" src="<?php the_post_thumbnail_url('large'); ?>" alt="">
                    <hr>
                <?php endif; ?>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
                <hr>
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <?php comments_template(); ?>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
