<?php 
	$postid = get_the_ID();
	get_header(); 
	the_post();
?>
<style type="text/css">
	.mega-menu-personal >  a.mega-menu-link {
		background-color: #f7941e !important;
		font-weight: 700 !important;
		position: relative;
	}
	.mega-menu-personal >  a.mega-menu-link:before{
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
<main id="content" class="bg-gray">
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="content-banner banner-general" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-dichvu.png" alt="" />
			<h1 class="font800 text-uppercase">Dịch vụ</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/dichvu/banner-dichvu.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-dichvu.png" alt="" />
			<h1 class="font800 text-uppercase">Dịch vụ</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-services content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">Dịch vụ</h3>
						<ul>
							<?php
								$args = array(
									'post_type'	=> 'dich_vu',
									'posts_per_page' => -1,
								);
								 $the_query = new WP_Query( $args );
								 while ($the_query->have_posts() ) : $the_query->the_post();
								 $seid = $post->ID;
							?>
							<li class="<?php if($seid == $postid) echo 'active'?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php
								endwhile;
								wp_reset_query();
							?>	
							<li><a href="<?php echo get_permalink(1120); ?>">Biểu phí dịch vụ</a></li>
						</ul>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<div class="section-content section-right item-inline">
					<h3 class="section-title font600 font40"><?php the_title(); ?></h3>
					<section class="services-content content-text"><?php the_content(); ?></section>
				</div>
			</div>
		</div>
		<div class="section-bottom-services section-bottom bg-graybold">
			<div class="container-inner">
				<div class="section-inner text-center">
					<?php if(!empty(get_field('sv_title',$postid))){?>
					<h3 class="section-title font600 font40"><?php echo get_field('sv_title',$postid) ?></h3>
					<?php } ?>
					<?php if(!empty(get_field('sv_des',$postid))){?>
					<div class="section-shortdes font16 font300 lineheight15">
						<?php echo get_field('sv_des',$postid) ?>
					</div>
					<?php } ?>
					<?php 
						$sv_listbox = get_field('sv_listbox','option');
						if($sv_listbox){
					?>
					<section class="section-box row">
						<?php foreach($sv_listbox as $eva){?>
						<div class="box-item col-md-6">
							<div class="infor box-white">
								<div class="img-box"><img src="<?php echo $eva['icon']; ?>" alt="vndirect" /></div>
								<h4 class="font25 font600"><?php echo $eva['title']; ?></h4>
								<p class="font16 lineheight15"><?php echo $eva['des']; ?></p>
							</div>
						</div>
						<?php } ?>
					</section>
					<?php } ?>
					<section class="services-about">
						<?php if(!empty(get_field('sv_content',$postid))){?>
							<div class="short-des font19 text-center">
								<?php echo get_field('sv_content',$postid) ?>
							</div>
						<?php } 
							$sv_nav = get_field('sv_nav',$postid);
							if($sv_nav) {
						?>
						<div class="control-box">
							<div class="row">
								<?php foreach($sv_nav as $sn) { ?>
								<div class="col-md-4">
									<a href="<?php echo $sn['link']; ?>" class="font18 font600"><?php echo $sn['title']; ?></a>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
					</section>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>