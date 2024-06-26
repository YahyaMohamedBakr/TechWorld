<?php 

if (have_posts()) :
    while (have_posts()) :
        the_post();
?>

    <div class="col-lg-6">
        <div class="card mb-4">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>"><img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" /></a>
            <?php endif; ?>
            <div class="card-body">
                <div class="small text-muted"><?php echo get_the_date('F j, Y'); ?></div>
                <h2 class="card-title h4"><?php the_title(); ?></h2>
                <p class="card-text"><?php the_excerpt(); ?></p>
                <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read more →</a>
            </div>
        </div>
    </div>

<?php
    endwhile;

else :
    echo '<p>No content found</p>';
endif;
?>
  
