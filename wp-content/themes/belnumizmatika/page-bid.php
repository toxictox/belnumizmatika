<?php
get_header();
?>

<p class="other-page_title"><?php the_title(); ?></p>

<form id="yours" class="feedback-form" method="POST">
    <input type="text" id="appname" class="feedback-input" required placeholder="<?php _e('Ваше имя', coins); ?>">
    <input type="email" id="appemail" class="feedback-input" required placeholder="<?php _e('Электронная почта', coins); ?>">
    <input type="text" id="appproduct" name="product-name" class="feedback-input" required placeholder="<?php _e('Наименование товара', coins); ?>" value="<?php echo$_GET['product-name'] ?>">
    <textarea cols="30" id="appyour" rows="10" name="your" class="feedback-textarea" required placeholder="<?php _e('Ваше предложение', coins); ?>"></textarea>
    <div id="submit-ajax">
        <input id="subm" type="submit" class="feedback-submit" name="send" value="<?php _e('Отправить', coins);?>">
    </div>
</form>

<script type="text/javascript">
    jQuery("#subm").on("click", function (event) {
        event.preventDefault();
        var name = jQuery("#appname").val();
        var email = jQuery("#appemail").val();
        var product = jQuery("#appproduct").val();
        var your = jQuery("#appyour").val();
        if (name && email && product && your) {
            jQuery.ajax({
                url: "/wp-admin/admin-ajax.php",
                method: 'post',
                data: {
                    action: 'ajax_order',
                    name: name,
                    email: email,
                    product: product,
                    your: your

                },
                success: function (response) {
                    jQuery('#submit-ajax').html(response);
                    var URL = "http://worldcoinshop.pl/";
                    setTimeout(function(){ window.location = URL; }, 3500);
                }
            });
        } else {
            alert('Поля не заполнены');
        }
    });
</script>

</main>
<?php get_template_part('parts/au-last-added'); ?>
</div>
</div>



<?php
get_footer();
?>
<script src="<?= get_template_directory_uri() ?>/scripts/slideout.js" type="text/javascript"></script>
<?php
wp_footer();
?>