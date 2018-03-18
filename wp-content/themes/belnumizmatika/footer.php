<footer class="footer-wrapper">
    <div class="footer">
        <div class="footer-social-links-wrapper">
            <p class="footer-social-links-title">
                <b>World Coin Shop</b>
                <?php _e('в социальных сетях', coins);?>:</p>
            <div class="footer-social-links">
                <a href="#" class="footer-social-links-vk"></a>
                <a href="#" class="footer-social-links-fb"></a>
                <a href="#" class="footer-social-links-tw"></a>
                <a href="#" class="footer-social-links-gp"></a>
            </div>
        </div>
        <ul class="footer-links">
            
            <?php 
                wp_nav_menu(array('menu' => 'Футер - left','container' => false, 'walker' => $walker, 'items_wrap' => '%3$s'));
             ?>
          
        </ul>
        <ul class="footer-links">
            <p class="footer-links-title"><?php _e('Пользователь', coins);?>:</p>
            <?php $footerRightWalker = new footerMenuWalker();
                wp_nav_menu(array('menu' => 'Футер - right','container' => false, 'walker' => $walker, 'items_wrap' => '%3$s'));
             ?>
        </ul>
        <div class="mail-subs">
            <p class="mail-subs-descr"><?php _e('Оформите подписку на свою электронную почту и получайте свежие новости от World Coin Shop:', coins);?></p>
            <?php echo do_shortcode('[email-subscribers namefield="NO" desc="" group="Public"]');?>
        </div>
    </div>
    <div class="footer-copyright">World Coin Shop &copy; 2018</div>
</footer>