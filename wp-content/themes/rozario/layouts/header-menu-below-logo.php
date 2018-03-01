        <header id="header" class="menu-below-logo">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        
                        <div class="header-wrapper">

                            <?php get_template_part('layouts/logo'); ?>

                            <?php
                            $header_contact = TT::get_mod('header_menu');
                            if( $header_contact=='1' ):
                            ?>
                            <div class="topbar-left-content visible-lg">
                                <ul>
                                    <li><a href="<?php echo TT::get_mod('header_name1'); ?>"><?php echo TT::get_mod('header_link_name1'); ?></a></li>
                                    <li><a href="<?php echo TT::get_mod('header_name2'); ?>"><?php echo TT::get_mod('header_link_name2'); ?></a></li>
                                </ul>
                            </div>
                            <div class="topbar-right-content visible-lg">
                                <ul>
                                    <li><a href="<?php echo TT::get_mod('header_name3'); ?>"><i class="fa fa-phone"></i> <?php echo TT::get_mod('header_link_name3'); ?></a></li>
                                    <li><a href="<?php echo TT::get_mod('header_name4'); ?>"><i class="fa fa-envelope-o"></i><?php echo TT::get_mod('header_link_name4'); ?></a></li>
                                </ul>
                         </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>

            <?php get_template_part('layouts/nav-menu'); ?>

        </header>