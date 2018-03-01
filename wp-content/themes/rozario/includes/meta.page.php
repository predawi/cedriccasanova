<?php

class CurrentThemePageMetas extends TTRenderMeta{

    function __construct(){
        $this->items = $this->items();

        $template_uri = get_template_directory_uri();
        
        add_action('admin_enqueue_scripts', array($this, 'print_admin_scripts'));
        add_action('add_meta_boxes', array($this, 'add_custom_meta'), 1);
        add_action('edit_post', array($this, 'save_post'), 99);
    }

    public function items(){
        global $post;

        define('ADMIN_IMAGES', get_template_directory_uri().'/framework/admin-assets/images/');

        $tmp_arr = array(
            'page' => array(
                'label' => 'Page Options',
                'post_type' => 'page',
                'items' => array(

                    array(
                        'name' => 'page_header',
                        'type' => 'select',
                        'label' => 'Page Header',
                        'default' => 'default',
                        'option' => array(
                            'default'   => 'Default - Customizer Option',
                            'menu_above_logo'   => 'Menu above logo',
                            'menu_below_logo'   => 'Menu below logo', 
                            'menu_full'         => 'Menu full', 
                            'menu_top_center'   => 'Menu center on topbar',
                            'menu_top_left'     => 'Menu left on topbar'
                        )
                    ),
                    array(
                        'name' => 'page_footer',
                        'type' => 'select',
                        'label' => 'Page Footer',
                        'default' => 'default',
                        'option' => array(
                            'default'   => 'Default - Customizer Option',
                            '1'   => 'standard',
                            '2'   => 'dark Column-4',
                            '3'   => 'dark Column-3',
                            '4'   => 'Sub Dark column-4',
                            '5'   => 'Sub'
                        )
                    ),

                    array(
                        'name' => 'page_layout',
                        'type' => 'thumbs',
                        'label' => 'Page Layout',
                        'default' => 'right',
                        'option' => array(
                            'full' => ADMIN_IMAGES . '1col.png',
                            'right' => ADMIN_IMAGES . '2cr.png',
                            'left' => ADMIN_IMAGES . '2cl.png'
                        ),
                        'desc' => 'Select Page Layout (Fullwidth | Right Sidebar | Left Sidebar)'
                    ),
                    array(
                        'type' => 'checkbox',
                        'name' => 'remove_padding',
                        'label' => 'Remove Padding',
                        'default' => '0'
                    ),
                    array(
                        'type' => 'checkbox',
                        'name' => 'title_show',
                        'label' => 'Page Title Show',
                        'default' => '1'
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'title_padding_top',
                        'label' => 'Title Padding Top',
                        'default' => '',
                        'dependency' => array("element" => "title_show", "value" => "1")
                    ),
                  
                    array(
                        'type' => 'background',
                        'name' => 'title_bg',
                        'label' => 'Title Background Image',
                        'default' => TT::get_mod('page_title_image'),
                        'desc' => 'If you want to show your background area beautiful, this option exactly you need.',
                        'dependency' => array("element" => "title_show", "value" => "1")
                    )
                )
            ),
            'portfolio' => array(
                'label' => 'Portfolio Options',
                'post_type' => 'portfolio',
                'items' => array(
                    array(
                        'name' => 'page_layout',
                        'type' => 'thumbs',
                        'label' => 'Page Layout',
                        'default' => 'right',
                        'option' => array(
                            'full' => ADMIN_IMAGES . '1col.png',
                            'right' => ADMIN_IMAGES . '2cr.png',
                            'left' => ADMIN_IMAGES . '2cl.png'
                        ),
                        'desc' => 'Select Page Layout (Fullwidth | Right Sidebar | Left Sidebar)'
                    ),
                    array(
                        'type' => 'select',
                        'name' => 'folio_size',
                        'label' => 'Image size',
                        'option'=> array(
                            '1x1' =>'1x1',
                            '2x1' =>'2x1',
                            '1x2' =>'1x2',
                            '2x2' =>'2x2',
                    )
                    ),



                )
            )

        );

        return $tmp_arr;
    }

}

new CurrentThemePageMetas();

?>