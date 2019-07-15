<?php 
	/* Template Name: Contact relationship */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<style type="text/css">
	.menu-relation >  a.mega-menu-link {
		background-color: #f7941e !important;
		font-weight: 700 !important;
		position: relative;
	}
	.menu-relation >  a.mega-menu-link:before{
		content: "";
		position: absolute !important;
		width: 0;
		height: 0;
		border-right: 15px solid transparent;
		border-left: 15px solid transparent;
		border-top: 15px solid #f7941e;
		bottom: -14px;
		z-index: 3;
		left: 50%;
		margin: 0 !important;
		transform: translateX(-50%);
		-ms-transform: translateX(-50%);
		-webkit-transform: translateX(-50%);
		-o-transform: translateX(-50%);
		top: auto;
		background: transparent;
	}
</style>
<main id="content" class="bg-gray">
	<?php if(!empty(get_field('banner_page',$pageid))){?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid);?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-qhcd.png" alt="" />
			<h1 class="font800 text-uppercase">Quan hệ cổ đông</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-ttht.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-qhcd.png" alt="" />
			<h1 class="font800 text-uppercase">Quan hệ cổ đông</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-contact content-hastitle content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline the-section">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">Quan hệ cổ đông</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_relationship')); ?>
						</div>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<div class="section-content section-right item-inline the-section">
					<h3 class="section-title font600 font40"><?php echo get_field('title_contact_center_main',$pageid); ?></h3>
					<p class="des-title des-bold font16"><?php echo get_field('title_contact_center',$pageid); ?></p>
					<?php 
						$contact_plist = get_field('contact_plist',$pageid);
						if($contact_plist){
					?>
					<section class="section-box row">
						<?php foreach($contact_plist as $cct){?>
						<div class="box-item col-md-6">
							<div class="infor box-white text-center">
								<div class="img-box"><img src="<?php echo $cct['icon_cct']; ?>" alt="vndirect" /></div>
								<h4 class="font25 font600"><?php echo $cct['title_cct']; ?></h4>
								<p class="font16 lineheight15"><?php echo $cct['des_cct']; ?></p>
								<a href="<?php echo $cct['link_cct']; ?>"></a>
							</div>
						</div>
						<?php } ?>
					</section>
					<?php } ?>
					<section class="hold-information">
						<h3 class="section-title font22 font600"><?php echo get_field('title_contactc2',$pageid); ?></h3>
						<p class="font16"><?php echo get_field('des_contactc2',$pageid); ?></p>
						<div class="form-contact form-box box-white">
							<?php echo do_shortcode(get_field('shortcode_contact_center',$pageid)); ?>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>