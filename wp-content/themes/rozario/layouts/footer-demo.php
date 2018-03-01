<?php
global $post, $demo_resource_uri;
$post_slug=$post->post_name;
$footer_custom_layout = 'style-1';
switch ($post_slug) {
	case 'home-1':
		$footer_custom_layout = 'style-1';
		break;
	case 'home-2':
		$footer_custom_layout = 'style-2';
		break;
	case 'home-3':
		$footer_custom_layout = 'style-3';
		break;
	case 'home-4':
		$footer_custom_layout = 'style-4';
		break;
    case 'home-5':
        $footer_custom_layout = 'style-5';
        break; 
    case 'contact':
        $footer_custom_layout = 'style-2';
        break;
	
	default:
		$footer_custom_layout = 'style-1';
		break;
}
?>
<?php
// Footer layout 1
if($footer_custom_layout == 'style-1') { ?>
<footer id="footer" class="footer-1" data-bg-image="<?php echo get_template_directory_uri()?>/images/pages/footer-1.png">
            <div class="container footer-container">
                <div class="row">                
                  <div class="col-md-4">
                        <div class="widget">
                            <p><img src="<?php echo get_template_directory_uri()?>/images/logo-white.svg" alt="<?php esc_html_e('image', 'rozario'); ?>" data-width="87px"></p>
                            <br>
                            <p>Thank you for being a friend. Travelled down the road and back again. Your heart is true you're a pal and a confidant.</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="widget">
                            <h5 class="widget-title">Where We Are</h5>
                            <p>G2 Kingspark, Downtown, Newyork</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="widget">
                            <h5 class="widget-title">Working Hours</h5>
                            <p>Monday - Sunday<br> <strong class="color-brand">9.00 AM to 11.00 PM</strong></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">
                            <h5 class="widget-title">Subscribe now</h5>
                            <div class="subscribe-form">
                                <form>
                                    <input type="text" placeholder="E-mail">
                                    <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

           <?php get_template_part('layouts/sub', 'footer'); ?>
        </footer>
  
<?php
}
?>

<?php
// Footer layout 2
if($footer_custom_layout == 'style-2') { ?>
 <footer id="footer" class="footer-2">

            <div class="container footer-container">
                <div class="row">

                    <div class="col-md-3">
                        <div class="widget">
                            <h5 class="widget-title">Subscribe now</h5>
                            <div class="subscribe-form envelope">
                                <form>
                                    <input type="text" placeholder="E-mail">
                                    <button type="submit"><i class="fa fa-envelope-o"></i></button>
                                </form>
                            </div>
                        </div>

                        <div class="widget">
                            <div class="social-links">
                                <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                <a href="javascript:;"><i class="fa fa-google-plus"></i></a>
                                <a href="javascript:;"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="widget">
                            <h5 class="widget-title">Location</h5>
                            <p>
                                G2 Kingspark, Downtown, Newyork.<br>
                                <i class="fa fa-phone"></i> + 123 456 7890<br>
                                <i class="fa fa-envelope-o"></i> www.domainname.com
                            </p>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="widget">
                            <h5 class="widget-title">Working Hours</h5>
                            <p>Monday - Sunday<br> <strong class="color-brand">9.00 AM to 11.00 PM</strong></p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="widget">
                            <p>
                                <img src="<?php echo get_template_directory_uri()?>/images/pages/footer-map.png" data-width="100%" alt="<?php esc_html_e('image', 'rozario'); ?>">
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="sub-footer">
                <div class="container">
                    <div class="row copyright-text">
                        <div class="col-sm-12 text-center">
                            <p class="mv3 mvt0">&copy; Copyrights 2016 Rozario. All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
  </footer>
  
<?php
}
?>

<?php
// Footer layout 3
if($footer_custom_layout == 'style-3') { ?>
   <footer id="footer" class="footer-3" data-bg-color="#111111">

            <div class="container footer-container">
                <div class="row">

                    <div class="col-sm-6 col-md-4">
                        
                        <div class="widget">
                            <p>
                                <img src="<?php echo get_template_directory_uri()?>/images/logo-yellow.svg" data-width="166px" alt="<?php esc_html_e('image', 'rozario'); ?>">
                            </p>
                        </div>

                    </div>

                    <div class="col-sm-6 col-md-4 text-center">
                        
                        <div class="widget widget-subscribe-form">
                            <h5 class="widget-title">Subscribe Now</h5>
                            <div class="subscribe-form envelope">
                                <form>
                                    <input type="text" placeholder="Email">
                                    <button type="submit"><i class="fa fa-send-o"></i></button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-1"></div>

                    <div class="col-sm-6 col-md-4 text-right">

                        <div class="widget">
                            <div class="social-links">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="sub-footer">
                <div class="container">
                    <div class="row copyright-text">
                        <div class="col-sm-12 text-center">
                            <p class="mv3 mvt0">&copy; Copyrights 2016 Rozario. All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
   </footer>
<?php
}
?>
<?php
// Footer layout 4
if($footer_custom_layout == 'style-4') { ?>
          <footer id="footer" class="footer-4">
            
            <div class="container footer-container">
                <div class="row">

                    <div class="col-sm-6 col-md-4">

                        <div class="widget">
                            <p><img src="<?php echo get_template_directory_uri()?>/images/logo-white.svg" alt="<?php esc_html_e('image', 'rozario'); ?>" data-width="87px"></p>
                            <br>
                            <p>Thank you for being a friend. Travelled down the road and back again. Your heart is true you're a pal and a confidant.</p>
                        </div>

                    </div>


                    <div class="col-sm-6 col-md-3">
                        
                        <div class="widget">
                            <h5 class="widget-title">Flickr feed</h5>
                            <div class="image-feed">
                                <a href="javascript:;"><img src="<?php echo get_template_directory_uri()?>/images/pages/fs1.png" alt="<?php esc_html_e('flickr image', 'rozario'); ?>"></a>
                                <a href="javascript:;"><img src="<?php echo get_template_directory_uri()?>/images/pages/fs2.png" alt="<?php esc_html_e('flickr image', 'rozario'); ?>"></a>
                                <a href="javascript:;"><img src="<?php echo get_template_directory_uri()?>/images/pages/fs3.png" alt="<?php esc_html_e('flickr image', 'rozario'); ?>"></a>
                                <a href="javascript:;"><img src="<?php echo get_template_directory_uri()?>/images/pages/fs4.png" alt="<?php esc_html_e('flickr image', 'rozario'); ?>"></a>
                                <a href="javascript:;"><img src="<?php echo get_template_directory_uri()?>/images/pages/fs5.png" alt="<?php esc_html_e('flickr image', 'rozario'); ?>"></a>
                                <a href="javascript:;"><img src="<?php echo get_template_directory_uri()?>/images/pages/fs6.png" alt="<?php esc_html_e('flickr image', 'rozario'); ?>"></a>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6 col-md-2">
                        <div class="widget">
                            <h5 class="widget-title">Working Hours</h5>
                            <p>Monday - Sunday<br> <strong class="color-brand">9.00 AM to 11.00 PM</strong></p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="widget">
                            <h5 class="widget-title">Subscribe</h5>
                            <div class="subscribe-form">
                                <form>
                                    <input type="text" placeholder="Email">
                                    <button type="submit"><i class="fa fa-send-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

 <?php get_template_part('layouts/sub', 'footer'); ?>

        </footer>
<?php
}
?>

<?php
// Footer layout 5
if($footer_custom_layout == 'style-5') { ?>
  <footer id="footer" class="footer-5">
    <?php get_template_part('layouts/sub', 'footer'); ?>
  </footer>
<?php
}
?>