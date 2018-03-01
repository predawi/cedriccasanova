<div class="blog-container">

    <?php
    $content_class = 'blog-item';
    if (is_single()) {
        $content_class .= ' blog-single';
    } else {
        $content_class .= '';
    }

    $format = get_post_format();

    $loop_quote_link = !is_single() && ($format == 'quote' || $format == 'link');
    $loop_quote_link_media = '';
    if ($loop_quote_link) {
        $loop_quote_link_media = TPL::get_post_media();
        if (strlen($loop_quote_link_media) < 40) {
            $loop_quote_link = false;
        }
    }
    if ($loop_quote_link) {
        $content_class .= ' loop-quote-link';
    }
    ?>
    <article <?php post_class($content_class); ?>>
        <div class="entry-date"><span><?php the_time('M d, Y'); ?></span></div>

        <div class="entry-media">
            <a href="<?php the_permalink(); ?>" class="el-link">
                <?php
                if (has_post_thumbnail()) {
                    $thumb_img = wp_get_attachment_image(get_post_thumbnail_id(), 'full');
                    print($thumb_img);
                }
                ?>
            </a>
        </div>

        <div class="entry-excerpt">
            <h2 class="post-title">
                <?php if (is_single()): ?>
                   
                <?php else: ?>
                     <?php the_title(); ?>
                <?php endif; ?>
            </h2>
            <div class="entry-category">
                 <?php
                        $categories = get_the_category();
                        $output = '';
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" >' . esc_html($category->name) . '</a> ';
                            }
                        }
                     printf($output);
                        
                ?>
            </div>
            <?php if (is_single()): ?>
                <?php the_content();
                
                wp_link_pages(array(
                    'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'rozario') . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                    'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'rozario') . ' </span>%',
                    'separator' => '<span class="screen-reader-text">, </span>',
                ));

                $tag_list = get_the_tag_list();
                if( !empty($tag_list) ):
                    echo get_the_tag_list('', ' ,');
                endif;

                ?>
            <?php else: ?>

                
                    <?php the_excerpt(); ?>
                

            <?php endif; ?>
            <div class="read-more">
                <?php if (is_single()): ?>
                    <div class="entry-meta pull-left">
                        <ul>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/svg/share.svg" alt="<?php esc_html_e('Icon', 'rozario'); ?>">
                                <span><?php esc_html_e('Share', 'rozario'); ?></span>
                                <span class="social">
                                    <?php
                                    $share = TPL::get_share_links();
                                    ?>
                                    <a href="<?php echo esc_url($share['facebook']); ?>"><i class="fa fa-facebook"></i></a>
                                    <a href="<?php echo esc_url($share['googleplus']); ?>"><i class="fa fa-google-plus"></i></a>
                                    <a href="<?php echo esc_url($share['twitter']); ?>"><i class="fa fa-twitter"></i></a>
                                    <a href="<?php echo esc_url($share['instagram']); ?>"><i class="fa fa-instagram"></i></a>
                                </span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="entry-meta">
                        <ul>

                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/svg/heart.svg" alt="<?php esc_html_e('Icon', 'rozario'); ?>">
                                <span><?php comments_number('0', '1', '%'); ?></span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/svg/comment.svg" alt="<?php esc_html_e('Icon', 'rozario'); ?>">
                                <span><?php comments_number('0', '1', '%'); ?></span>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>

                    <a href="<?php the_permalink(); ?>" class="button bordered fill small">Read More</a>
                    <div class="entry-meta">
                        <ul>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/svg/heart.svg" alt="<?php esc_html_e('Icon', 'rozario'); ?>"><span><?php comments_number('0', '1', '%'); ?></span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/svg/comment.svg" alt="<?php esc_html_e('Icon', 'rozario'); ?>">
                                <span><?php comments_number('0', '1', '%'); ?></span>
                            </li>
                        </ul>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </article>


    <?php if( is_single() ): ?>
    <div class="author-info">
        <a href="javascript:;" class="author-image">
            <?php echo get_avatar($post->post_author, 144); ?>
        </a>
        <div class="info-entry">
            <div class="info-title">
                <div class="info-social">
                    <?php
                    $facebook = get_the_author_meta('facebook', $post->post_author);
                    $twitter = get_the_author_meta('twitter', $post->post_author);
                    $tumblr = get_the_author_meta('tumblr', $post->post_author);
                    $gplus = get_the_author_meta('gplus', $post->post_author);
                    ?>
                    <a href="<?php echo esc_attr($facebook); ?>" class="fb"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo esc_attr($twitter); ?>" class="tw"><i class="fa fa-twitter"></i></a>
                    <a href="<?php echo esc_attr($gplus); ?>" class="gp"><i class="fa fa-google-plus"></i></a>
                    <a href="<?php echo esc_attr($tumblr); ?>" class="tm"><i class="fa fa-tumblr"></i></a>
                </div>
                <h5><?php the_author_posts_link(); ?></h5>
                <p><?php echo get_the_author_meta('description'); ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>


</div>
