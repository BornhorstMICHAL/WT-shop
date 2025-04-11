
<?php
/*
Template Name: Borny Product
*/
get_header(); 
?>

<div class="breadcrumbs">
    <?php get_template_part('breadcrumb'); ?>
</div>

<?php
$product = wc_get_product(get_the_ID());
?>

<div class="container">
    <div class="product-page">
        <?php while (have_posts()) : the_post(); ?>
            <div class="product-container">
                
                <!-- Produktový název -->
                <h1 class="product-title"><?php the_title(); ?></h1>

                <!-- Obrázek produktu -->
                <div class="product-images">
                    <?php do_action('woocommerce_before_single_product_summary'); ?>
                </div>

                <div class="product-summary">
                    <?php do_action('woocommerce_single_product_summary'); ?>
                </div>

                <div class="product-description">
                    <?php the_content(); ?>
                </div>

                <!-- Metadata produktu -->
                <div class="product-meta">
                    <?php do_action('woocommerce_product_meta_start'); ?>
                    <p><?php echo wc_get_product_category_list(get_the_ID()); ?></p>
                    <?php do_action('woocommerce_product_meta_end'); ?>
                </div>

                <!-- Tlačítko koupit -->
                <a href="#" class="btn-buy">Koupit</a>

                <!-- Související produkty -->
                <?php // do_action('woocommerce_after_single_product_summary'); ?>

            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php
get_footer();
?>
