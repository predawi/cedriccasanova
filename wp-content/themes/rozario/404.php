<?php get_header(); ?>
<?php get_template_part("tpl", "page-title"); ?>
<section class="section-content">
    <div class="container">
        <div class="row mv12 mvt0" >
            <div class="col-sm-10 col-sm-offset-1 page-content">
                <p class="text-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/svg/404.svg" <?php esc_html_e('image', 'rozario'); ?> data-width="470px">
                </p>

                <div class="heading-top  text-center">
                    <h4><?php esc_html_e('SORRY, THE PAGE WAS NOT FOUND', 'rozario'); ?></h4>

                    <div class="line img-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/svg/thunder.svg" alt="<?php esc_html_e('Icon', 'rozario'); ?>"
                             data-width="16px">
                    </div>
                </div>

                <p class="text-center">
                    <?php esc_html_e('The page you were looking for is not valid. Please make sure you entered the URL correctly. It looks like nothing
                        was found at this location. Maybe try a search? Or this page may be private.', 'rozario');
                   ?>
                </p>

                <div class="row mv6 mvb0">
                    <div class="col-sm-8 col-sm-offset-2">
                        <form action="<?php echo esc_url(home_url('/')); ?>" class="search_form" method="get">
                            <input type="text" placeholder="<?php esc_attr_e('Search ...', 'rozario'); ?>" required="" name="s">
                            <button type="submit">
                               search
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>



