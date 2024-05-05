<?php

wp_footer();
?>
    <footer class="py-5 bg-dark">
        <div class="container">
            <div class="row">
            <div class="col-md-3">
                    <!-- Logo and site Tagline -->
                    <div class="footer-section">
                        <?php if (has_custom_logo()) : ?>
                            <div class="footer-logo">
                                <?php the_custom_logo(); ?>
                            </div>
                        <?php else:?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>

                        <?php endif; ?>
                        <p class="site-slogan"><?php bloginfo('description'); ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Quick Links -->
                    <div class="footer-section">
                        <h5>Quick Links</h5>
                        <nav class="footer-nav">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'container' => false,
                                'menu_class' => 'navbar-nav'
                            ));
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Products -->
                    <div class="footer-section">
                        <h5>Products</h5>
                        <?php
                        // Query to get the latest 3 products
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $products_query = new WP_Query($args);
                        ?>
                        <ul>
                            <?php if ($products_query->have_posts()) : ?>
                                <?php while ($products_query->have_posts()) : $products_query->the_post(); ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php else : ?>
                                <li>No products found</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Posts -->
                    <div class="footer-section">
                        <h5>Posts</h5>
                        <?php
                        // Query to get the latest 3 posts
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $posts_query = new WP_Query($args);
                        ?>
                        <ul>
                            <?php if ($posts_query->have_posts()) : ?>
                                <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php else : ?>
                                <li>No posts found</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>