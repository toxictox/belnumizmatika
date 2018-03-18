<head>
    <?php 
    wp_head();?>
    <title><?php wp_title();?></title>
</head>
<?php


echo do_shortcode('[forum]');


wp_footer();