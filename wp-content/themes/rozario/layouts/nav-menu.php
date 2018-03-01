                           <nav class="main-nav">
                                <?php
                                wp_nav_menu( array(
                                    'menu_id'           => 'primary-nav',
                                    'menu_class'        => '',
                                    'theme_location'    => 'primary',
                                    'container'         => '',
                                    'fallback_cb'       => 'tt_primary_callback'
                                ) );
                                ?>
                                <a href="javascript:;" id="mobile-menu">
                                   <?php esc_html_e('Menu', 'rozario'); ?>
                                    <span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                </a>
                                <a href="javascript:;" id="close-menu"></a>
                            </nav>
                            