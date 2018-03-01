<?php

if (!function_exists('tt_customizer_options')):

    function tt_customizer_options() {
        global $tt_sidebars;

        $template_uri = get_template_directory_uri();

        $pages = array();
        $all_pages = get_pages();
        foreach ($all_pages as $page) {
            $pages[$page->ID] = $page->post_title;
        }

        $option = array(
            // General
            array(
                'type' => 'section',
                'id' => 'colors',
                'label' => 'General',
                'desc' => '',
                'controls' => array(
                    array(
                        'type' => 'color',
                        'id' => 'brand-color',
                        'label' => 'Brand Color',
                        'default' => getLessValue('brand-color')
                    ),
                    array(
                        'type' => 'color',
                        'id' => 'color-title',
                        'label' => 'Title color',
                        'default' => getLessValue('color-title')
                    ),
                    array(
                        'type' => 'color',
                        'id' => 'color-text',
                        'label' => 'Content text color',
                        'default' => getLessValue('color-text')
                    ),
                    
                    array(
                        'id' => 'color_option_section_menu',
                        'type' => 'sub_title',
                        'label' => 'Menu Color',
                        'default' => getLessValue(' @menu-color')
                    ),
                    array(
                        'type' => 'color',
                        'id' => 'menu-color',
                        'label' => 'Menu color',
                        'default' => getLessValue('menu-color')
                    ),
                    array(
                        'type' => 'color',
                        'id' => 'menu-bg',
                        'label' => 'Menu background color',
                        'default' => getLessValue('menu-bg')
                    )
                )
            ),// end General

            
            // Fonts
            array(
                'type' => 'section',
                'id' => 'font',
                'label' => 'Font',
                'desc' => '',
                'controls' => array(
                    array(
                        'type' => 'font',
                        'id' => 'font-title-s',
                        'label' => 'Title font styled',
                        'default' => getLessValue('font-title-s')
                    ),
                    array(
                        'type' => 'font',
                        'id' => 'font-title',
                        'label' => 'Title Font normal',
                        'default' => getLessValue('font-title')
                    ),
                    array(
                        'type' => 'font',
                        'id' => 'font-text',
                        'label' => 'Text Font',
                        'default' => getLessValue('font-text')
                    ),
                    array(
                        'type' => 'font',
                        'id' => 'font-second',
                        'label' => 'Second Font',
                        'default' => getLessValue('font-second')
                    ),

                    array(
                        'id' => 'font_option_section_menu',
                        'type' => 'sub_title',
                        'label' => 'Menu Font',
                        'default' => ''
                    ),
                    array(
                        'type' => 'font',
                        'id' => 'menu-font',
                        'label' => 'Menu font',
                        'default' => getLessValue('menu-font')
                    ),


                    array(
                        'id' => 'font_option_section_footer',
                        'type' => 'sub_title',
                        'label' => 'Footer Font',
                        'default' => ''
                    ),
                    array(
                        'type' => 'font',
                        'id' => 'footer-font-title',
                        'label' => 'Footer Title Font',
                        'default' => getLessValue('footer-font-title')
                    ),
                    array(
                        'type' => 'font',
                        'id' => 'footer-font-text',
                        'label' => 'Footer Text Font',
                        'default' => getLessValue('footer-font-text')
                    ),
                    array(
                        'type' => 'font',
                        'id' => 'sub-footer-font',
                        'label' => 'Subfooter Font',
                        'default' => getLessValue('sub-footer-font')
                    )
                )
            ),// end Fonts

            array(
                'type' => 'section',
                'id' => 'section_header_style',
                'label' => 'Brand Logo & Header',
                'desc' => '',
                'controls' => array(
                    array(
                        'type' => 'image',
                        'id' => 'logo',
                        'label' => 'Logo Image',
                        'default' => get_template_directory_uri() ."/images/logo-white.svg",
                    ),
                    array(
                        'id' => 'page_title_image',
                        'label' => 'Page title background Image',
                        'default' => get_template_directory_uri() . '/images/pages/h5-cover.jpg|cover|center-top|scroll',
                        'type' => 'bg_image',
                    ),
                    array(
                        'id' => 'header_option_section',
                        'type' => 'sub_title',
                        'label' => 'Header Options',
                        'default' => ''
                    ),
                    array(
                        'id' => 'header_layout',
                        'label' => 'Header Layout',
                        'default' => 'menu_below_logo',
                        'type' => 'select',
                        'choices' => array(
                            'menu_above_logo'   => 'Menu above logo', 
                            'menu_below_logo'   => 'Menu below logo', 
                            'menu_full'         => 'Menu full', 
                            'menu_top_center'   => 'Menu center on topbar',
                            'menu_top_left'     => 'Menu left on topbar'
                        )
                    ),
                     /*header menu*/
                    array(
                        'id' => 'header_menu',
                        'label' => 'Header menu',
                        'default' => '1',
                        'type' => 'switch'
                    ),
                     array(
                        'id' => 'header_link_name1',
                        'label' => 'link1',
                        'default' => 'Map',
                        'desc' => 'menu below logo menu ',
                        'type' => 'textarea',
                         "dependency" => Array("element" => "header_menu", "switch" => array("1"))

                    ),
                      array(
                        'id' => 'header_name1',
                        'label' => 'URL:',
                        'default' => '#',
                        'desc' => '',
                        'type' => 'textarea',
                            "dependency" => Array("element" => "header_menu", "switch" => array("1"))
                    ),
                       array(
                        'id' => 'header_link_name2',
                        'label' => 'link2',
                        'default' => 'G2 Kingspark, Downtown, Newyork',
                        'desc' => 'menu below logo menu ',
                        'type' => 'textarea'
                    ),
                        array(
                        'id' => 'header_name2',
                        'label' => 'URL:',
                        'default' => '#',
                        'desc' => '',
                        'type' => 'textarea'
                    ),
                        array(
                        'id' => 'header_link_name3',
                        'label' => 'link3',
                        'default' => '+ 123 456 7890',
                        'desc' => 'menu below logo menu ',
                        'type' => 'textarea'
                    ),
                          array(
                        'id' => 'header_name3',
                        'label' => 'URL:',
                        'default' => '#',
                        'desc' => '',
                        'type' => 'textarea'
                    ),
                       array(
                        'id' => 'header_link_name4',
                        'label' => 'link4',
                        'default' => ' www.domainname.com',
                        'desc' => 'menu below logo menu ',
                        'type' => 'textarea'
                    ),
                          array(
                        'id' => 'header_name4',
                        'label' => 'URL:',
                        'default' => '#',
                        'desc' => '',
                        'type' => 'textarea'
                    ),
                            /*header menu end*/
                    array(
                        'id' => 'menu-font-size',
                        'label' => 'Menu Text Size',
                        'default' => getLessValue('menu-font-size'),
                        'type' => 'pixel'
                    ),

                    array(
                        'id' => 'menu-space',
                        'label' => 'Menu Items Space',
                        'default' => getLessValue('menu-space'),
                        'type' => 'pixel'
                    ),

                    array(
                        'id' => 'header_option_bg',
                        'type' => 'sub_title',
                        'label' => 'Header Background',
                        'default' => '',
                        'desc' => 'Menu full layout'
                    ),
                    array(
                        'id' => 'header-bg-color',
                        'label' => 'Background Color',
                        'default' => getLessValue('header-bg-color'),
                        'type' => 'color'
                    ),
                    array(
                        'id' => 'header_title',
                        'label' => 'Title',
                        'default' => 'Food is our Passion',
                        'desc' => '',
                        'type' => 'textarea'
                    ),  array(
                        'id' => 'header_sub_title',
                        'label' => 'Sub title',
                        'default' => 'ITS TIME FOR THE CHINESE SPICY DELIGHTS',
                        'desc' => '',
                        'type' => 'textarea'
                    ),
                       array(
                        'id' => 'header_bg_image',
                        'label' => 'Background Image',
                        'default' => get_template_directory_uri() . '/images/pages/h5-cover.jpg|cover|center-top|scroll',
                        'type' => 'bg_image'
                    ),
                  
                )
            ),// end Branding
            // Page Title
            // Page Title
            
            // Content options
            array(
                'type' => 'section',
                'id' => 'page_content',
                'label' => 'Content Options',
                'controls' => array(
                    array(
                        'id' => 'content-font-size',
                        'label' => 'Content Font Size',
                        'default' => getLessValue('content-font-size'),
                        'type' => 'pixel'
                    ),
                    array(
                        'id' => 'content-line-height',
                        'label' => 'Content Text Line Height',
                        'default' => getLessValue('content-line-height'),
                        'type' => 'pixel'
                    )
                     

                ),
            ), //end Content options


            // Social options
            array(
                'type' => 'section',
                'id' => 'social_content',
                'label' => 'Social Links',
                'controls' => array(
                    array(
                        'id' => 'social_fb',
                        'label' => 'Facebook',
                        'desc' => 'http://facebook.com/example',
                        'default' => '#',
                        'type' => 'input'
                    ),
                    array(
                        'id' => 'social_tw',
                        'label' => 'Twitter',
                        'desc' => 'http://twitter.com/example',
                        'default' => '#',
                        'type' => 'input'
                    ),
                    array(
                        'id' => 'social_gp',
                        'label' => 'Google Plus',
                        'desc' => 'http://plus.google.com/example',
                        'default' => '#',
                        'type' => 'input'
                    ),
                    array(
                        'id' => 'social_in',
                        'label' => 'instagram',
                        'desc' => 'http://www.instagram.com/example',
                        'default' => '#',
                        'type' => 'input'
                    )
                ),
            ), //end Social options

            // Footer
            array(
                'type' => 'section',
                'id' => 'section_footer',
                'label' => 'Footer',
                'controls' => array(
                    array(
                        'id' => 'footer_style',
                        'label' => 'Footer Columns',
                        'default' => '4',
                        'type' => 'select',
                        'choices' => array(
                            '1' => 'Full',
                            '2' => '2 Columns',
                            '3' => '3 Columns',
                            '4' => '4 Columns',
                            '5' => '1/3 + 1/6 + 1/4 + 1/4',
                        )
                    ),
                    array(
                        'id' => 'footer-color',
                        'label' => 'Footer Text Color',
                        'default' => getLessValue('footer-color'),
                        'type' => 'color'
                    ),
                    array(
                        'id' => 'footer-bg',
                        'label' => 'Footer Background Color',
                        'default' => getLessValue('footer-bg'),
                        'type' => 'color'
                    ),
                    array(
                        'id' => 'sub-footer-bg',
                        'label' => 'Sub Footer Background Color',
                        'default' => getLessValue('sub-footer-bg'),
                        'type' => 'color'
                    ),
                    // Footer Images
                    array(
                        'id' => 'footer_bg_image',
                        'type' => 'sub_title',
                        'label' => 'Footer top images',
                        'default' => ''
                    ),
                    array(
                        'id' => 'copyright_content',
                        'label' => 'Footer text',
                        'default' => '&copy; 2016. All rights reserved. Rozario made with love by <a href="http://themeforest.net/user/themeton/portfolio" target="_blank">Themeton</a> Designs.',
                        'desc' => '',
                        'type' => 'textarea'
                    ),
                    // flicr

                    array(
                        'id' => 'footer_bg_image',
                        'label' => 'Footer Backround image',
                        'default' => get_template_directory_uri() . '/images/pages/footer-1.png|cover|center-top|scroll',
                        'type' => 'bg_image'
                    ),

                ),
            ), // end Footer


            // Post Types
        
            // Extras
            array(
                'id' => 'panel_extra',
                'label' => 'Extras',
                'desc' => 'Export Import and Custom CSS.',
                'sections' => array(
                    // Backup
                    array(
                        'type' => 'section',
                        'id' => 'section_backup',
                        'label' => 'Export/Import',
                        'desc' => '',
                        'controls' => array(
                            array(
                                'id' => 'backup_settings',
                                'label' => 'Export Data',
                                'desc' => 'Copy to Customizer Data',
                                'default' => '',
                                'type' => 'backup'
                            ),
                            array(
                                'id' => 'import_settings',
                                'label' => 'Import Data',
                                'desc' => 'Import Customizer Exported Data',
                                'default' => '',
                                'type' => 'import'
                            )
                        )
                    ), // end backup
                    // Custom
                    array(
                        'type' => 'section',
                        'id' => 'section_custom_css',
                        'label' => 'Custom CSS',
                        'desc' => '',
                        'controls' => array(
                            array(
                                'id' => 'custom_css',
                                'label' => 'Custom CSS (general)',
                                'default' => '',
                                'type' => 'textarea'
                            ),
                            array(
                                'id' => 'custom_css_tablet',
                                'label' => 'Tablet CSS',
                                'default' => '',
                                'type' => 'textarea',
                                'desc' => 'Screen width between 768px and 991px.'
                            ),
                            array(
                                'id' => 'custom_css_widephone',
                                'label' => 'Wide Phone CSS',
                                'default' => '',
                                'type' => 'textarea',
                                'desc' => 'Screen width between 481px and 767px. Ex: iPhone landscape.'
                            ),
                            array(
                                'id' => 'custom_css_phone',
                                'label' => 'Phone CSS',
                                'default' => '',
                                'type' => 'textarea',
                                'desc' => 'Screen width up to 480px. Ex: iPhone portrait.'
                            ),
                        )
                    ) // end Custom
                )
            ) // end Extras
        );
        return $option;
    }
endif;
function tt_theme_customize_setup(){
    // create instance of TT Theme Customizer
    new TT_Theme_Customizer();
}
add_action( 'after_setup_theme', 'tt_theme_customize_setup' );
