<?php 
	/* Template Name: Member Supervisory */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
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
					<div id="accordion" class="member-information content-collapse">
					  <?php
							$args = array(
								'post_type'	=> 'ban_kiem_soat',
								'posts_per_page' => -1,
							);
							 $i=1;
							 $the_query = new WP_Query( $args );
							 while ($the_query->have_posts() ) : $the_query->the_post();
							 $postid = $post->ID;
						?>
						<div class="card">	
							<div class="card-header">
								<a class="card-link flex-item" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
									<p class="font16 lineheight15"><?php echo get_the_title($postid); ?></b></p>
									<span><?php echo get_field('position',$postid);?><i class="fa fa-angle-right"></i></span>
								</a>
							</div>
							<?php 
								$period_list = get_field('period_list',$postid);
								if($period_list){
							?>
							<div id="collapse<?php echo $i; ?>" class="collapse" data-parent="#accordion">
								<div class="submember card-body">
									<?php foreach($period_list as $item){?>
									<div class="member-item flex-item">
										<div class="stage font19"><b><?php echo $item['year_pe'];?></b></div>
										<div class="stage-infor font300"><?php echo $item['content_pe'];?></div>
									</div>
									<?php } ?>
								</div>
							</div>
							<?php } ?>
						</div>
						<?php
							$i++;
							endwhile;
							wp_reset_query();
						?>	
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>