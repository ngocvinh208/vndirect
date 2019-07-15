<?php 
	/* Template Name: School */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content" class="goto-school bg-gray">
	<?php if(!empty(get_field('banner_page',$pageid))) { ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid);?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/school/icon-hoithao.png" alt="" />
			<h1 class="font800 text-uppercase">Hội thảo và đào tạo</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/school/banner-hoithao.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/school/icon-hoithao.png" alt="" />
			<h1 class="font800 text-uppercase">Hội thảo và đào tạo</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-school content-hastitle content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">Hội thảo đào tạo</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_school')); ?>
						</div>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<section class="section-content section-right item-inline">
					<h3 class="section-title font600 font40"><?php the_title(); ?></h3>
					<div class="des-school font16">
						<?php the_content(); ?>
					</div>
					<?php if(!empty(get_field('title_special',$pageid))){?>
					<h3 class="font25 font700"><?php echo get_field('title_special',$pageid); ?></h3>
					<?php } ?>
					<?php 
						$list_special = get_field('list_special',$pageid);
						if($list_special){
					?>
					<div class="school-special">
						<ul class="boxam row">
							<?php foreach($list_special as $item){?>
							<li class="col-md-4 box20">
								<div class="school-item box-white">
									<div class="icon-school">
										<img src="<?php echo $item['icon_spe']; ?>" alt="vndirect" />
									</div>
									<div class="infor text-center">
										<h4 class="font18 font600"><?php echo $item['title_spe']; ?></h4>
										<p class="font300"><?php echo $item['des_spe']; ?></p>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
						<div class="downnow">
							<a href="<?php echo get_field('link_course',$pageid);?>" class="btn-orange bg-orange openaccount">Chi tiết khóa học</a>
						</div>
					</div>
					<?php } ?>
					<?php if(!empty(get_field('title_course',$pageid))){?>
					<h3 class="font25 font700"><?php echo get_field('title_course',$pageid); ?></h3>
					<?php } ?>
					<?php 
					$gallery_course = get_field('gallery_course',$pageid);			
					if($gallery_course) { ?>	
					<ul class="gallery slider-gallery">
						<?php foreach($gallery_course as $item){?>
						<li><a href=""><img src="<?php echo $item['url']; ?>" alt="" /></a></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<div class="downnow">
						<a href="" class="btn-orange bg-orange  openaccount" target="_blank" >Mở tài khoản</a>
						<a href="<?php echo get_field('link_course',$pageid);?>" target="_blank" class="btn-down openaccount">Chi tiết khóa học</a>
					</div>
				</section>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
<script type="text/javascript">
	jQuery(function(){
		$('.slider-gallery').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			arrows: true,
			dots: false,
		});

	});
</script>