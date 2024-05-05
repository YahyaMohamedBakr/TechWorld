<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <?php if (is_single()) : ?>
                <h1 class="fw-bolder"><?php the_title(); ?></h1>

            <?php else : ?>
                <h1 class="fw-bolder">Welcome to <?php bloginfo('name'); ?> Blog</h1>
                <p class="lead mb-0"><?php bloginfo('description');?></p>
            <?php endif; ?>
            
        </div>
    </div>
</header>