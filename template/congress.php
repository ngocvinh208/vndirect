<?php 
	/* Template Name: Congres */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
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
	<div class="content-congres content-general">
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
					<div id="accordion" class="congres-information content-collapse">
						<?php
							$args = array(
								'post_type' => 'dai_hoi_co_dong',
								'posts_per_page' => -1,
								'paged'	=> max($page,$paged),
							);
							$the_query = new WP_Query( $args );
							$i=1;
							while ($the_query->have_posts() ) : $the_query->the_post();
							$postid = $post->ID;
						?>
						<div class="card">	
							<div class="card-header">
								<a class="card-link flex-item" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
									<div class="card-ileft">
										<h4 class="font19 font600"><?php echo get_the_title($postid); ?></h4>
										<p>6 báo cáo</p>
									</div>
									<span><i class="fa fa-angle-right"></i></span>
								</a>
							</div>
							<div id="collapse<?php echo $i; ?>" class="collapse" data-parent="#accordion">
								<?php 
									$cate_meeting_list = get_field('cate_meeting_list',$postid);
									if($cate_meeting_list){
								?>
								<div class="subcongres">
									<?php foreach($cate_meeting_list as $item){?>
									<div class="congres-item">	
										<a class="down-congres font16 font600" href="">
											<span><i class="fa fa-angle-right"></i></span><?php echo $item['name_meeting']; ?>
										</a>
										<?php 
											$document_list = $item['document_list'];
											if($document_list){
										?>
										<div class="sub2congres">
											<ul>
												<?php foreach($document_list as $citem){?>
												<li class="flex-item">
													<div class="information">
														<h6 class="font16"><a href=""><?php echo $citem['name_do'];?></a></h6>
														<p class="font13"><?php echo get_the_date('d/m/Y');  ?></p>
													</div>
													<?php if(!empty($citem['file_name'])){ ?>
													<div class="size">
														<span><?php echo $citem['file_type'];?> | <?php echo $citem['file_size'];?></span>
														<?php
															$filer = $citem['file_name'];
															$filename = explode('.',$filer['filename']);
														?>
														<a href="<?php echo $filer['url']; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/download.png" alt="" /></a>
													</div>
													<?php } ?>
												</li>
												<?php } ?>
											</ul>
										</div>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
								<?php } ?>
							</div>
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
<script type="text/javascript">
	jQuery(function(){
		$('.congres-item .down-congres').on('click',function(){
			$(this).toggleClass('active');
			$(this).next('.sub2congres').slideToggle();
			return false;
		});
	});
</script>