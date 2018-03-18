<!DOCTYPE html>
<html lang="ru">
    <?php get_header(); ?>
    <div class="search">
        <?php dynamic_sidebar('auarea'); ?>
    </div>

    <button class="mobile-search-options"><?php _e('Параметры поиска', coins); ?></button>


    <?php get_template_part('parts/auadv'); ?>

    <?php
    /**
     * woocommerce_before_shop_loop hook.
     *
     * @hooked wc_print_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action('woocommerce_before_shop_loop');
    ?>
    <div class="result">

        <?php woocommerce_product_loop_start(); ?>

        <?php woocommerce_product_subcategories(); ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php
            /**
             * woocommerce_shop_loop hook.
             *
             * @hooked WC_Structured_Data::generate_product_data() - 10
             */
            do_action('woocommerce_shop_loop');
            ?>

            <?php wc_get_template_part('content', 'product'); ?>

        <?php endwhile; // end of the loop.  ?>

        <?php woocommerce_product_loop_end(); ?>

        <?php the_posts_pagination(); ?>

    </div>
</main>
<?php get_template_part('parts/au-last-added'); ?>
</div>
</div>
<?php get_footer(); ?>
<script src="<?= get_template_directory_uri() ?>/scripts/slideout.js" type="text/javascript"></script>
<?php wp_footer(); ?>
</body>
</html>
