<!DOCTYPE html>
<html lang="ru">
        <?php get_header(); ?>

                    <p class="other-page_title"><?php the_title(); ?></p>
                    <div class="other-page_text-content"><?php echo do_shortcode($post->post_content);?></div>
                   
                    <!--<div class="other-page_form">
                        <input class="other-page_input" type="text" name="" value="">
                        <input class="other-page_input" type="text" name="" value="">
                        <input class="other-page_input_submit" type="submit" name="" value="Вход">
                    </div>-->
                </main>

            </div>
        </div>
        <?php get_footer(); ?>
        
        <script src="<?= get_template_directory_uri() ?>/scripts/slideout.js" type="text/javascript"></script>
        <?php wp_footer(); ?>
    </body>
</html>
