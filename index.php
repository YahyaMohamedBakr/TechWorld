<?php get_header();


 ?>
 <!-- Page header with logo and tagline-->
 <?php get_template_part('includes/section', 'blog_header');?>


        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                   
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">

                    <?php
                    get_template_part('includes/section', 'blog');
                    ?>
        
      
           

                    <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <?php
                    the_posts_pagination(array(
                  
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                    ));
                    ?>
                    </nav>
                  </div>
           
    </div>
    <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
