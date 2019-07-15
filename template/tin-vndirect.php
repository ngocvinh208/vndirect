<?php 
	/* Template Name: Tin VNDriect */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content" class="bg-gray">
	<?php if(!empty(get_field('banner_page',$pageid))) { ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid);?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-center.png" alt="" />
			<h1 class="font800 text-uppercase">Trung tâm hỗ trợ</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-ttht.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-center.png" alt="" />
			<h1 class="font800 text-uppercase">Trung tâm hỗ trợ</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-tin content-hastitle content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline the-section">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">Trung tâm hỗ trợ</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_center')); ?>
						</div>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<div class="section-content section-right item-inline">
					<h3 class="section-title font600 font40">Tin VNDIRECT</h3>
					<p class="des-title des-bold font16">Những thông tin về VNDIRECT được cập nhật hàng ngày </p>
					<div class="news-list">
						<?php
							$args = array(
								'post_type' => 'tin_vndriect',
								'posts_per_page' => 8,
								'paged'	=> max($page,$paged),
							);
							 $the_query = new WP_Query( $args );
							while ($the_query->have_posts() ) : $the_query->the_post();
							$did = $post->ID;
							$view_numbers = get_field('view_numbers',$did);
						?>
						<div class="news-item flex-item">
							<div class="news-left">
								<div class="news-date">
									<p><span class="date-day"><?php echo get_the_date( 'd' ); ?></span class="date-month"><sup>/<?php echo get_the_date( 'm' ); ?></sup></p>
									<p class="date-year font16 font300 text-center">năm <?php echo get_the_date( 'Y' ); ?></p>
								</div>
							</div>
							<div class="news-infor">
								<h3><a href="<?php echo get_the_permalink($did); ?>" class="font24 font700"><?php echo get_the_title($did);?></a></h3>
								<p class="news-view"><a class="font300">Tin VNDIRECT</a> <span class="fontita">
									<?php if($view_numbers){?>
									<i class="fa fa-eye"></i><?php echo $view_numbers;?></span>
									<?php } ?>
								</p>
								<div class="news-des font16">
									<?php echo wp_trim_words(get_the_excerpt($post->ID), 40); ?> 
								</div>
								<!--<a href="" class="download"><img src="<?php echo get_template_directory_uri(); ?>/images/download.png" alt="" /></a>-->
							</div>
						</div>
						<?php
							endwhile;
							wp_reset_query();
						?>
					</div>
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