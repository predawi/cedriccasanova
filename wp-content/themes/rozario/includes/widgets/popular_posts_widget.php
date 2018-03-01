<?php

class tt_PopularPostsWidget extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'latest_blogs', 'description' => 'Popularposts.');
        parent::__construct(false, ': PopularPosts', $widget_ops);
    }
    function widget($args, $instance) {
        global $post;
        extract($args);
        extract(array_merge(array(
                    'title' => 'POPULAR POSTS',
                    'number_posts' =>3,
                    'exclude_posts' => '',
                        ), $instance));
        print($before_widget);
        if ($title != '')
            echo "" . $args['before_title'] . $title . $args['after_title'];
        // build query
        $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $number_posts,
                        'ignore_sticky_posts' => true,
                        'category__not_in' => explode(',', $exclude_posts)
                    );
        $featured_item = '';
        $post_items = '';
        $post_index = 0;
        $posts_query = new WP_Query($args);
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            $post_index++;

            $cat_link = '';
            $cat_title = '';
            $post_categories = wp_get_post_categories(get_the_id());
            foreach($post_categories as $c){
                $cat = get_category($c);
                $cat_link = esc_attr(get_term_link($cat));
                $cat_title = $cat->name;
            }
                $thumb_img = '<img src="'.get_template_directory_uri().'/images/placeholder-related.jpg" alt="'.esc_attr__('image', 'rozario').'">';
                if( has_post_thumbnail() ){
                    $thumb_img = wp_get_attachment_image( get_post_thumbnail_id(),'thumbnail');
                }
                $featured_item .= '<li>
                                        <a class="rp-media" href="' .get_permalink().'">'.$thumb_img.'</a>
                                         <div class="rp-info">
                                                <a href="'.get_permalink().'" class="link-post">'.get_the_title().'</a>
                                                <span> on '.get_the_time('d M Y').'</span>
                                        </div>
                                    </li>';
        }
        echo '<ul class="recent-posts">
                    '.$featured_item.'
                </ul>';
        print($after_widget);
        wp_reset_postdata();
        /* <span>On '.the_time('D M Y').'</span>*/

    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['number_posts'] = sanitize_text_field($new_instance['number_posts']);
        $instance['exclude_posts'] = sanitize_text_field($new_instance['exclude_posts']);
        return $instance;
    }
    function form($instance) {
        //Output admin widget options form
        extract(shortcode_atts(array(
                    'title' => '',
                    'number_posts' => 3,
                    'exclude_posts' => '',
                        ), $instance));
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e("Title:", 'rozario'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>"  />
        </p>
        <p>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('number_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('number_posts')); ?>" value="<?php echo esc_attr($number_posts); ?>" size="3" />
            <label for="<?php echo esc_attr($this->get_field_id('number_posts')); ?>">Number of posts to show</label>
        </p>
        <p>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('exclude_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('exclude_posts')); ?>" value="<?php echo esc_attr($exclude_posts); ?>" size="3" />
            <label for="<?php echo esc_attr($this->get_field_id('exclude_posts')); ?>">Exclude category ID (optional)</label>
            <br><small>You can include multiple categories with comma separation.</small>
        </p>
        <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("tt_PopularPostsWidget");'));
