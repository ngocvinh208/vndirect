<?php 
	/* Template Name: Introduce */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<style type="text/css">
	.mega-menu-chane >  a.mega-menu-link {
		background-color: #f7941e !important;
		font-weight: 700 !important;
		position: relative;
	}
	.mega-menu-chane >  a.mega-menu-link:before{
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
	}
</style>
<main id="content" class="introduce-job bg-gray">
	<?php if(!empty(get_field('banner_page',$pageid))) { ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid);?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-chnn.png" alt="" />
			<h1 class="font800 text-uppercase">Cơ hội nghề nghiệp</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-chnn.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-chnn.png" alt="" />
			<h1 class="font800 text-uppercase">Cơ hội nghề nghiệp</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-introduce-job content-hastitle content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">Cơ hội nghề nghiệp</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_job')); ?>
						</div>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<section class="section-content section-right item-inline">
					<h3 class="section-title font600 font40"><?php the_title(); ?></h3>
					<?php 
						$parameter_list = get_field('parameter_list',$pageid);
						if($parameter_list){
					?>
					<div class="list-introduce">
						<ul class="boxam row">
							<?php foreach($parameter_list as $inl){?>
							<li class="col-md-3 box20">
								<div class="cultural-item">
									<div class="icon-cultural">
										<img src="<?php echo $inl['icon_para']; ?>" alt="vndirect" />
									</div>
									<div class="infor text-center">
										<h4 class="font48 font700"><?php echo $inl['title_para']; ?></b></h4>
										<p class="font300"><?php echo $inl['des_para']; ?></p>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
					<?php } ?>
					<div class="content-text">
						<?php the_content(); ?>
					</div>
					<?php 
						$intro_list = get_field('intro_list',$pageid);
						if($intro_list){
					?>
					<div class="section-box row">
						<?php foreach($intro_list as $inl){?>
						<div class="box-item col-md-6">
							<div class="infor box-white text-center">
								<div class="img-box"><img src="<?php echo $inl['icon_in']; ?>" alt="vndirect" /></div>
								<h4 class="font25 font600"><?php echo $inl['title_in']; ?></h4>
								<p><?php echo $inl['des_in']; ?></p>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
				</section>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>