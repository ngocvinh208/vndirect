<footer id="footer" class="banner-general" style="background-image: url(<?php 
	if(isset($_POST['den_ngay']) !='') echo wp_get_attachment_url(get_field('banner_footer','option'));
	else echo get_field('banner_footer','option');
?>">
	<div class="container-full">
		<div class="footer-top">
			<div class="row">
				<div class="col-md-3 animated fade-in animated-delay">
					<a href="<?php echo home_url(); ?>" class="logo-footer"><img src="<?php the_field('logo_footer','option'); ?>" alt="VNDirect" /></a>
				</div>
				<div class="col-md-3">
					<div class="ftop-item ftop-office animated fade-in animated-delay1">
						<h5 class="font700">Trụ sở chính</h5>
						<p><?php the_field('main_office','option');?></p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="ftop-item ftop-phone animated fade-in animated-delay2">
						<h5 class="font700">Điện thoại</h5>
						<p><a href="tel:<?php the_field('phone','option');?>"><?php the_field('phone','option');?></a></p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="ftop-item ftop-email animated fade-in animated-delay3">
						<h5 class="font700">Email</h5>
						<p><a href="mailto:<?php the_field('email','option');?>"><?php the_field('email','option');?></a></p>
					</div>
				</div>
			</div>
			<div class="list-partner animated fade-in">
				<ul class="slick-partner">
					<?php $partner_list = get_field('partner_list','option');
					if($partner_list) {
					foreach($partner_list as $pl) { ?>
					<li><a href="<?php echo $pl['partner_link']; ?>"><img src="<?php echo $pl['partner_logo']; ?>" alt=""></a></li>
					<?php } } ?>
				</ul>
			</div>
		</div>
		<div class="footer-middle">
			<div class="list-inline list-footer">
				<div class="menu-footer menu-general item-inline">
					<?php wp_nav_menu( array( 'theme_location' => 'menu_footer' ) ); ?>
				</div>
				<div class="footer-mobile footer-item item-inline">
					<h4>Mobile trading</h4>
					<ul>
						<li><a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/download1.png" alt="" /></a></li>
						<li><a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/download2.png" alt="" /></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-bottom flex-item">
			<p class="copyright"><?php the_field('copyright','option');?></p>
			<div class="menu-bottom menu-general">
				<ul>
					<li><a href="<?php echo get_permalink(98);?>">Công bố rủi ro</a></li>
					<li><a href="<?php echo get_permalink(82);?>">Điều khoản sử dụng website</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer> <!--  End footer -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/datepicker/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/chart/loader.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/chart/Chart.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/chart/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgGyzOzpWh_mTpdx-UPt92W6GI8hE7P3M&libraries=places"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fancybox3/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mcs.animate.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/highlight.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/iframe_api.js"></script>
<script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mcs.custom.js"></script>
<?php wp_footer();?>
</body>
</html>