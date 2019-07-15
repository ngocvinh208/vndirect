<?php 
	/* Template Name: Cutural */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content" class="cutural-job bg-gray">
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
	<div class="content-cutural-job content-hastitle content-general">
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
					<div class="des-cutural font16">
						<?php the_content(); ?>
					</div>
					<?php if(!empty(get_field('title_cutural',$pageid))){?>
					<h3 class="font25 font700"><?php echo get_field('title_cutural',$pageid); ?></h3>
					<?php } ?>
					<?php 
						$value_list = get_field('value_list',$pageid);
						if($value_list){
					?>
					<div class="cutural-value">
						<ul class="boxam row">
							<?php foreach($value_list as $val){?>
							<li class="col-md-3 box20">
								<div class="cultural-item">
									<div class="icon-cultural">
										<img src="<?php echo $val['icon_va']; ?>" alt="vndirect" />
									</div>
									<div class="infor text-center">
										<h4 class="font25 font700"><?php echo $val['title_va']; ?></h4>
										<p class="font300"><?php echo $val['des_va']; ?></p>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
					<?php } ?>
				</section>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>