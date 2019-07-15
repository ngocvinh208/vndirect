<?php 
	/* Template Name: Services Fee */
	$pageid = get_the_ID();
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
	<div class="content-fee content-general">
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
							<li class="active"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						</ul>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<div class="section-content section-right item-inline">
					<h3 class="section-title font600 font40"><?php the_title(); ?></h3>
					<section class="services-fee services-content">
						<?php the_content(); ?>
					</section>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>