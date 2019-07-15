<?php 
	/* Template Name: FAQ */
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
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-qhcd.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-qhcd.png" alt="" />
			<h1 class="font800 text-uppercase">Quan hệ cổ đông</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-faq content-hastitle content-general">
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
					<h3 class="section-title font600 font40"><?php the_title(); ?></h3>
					<div class="des-title font16"><?php the_content(); ?></div>
					<section class="most-active">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<?php 
								$terms = get_terms('danh_muc_chtg',array('hide_empty'=>false));
								$i=1;
								foreach ($terms as $term ) {
							?>
							<li class="nav-item"><a class="nav-link <?php if($i==1) echo 'show active'; ?>" data-toggle="tab" role="tab" href="#tab<?php echo $i; ?>"><?php echo $term->name; ?></a></li>
							<?php $i++;} ?>
						</ul>
						<div class="tab-content" id="myTabContent">
							<?php 
								$terms = get_terms('danh_muc_chtg',array('hide_empty'=>false));
								$i=1;
								foreach ($terms as $term ) {
								$termid = $term->term_id;
							?>
							<div class="tab-pane fade <?php if($i==1) echo 'show active'; ?>" id="tab<?php echo $i?>" role="tabpanel">
								<div id="accordion" class="faq-information content-collapse">
								<?php
									$args = array(
										'post_type' => 'cau_hoi_thuong_gap',
										'posts_per_page' => 10,
										'paged'	=> max($page,$paged),
										'tax_query'      =>     array(
											array(
												'taxonomy'  => 'danh_muc_chtg',
												'field'   => 'ID',
												'terms' => $termid
											),
										)
									);
									$the_query = new WP_Query( $args );
									$a=1;
									while ($the_query->have_posts() ) : $the_query->the_post();
									$postid = $post->ID;
								?>
								<div class="card">	
									<div class="card-header">
										<a class="card-link flex-item" data-toggle="collapse" href="#collapse<?php echo $termid . $a; ?>">
											<p class="font16 lineheight15"><?php echo get_the_title($postid); ?></p>
											<span><i class="fa fa-angle-right"></i></span>
										</a>
									</div>
									<div id="collapse<?php echo $termid . $a; ?>" class="collapse" data-parent="#accordion">
										<div class="subfaq card-body"><?php echo get_the_content($postid); ?></div>
									</div>
								</div>
								<?php
									$a++;
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
							<?php $i++;} ?>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>