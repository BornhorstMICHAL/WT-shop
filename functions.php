<?php
add_action( 'wp_enqueue_scripts', 'grand_sunrise_enqueue_styles' );

function grand_sunrise_enqueue_styles() {
	wp_enqueue_style( 
		'grand-sunrise-parent-style', 
		get_parent_theme_file_uri( 'style.css' )
	);
}

add_filter( 'the_content', 'filter_bad_words' );
add_filter( 'wp_insert_post_data', 'filter_bad_words_before_save', '99', 2 );

function filter_bad_words( $content ) {
    $bad_words = array( 'slovo1', 'slovo2', 'slovo3' ); 
    foreach ( $bad_words as $word ) {
        $pattern = '/\b' . preg_quote( $word, '/' ) . '\b/i';
        $content = preg_replace( $pattern, '****', $content );
    }
    return $content;
}

function filter_bad_words_before_save( $data, $postarr ) {
    if ( isset( $data['post_content'] ) ) {
        $data['post_content'] = filter_bad_words( $data['post_content'] );
    }
    return $data;
}

add_action( 'init', 'handle_add_to_cart' );

function handle_add_to_cart() {
    if ( isset( $_POST['add_to_cart'] ) && isset( $_POST['product_id'] ) ) {
        $product_id = intval( $_POST['product_id'] );
        $cart = isset( $_SESSION['cart'] ) ? $_SESSION['cart'] : array();
        $cart[] = $product_id;
        $_SESSION['cart'] = $cart;
    }
}

add_shortcode( 'shopping_cart', 'display_shopping_cart' );

function display_shopping_cart() {
    $cart = isset( $_SESSION['cart'] ) ? $_SESSION['cart'] : array();
    if ( empty( $cart ) ) {
        return '<p>Váš košík je prázdný.</p>';
    }
    $output = '<h2>Váš košík</h2><ul>';
    foreach ( $cart as $product_id ) {
        $product = get_post( $product_id );
        $price = get_post_meta( $product_id, 'price', true );
        $output .= '<li>' . esc_html( $product->post_title ) . ' - ' . esc_html( $price ) . ' Kč</li>';
    }
    $output .= '</ul>';
    return $output;
}
?>
