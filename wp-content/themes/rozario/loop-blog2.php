<div class="blog-container">

    <?php
    $content_class = 'blog-item horizontal';
    if (is_single()) {
        $content_class .= '';
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
        <table>
            <tr>
                <td class="entry-media">
                    <a href="<?php the_permalink(); ?>" class="el-link">
                        <?php
                        if (has_post_thumbnail()) {
                            $thumb_img = wp_get_attachment_image(get_post_thumbnail_id(), 'rozario-blog2');
                            print($thumb_img);
                        }
                        ?>
                    </a>
                </td>
                <td class="entry-excerpt">
                    <div class="entry-date"><span><?php the_time('M d, Y'); ?></span></div>
                    <h2 class="post-title">
                        <?php if (is_single()): ?>
                            <?php the_title(); ?>
                        <?php else: ?>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
                    <br>

                        <?php $tag_list = get_the_tag_list();
                            if( !empty($tag_list) ):
                            ?>
                            <?php echo get_the_tag_list('', ' ,'); ?>
                        <?php endif; ?>

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
                                        <span>Share</span>
                                    <span class="social">
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
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/svg/share.svg" alt="<?php esc_html_e('Icon', 'rozario'); ?>">
                                    </li>
                                    <li>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/svg/heart.svg" alt="<?php esc_html_e('Icon', 'rozario'); ?>">
                                    </li>
                                    <li>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/svg/comment.svg" alt="<?php esc_html_e('Icon', 'rozario'); ?>">
                                    </li>
                                </ul>
                            </div>

                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        </table>
    </article>


</div>
