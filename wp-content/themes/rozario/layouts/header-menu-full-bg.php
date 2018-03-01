
<?php
$header5 = TT::get_mod('header_bg_image');
$header5 = strpos($header5, "http")!==false ? $header5 : '';
?>
        <header id="header" class="menu-full-bg" style="background-image:url(<?php echo esc_attr($header5); ?>);">
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php get_template_part('layouts/logo'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cover Content -->
            <div class="full-section pv14">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home5-caption text-center">
                                <div class="mv2"><img src="<?php echo get_template_directory_uri();?>/images/svg/spoon-fork.svg" data-width="114px" alt="<?php esc_html_e('image', 'rozario'); ?>"></div>
                                <h2><?php echo TT::get_mod('header_title'); ?></h2>
                                <h4><?php echo TT::get_mod('header_sub_title'); ?></h4>
                                <div class="mv4"><img src="<?php echo get_template_directory_uri();?>/images/svg/h5-symbol.svg" alt="<?php esc_html_e('image', 'rozario'); ?>" data-width="284px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Cover Content -->
            <div class="pv4"></div>

            <!-- //Menu Container -->
            <div class="menu-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="header-wrapper">

                                <?php get_template_part('layouts/nav-menu'); ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- //Menu Container -->

        </header>