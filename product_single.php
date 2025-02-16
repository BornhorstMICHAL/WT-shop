<?php
get_header(); 

<div class="breadcrumbs">
    <?php
if (function_exists('custom_breadcrumbs'))
    custom_breadcrumbs();
?>
</div>

<div class="container">
   <div class="product">
        <img src="produkt.jpg" alt="Produktový obrázek">
        <div class="product-info">
            <h1 class="product-title">Název produktu</h1>
            <p class="product-description">
                Krátký popis produktu. Může obsahovat několik vět o funkcích, výhodách nebo materiálu.
            </p>
            <a href="#" class="buy-button">Koupit nyní</a>
        </div>
    </div>
</div>

<?php
get_footer(); 
?>
