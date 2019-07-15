<?php 
	/* Template Name: Annual report */
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
	<?php if(!empty(get_field('banner_page',$pageid))) { ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid);?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-qhcd.png" alt="" />
			<h1 class="font800 text-uppercase">Quan hệ cổ đông</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-chnn.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-qhcd.png" alt="" />
			<h1 class="font800 text-uppercase">Quan hệ cổ đông</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-annual-report content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline">
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
				<div class="section-content section-right item-inline">
					<h3 class="section-title font600 font40"><?php the_title(); ?></h3>
					<section class="annual-report">
						<div class="list-report row">
							<?php
								$args = array(
									'post_type'	=> 'bao_cao_thuong_nien',
									'posts_per_page' => 6,
									'paged'	=> max($page,$paged),
								);
								 $the_query = new WP_Query( $args );
								 while ($the_query->have_posts() ) : $the_query->the_post();
								 $postid = $post->ID;
							?>
							<div class="col-md-4 report-item">
								<?php 
									$filer = get_field('file_name',$postid);
									$filename = explode('.',$filer['filename']);
								?>
								<a href="<?php echo $filer['url']; ?>" target="_blank">
									<div class="img-report"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title($postid); ?>" /></div>
									<h3 class="text-right"><?php echo get_the_title($postid); ?></h3>
								</a>	
							</div>
							<?php
								endwhile;
								wp_reset_query();
							?>
						</div>
					</section>
					<div class="text-right">
						<?php
							$big = 999999999;
							$mcs_paginate_links = paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $the_query->max_num_pages,
								'prev_text'    => __('«','yup'),
								'next_text'    => __('»','yup') 
							  ) );
							 if($mcs_paginate_links) : 
						 ?>
						<nav class="control-post">
							<?php echo $mcs_paginate_links ?>
						</nav>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>