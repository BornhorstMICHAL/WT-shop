<?php
/*
Theme Name: Borny Product
*/
get_header(); 

<div class="breadcrumbs">
    <?php get_template_part('breadcrumb'); ?>
</div>

<div class="container">
    <div class="product-page">
        <?php while (have_posts()) : the_post(); ?>
            <div class="product-container">
                <div class="product-image">
                    <?php 
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('large');
                    } 
                    ?>
                </div>

                <div class="product-details">
                    <h1><?php the_title(); ?></h1>
                    <div class="product-description">
                        <?php the_content(); ?>
                    </div>
                    <a href="#" class="btn-buy">Koupit</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php
get_footer(); 
?>
