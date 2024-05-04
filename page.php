<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php the_title(); ?></h1>
            <?php
            if (has_post_thumbnail()) :
                // Display the featured image
                the_post_thumbnail('full', array('class' => 'img-fluid'));
            endif;

            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else :
                echo '<p>No content found.</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
