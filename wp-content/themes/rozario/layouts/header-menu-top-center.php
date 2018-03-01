        <header id="header" class="menu-top-center">
            <div class="container">
                <div class="row">

                    <div class="col-sm-4 col-md-5 text-right">
                        <nav class="main-nav navigation-left">
                            <?php
                            wp_nav_menu( array(
                                'menu_id'           => 'primary-nav',
                                'menu_class'        => '',
                                'theme_location'    => 'left_menu',
                                'container'         => '',
                                'fallback_cb'       => false
                            ) );
                            ?>
                        </nav>
                    </div>

                    <div class="col-sm-4 col-md-2">
                        
                        <div class="header-wrapper">
                            <?php get_template_part('layouts/logo'); ?>
                        </div>

                    </div>

                    <div class="col-sm-4 col-md-5 text-left">
                        <nav class="main-nav navigation-right">
                            <?php
                            wp_nav_menu( array(
                                'menu_id'           => 'primary-nav2',
                                'menu_class'        => '',
                                'theme_location'    => 'right_menu',
                                'container'         => '',
                                'fallback_cb'       => false
                            ) );
                            ?>
                            <a href="javascript:;" id="mobile-menu">
                                Menu
                                <span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </a>
                            <a href="javascript:;" id="close-menu"></a>
                        </nav>
                    </div>

                </div>
            </div>
        </header>