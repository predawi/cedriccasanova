
                    <div class="nothing-found media text-center">
                        <h2><?php esc_html_e('Nothing Found', 'rozario'); ?></h2>

                        <?php if (is_home() && current_user_can('publish_posts')) : ?>

                            <p><?php printf('%1$s <a href="%2$s">%3$s</a>.', esc_html__('Ready to publish your first post?', 'rozario'), esc_url(admin_url('post-new.php')), esc_html__('Get started here', 'rozario')); ?></p>

                        <?php elseif (is_search()) : ?>

                            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rozario'); ?></p>
                            <?php get_search_form(); ?>

                        <?php else : ?>

                            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rozario'); ?></p>
                            <?php get_search_form(); ?>

                        <?php endif; ?>
                   </div>
