<?php get_header();


 ?>

         <!-- Page header with logo and tagline-->
         <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to <?php bloginfo('name'); ?> Blog </h1>
                    <p class="lead mb-0"><?php bloginfo('description');?></p>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-6">
                    <!-- Nested row for non-featured blog posts-->

            <?php
        get_template_part('includes/section', 'blog');
            ?>
        </div>
      
            <?php get_sidebar(); ?>
      


<?php get_footer(); ?>
