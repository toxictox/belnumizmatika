<form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
	<input required type="search" class="search-input" placeholder="<?php _e( 'Поиск ауикцонов', coins ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
        <button type="submit" class="search-submit"></button>
	<input type="hidden" name="post_type" value="product" />
    <input type="hidden" name="search_auctions" value="true" />
</form>