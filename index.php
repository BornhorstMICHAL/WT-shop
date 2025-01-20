<?php get_header(); ?>
<body>
<h1><?php bloginfo( 'name' ); ?></h1>
<h2><?php bloginfo( 'description' ); ?></h2>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="two-column-layout">
            <div class="column-left">
                <!-- Levý sloupec -->
                <?php the_author(); ?>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="column-right">
                <!-- Pravý sloupec -->
                <h1 class="post-title"><?php the_title(); ?></h1>
                <strong><?php the_excerpt(); ?></strong>
                <div class="post-content">
                    <?php the_content(); ?>
                    <div class="product-price">
                        <strong>Cena: <?php echo get_post_meta( get_the_ID(), 'price', true ); ?> Kč</strong>
                    </div>
                    <form method="post" action="">
                        <input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>">
                        <button type="submit" name="add_to_cart">Přidat do košíku</button>
                    </form>
                    <?php wp_link_pages(); ?>
                </div>
            </div>
        </div>
        <?php edit_post_link(); ?>
    <?php endwhile; ?>
<?php else : ?>
    <p>No products found. :(</p>
<?php endif; ?>

<?php get_footer(); ?>
</body>
