<?php
    $args = [
        'post_type' => 'product',
        'tax_query' => array(array('taxonomy' => 'product_type', 'field' => 'slug', 'terms' => 'auction')),
        'meta_key' => 'adv',
        'meta_value' => 1,
        'auction_arhive' => TRUE,
        'show_past_auctions' => TRUE
    ];
    $pictures = get_field('banner',5);
    $random_picture = array_rand($pictures, 1);

   
    $query = new WP_Query($args);
  if( ($query->have_posts()) || (have_rows('banner', 5))  ) : ?>
<div class="special-links">
    <?php while ($query->have_posts()) : $query->the_post(); 
        global $product; $post_id = get_the_ID();
        ?>
        <a href="<?php the_permalink(); ?>" class="special-link-small-item" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>;">
            <p class="special-link-small-item-title"><?php the_title(); ?></p>
            <p class="special-link-small-item-price">
                <b><?php echo $product->get_price_html(); ?></b>
                ( <?php  $auction_bid_count = get_post_meta($post_id, '_auction_bid_count', true); echo $auction_bid_count; ?> <?php _e('ставки', coins);?></p>
        </a>
        <?php
    endwhile;
    
      ?> <a href="<?php echo $image; ?>" class="special-link-large-item" style="background: url(<?php echo $pictures[$random_picture]['picture'];?>);"></a>
</div>
<?php endif; ?>
