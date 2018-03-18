<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/favicon.ico">
    <title><?php wp_title();?></title>

    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/styles/index.css">

</head>

<div class="mobile-header-wrapper">
    <button class="mobile-header-nav-button"><?php _e('Меню', coins); ?></button>
    <a href="/account" class="mobile-header-link"><?php _e('Аккаунт', coins); ?></a>
    <div class="mobile-header-nav close">
        <?php
        $primaryWalker = new mainMenuWalker();
        wp_nav_menu(array('menu' => 'Мобильное меню', 'container' => false, 'walker' => $primaryWalker, 'items_wrap' => '%3$s'));
        ?>

    </div>
</div>
<header class="header-wrapper">
    <nav class="header-nav mobile-main-nav">
        <?php
        $walker = new mainMenuWalker();
        wp_nav_menu(array('menu' => 'Шапка - верх', 'container' => false, 'walker' => $walker, 'items_wrap' => '%3$s'));
        ?>
        <div class="right-items">
            <?php
            wp_nav_menu(array('menu' => 'Шапка - низ', 'container' => false, 'walker' => $walker, 'items_wrap' => '%3$s'));
            ?>
        </div>
    </nav>
    <div class="header-information">
        <a href="/" class="header-logo"></a>
        <p class="header-company-information">
            <b><?php the_field('contact_1', 5); ?></b><br>
            <?php the_field('contact_2', 5); ?><br>
            <?php the_field('contact_3', 5); ?>
            <a href="mailto:<?php the_field('contact_3_val', 5); ?>.com"><?php the_field('contact_3_val', 5); ?></a><br><br>
            <?php if (get_field('isOnTest', 5) == 1) : ?>
                <b><?php _e('Сайт работает в тестовом режиме', coins); ?></b>
            <?php endif; ?>
        </p>
        <!---<div class="lang-choice">
            <a href="/en/<?php the_title();?>" class="lang-choice-english"></a>
            <a href="/ru" class="lang-choice-russian"></a>
            <a href="/pl" class="lang-choice-poland"></a>
        </div> --->
        <?php dynamic_sidebar('language'); ?>
        <div class="currency-choice">
            <?php dynamic_sidebar('currencyarea'); ?>


        </div>
        <a href="/cart/" class="basket-info">           
            <p class="basket-info-title"><?php _e('В корзине', coins); ?></p>
            <p class="basket-info-descr"><?php echo sprintf(_n('%d товар', '%d товаров', WC()->cart->get_cart_contents_count(), 'coins'), WC()->cart->get_cart_contents_count()); ?></p>
        </a>
    </div>
    <div class="header-nav-wrapper">
        <nav class="header-nav mobile-coin-nav">
            <a href="/" class="header-nav-item special"><?php _e('Новые поступления', coins); ?></a>
            <?php
            wp_nav_menu(array('menu' => 'Категории - меню', 'container' => false, 'walker' => $walker, 'items_wrap' => '%3$s'));
            ?>          
        </nav>
    </div>
</header>

<body>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.12';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="all-content-wrapper">
        <div class="all-content">
            <div class="left-column mobile-left-column-close">
                <div class="options">
                    <?php echo do_shortcode('[woof]'); ?>
                </div>
          

                <div class="fb-page" data-href="https://www.facebook.com/WorldCoinShopPL/"  data-width="210" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/WorldCoinShopPL/" class="fb-xfbml-parse-ignore"></blockquote></div>
            </div>
            <main class="dynamic-content">



