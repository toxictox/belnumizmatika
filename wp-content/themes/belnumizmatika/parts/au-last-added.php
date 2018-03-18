<div class="auction-preview">
    <a href="/auction" class="auction-preview-title"><?php _e('Аукцион', coins); ?></a>
    <?php
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'desc',
            'tax_query' => array(array('taxonomy' => 'product_type', 'field' => 'slug', 'terms' => 'auction')),
            'auction_arhive' => TRUE
            );
        $query = new WP_Query($args);
        while ($query->have_posts()) : $query->the_post();
            global $product;
    ?>
    <a href = "<?php the_permalink();?>">
        <div class = "auction-preview-item">
            <div class = "auction-preview-item-img" style = "background: url(<?php echo get_the_post_thumbnail_url();?>);">          
            </div>
            <p class = "auction-preview-item-title"><?php the_title();?></p>
            <p class = "auction-preview-item-price"><?php $price = $product->get_regular_price();  echo wc_price($price); $currency = get_woocommerce_currency_symbol(); //echo $currency;?> </p>
        </div>
    </a>
    <?php endwhile; ?>

</div>


