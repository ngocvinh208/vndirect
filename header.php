<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_head();
	?>
	<title>
		<?php
		global $page, $paged;
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
		?>
	</title>
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php the_field('favicon','option'); ?>" />
</head>
<body <?php body_class( $class ); ?>> 
<div class="the-header">
	<header id="header">
		<div class="header-top">
			<a href="" class="bar-menu transform-top toggle-menu"><img src="<?php echo get_template_directory_uri(); ?>/images/bar-white.png" alt="" /></a>
			<a href="<?php echo home_url(); ?>" class="logo-header transform-top"><img src="<?php the_field('logo_header','option');?>" alt="" /></a>
			<div class="list-method list-inline">
				<div class="item-inline method-item method-langs">
					<div class="method-lang bg-left">
						<span>Language </span>
						<div class="lcurrent"><b>VI</b><i class="fa fa-caret-down"></i></div>
						<ul class="list-language">
							<li><a href="" class="font600">VI</a></li>
							<li><a href="" class="font600">EN</a></li>
						</ul>
					</div>
				</div>
				<div class="item-inline method-item">
					<div class="method-hotline bg-left">
						<span>Hotline:</span> <a href="tel:<?php the_field('hotline','option');?>" class="font700 font15"><?php the_field('hotline','option');?></a>
					</div>
				</div>
				<div class="item-inline method-item">
					<div class="method-member bg-left">
						<span>Bạn đã có tài khoản?</span> 
						<a href="" class="text-uppercase font700 font15">Đăng nhập</a>
					</div>
				</div>
				<a href="" class="item-inline method-item method-openaccounts font18">
					<div class="method-openaccount bg-left">Mở tài khoản</div>
				</a>
			</div>
		</div>
		<div class="the-fixed">
			<div class="header-fixed">
				<div class="header-bottom">
					<div class="item-logo">
						<a href="" class="bar-menu transform-top toggle-menu"><img src="<?php echo get_template_directory_uri(); ?>/images/bar-white.png" alt="" /></a>
						<a href="<?php echo home_url(); ?>" class="logo-header transform-top"><img src="<?php the_field('logo_footer','option');?>" alt="" /></a>
					</div>
					<div class="list-inline text-right list-change">
						<div class="item-inline item-center text-left">
							<div class="menu-main menu-general">
							<?php wp_nav_menu( array( 'theme_location' => 'menu_main' ) ); ?>
							</div>
						</div>
						<div class="item-inline item-left text-left">
							<div class="list-method list-inline">
								<div class="item-inline method-item">
									<div class="method-member bg-left">
										<span>Bạn đã có tài khoản?</span> 
										<a href="" class="text-uppercase font700 font15">Đăng nhập</a>
									</div>
								</div>
								<a href="" class="item-inline method-item method-openaccounts font18">
									<div class="method-openaccount bg-left">Mở tài khoản</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header> <!-- End header  -->
</div>
<div class="menu-mobile">
	<?php wp_nav_menu(array('theme_location'=> 'menu_mobile')); ?>
</div>