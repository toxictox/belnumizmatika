<?php

load_theme_textdomain('coins', get_template_directory() . '/languages');


add_action('wp_enqueue_scripts', 'get_jqm');

function wpb_widgets_init() {

    register_sidebar(array(
        'name' => 'Top Area',
        'id' => 'toparea',
        'description' => 'top area custom widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'wpb_widgets_init');


function language_widget() {

    register_sidebar(array(
        'name' => 'language',
        'id' => 'language',
        'description' => 'top area custom widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'language_widget');

function currency_widget_init() {
    register_sidebar(array(
        'name' => 'Currency Area',
        'id' => 'currencyarea',
        'description' => 'top area custom widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<p class="currency-choice-title">',
        'after_title' => '</p>',
    ));
}

add_action('widgets_init', 'currency_widget_init');

function widget_auctions() {

    register_sidebar(array(
        'name' => 'AuArea',
        'id' => 'auarea',
        'description' => 'auction area custom widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'widget_auctions');

remove_filter('the_content', 'wpautop');

class mainMenuWalker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth, $args) {
        // назначаем классы li-элементу и выводим его
        // назначаем атрибуты a-элементу
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $item_output = $args->before;

        // проверяем, на какой странице мы находимся
        $current_url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $item_url = esc_attr($item->url);
        $item_output .= "<a class='{$item->classes[0]} {$item->classes[1]}' {$attributes} > {$item->title}</a>";


        // заканчиваем вывод элемента
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}

class primaryMenuWalker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth, $args) {
        // назначаем классы li-элементу и выводим его
        // назначаем атрибуты a-элементу
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $item_output = $args->before;

        // проверяем, на какой странице мы находимся
        $current_url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $item_url = esc_attr($item->url);
        $item_output .= '<a class=' . $item->classes[0] . ' ' . $attributes . '>' . $item->title . '</a>';


        // заканчиваем вывод элемента
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}

class footerMenuWalker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth, $args) {
        // назначаем классы li-элементу и выводим его
        // назначаем атрибуты a-элементу
        $output .= '<li id="menu-item-' . $item->ID . '"' . $class_names . '>';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $item_output = $args->before;

        // проверяем, на какой странице мы находимся
        $current_url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $item_url = esc_attr($item->url);
        $item_output .= '<a ' . $attributes . '>' . $item->title . '</a>';


        // заканчиваем вывод элемента
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}

add_action('woocommerce_single_product_summary', function() {
    //template for this is in storefront-child/woocommerce/single-product/product-attributes.php
    global $product;
    echo $product->list_attributes();
}, 6);


function add_admin_scripts($hook) {

    global $post;

    if ($hook == 'post-new.php' || $hook == 'post.php') {
        //  if ( 'product' === $post->post_type ) {     
        wp_enqueue_script('myscript', get_template_directory_uri() . '/myscript.js');
        //}
    }
}

add_action('admin_enqueue_scripts', 'add_admin_scripts', 10, 1);

function my_acf_load_field($field) {

    $rate = get_field('currency_dollar', 5);

    $field['default_value'] = $rate;

    return $field;
}

add_filter('acf/load_field/name=rate', 'my_acf_load_field');

function my_acf_admin_head() {
    ?>
    <script type="text/javascript">

        jQuery(function ($) {

            $('#dived').hide();

            $('#acf-field_5a8eb218574c7').on('keyup', function () {
                var usd = $('#acf-field_5a8eb218574c7').val();
                var kurs = $('#acf-field_5a8eb351b3027').val();
                var pln = usd * kurs;
                $('#_regular_price').attr('value', pln.toFixed(2));
            });
        });
    </script>
    <?php

}

add_action('acf/input/admin_head', 'my_acf_admin_head');

function ajax_form() {
    $msg = "";
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $product = $_REQUEST['product'];
    $your = $_REQUEST['your'];

    $response = '';
    $msg .= "Имя: {$name}<br>";
    $msg .= "Email: {$email}<br>";
    $msg .= "Товар: {$product}<br>";
    $msg .= "Предложение: {$your}";
    $headers = "Content-Type: text/html; charset=UTF-8";

// Отправляем почтовое сообщение

    if (wp_mail('worldcoinshop@yandex.com', 'Заказ', $msg, $headers)) {
        $response = 'Сообщение отправлено';
    } else
        $response = 'Ошибка при отправке';

// Сообщение о результате отправки почты

    if (defined('DOING_AJAX') && DOING_AJAX) {
        echo $response;
        wp_die();
    }
}

add_action('wp_ajax_nopriv_ajax_order', 'ajax_form');
add_action('wp_ajax_ajax_order', 'ajax_form');


add_filter('wp_nav_menu_objects', 'ad_filter_menu', 10, 2);

function ad_filter_menu($sorted_menu_objects, $args) {
    // check for the right menu to rename the menu item from
    // here we check for theme location of 'primary-menu'
    // alternatively you can check for menu name ($args->menu == 'menu_name')

    if ($args->menu != 'Шапка - низ')  
        return $sorted_menu_objects;


    // rename the menu item that has a title of 'Log ind'
        if (is_user_logged_in()) {
            foreach ($sorted_menu_objects as $key => $menu_object) {
                // can also check for $menu_object->url for example
                // see all properties to test against:
                // print_r($menu_object); die();
                if ($menu_object->ID == '69') {
                    $current_user = wp_get_current_user();
                    $menu_object->title = $current_user->user_login;
                }
            }
        }
    return $sorted_menu_objects;
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 7);

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');


function wc_loop_image()
{
    echo "<div class='result-item-img' style='background: url(".get_the_post_thumbnail_url().");'></div>";
}

function wc_shop_loop_item_title()
{
    $result = '<div class="result-item-title-and-descr-wrapper">';
    $result .= '<a href="'.get_permalink().'" class="result-item-title">'.get_the_title().'</a>';
    $result .= '<p class="result-item-descr">Состояние: 12<br>

        </p>';
    $result .= '</div>';
    echo $result;
}

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail');
add_action('woocommerce_before_shop_loop_item_title', 'wc_loop_image', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
add_action('woocommerce_shop_loop_item_title', 'wc_shop_loop_item_title', 10);

