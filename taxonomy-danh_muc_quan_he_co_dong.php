<?php 
	$terms_current = get_queried_object();	
	$termid = $terms_current->term_id;
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
	<div class="content-disclosure content-general">
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
					<h3 class="section-title font600 font40"><?php echo $terms_current->name; ?></h3>
					<?php
						
						$args = array(
							'post_type'=> 'quan_he_co_dong',
							'posts_per_page' => 12,
							'paged'	=> max($page,$paged),
							'tax_query'      =>     array(
								array(
									'taxonomy'  => 'danh_muc_quan_he_co_dong',
									'field'   => 'ID',
									'terms' =>$terms_current->term_id
								),
							)
						);
						$the_query = new WP_Query( $args );
						if(have_posts()){
					?>
					<div class="form-default form-daily form-calendar">
						<form action="" id="filterForm" method="POST">
							<div class="row">
								<div class="form-group col-md-4">
									<h4 class="font20 font600">Tìm theo ngày</h4>
								</div>
								<div class="form-group form-date col-md-4">
									<label for="toDate" class="label">Từ ngày</label>
									<input type="text" class="form-control form-date change-date" id="toDate" name="tu_ngay" value="<?php echo $_POST['tu_ngay'];?>" autocomplete="off" placeholder="DD/MM/YY">
								</div>
								<div class="form-group form-date col-md-4">
									<label for="fromDate" class="label">Đến ngày</label>
									<input type="text" class="form-control form-date change-date" id="fromDate" name="den_ngay" value="<?php echo $_POST['den_ngay'];?>" autocomplete="off" placeholder="DD/MM/YY">
								</div>
							</div>
						</form>
					</div>
					<div class="news-list-second news-list">	
						<?php
							while ($the_query->have_posts() ) : $the_query->the_post();
							$postid = $post->ID;
							$filer = get_field('file_qhcd',$postid);
							$filename = explode('.',$filer['filename']);
						?>
						<div class="news-item flex-item">
							<div class="news-left">
								<div class="news-date">
									<p><span class="date-day"><?php echo get_the_date( 'd' ); ?></span class="date-month"><sup> /<?php echo get_the_date( 'm' ); ?></sup></p>
									<p class="date-year font16 font300 text-center"><?php echo get_the_date( 'Y' ); ?></p>
								</div>
							</div>
							<div class="news-infor">
								<h3><a href="<?php echo $filer['url']; ?>" class="font16"><?php echo get_the_title($postid);?></a></h3>
								<p class="news-file font13"><?php echo get_field('file_type',$postid);?> | <?php echo get_field('file_size',$postid);?></p>
								<?php if($filer['url']) { ?><a href="<?php echo $filer['url']; ?>" class="download"><img src="<?php echo get_template_directory_uri(); ?>/images/download.png" alt="vndirect" /></a><?php } ?>
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
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
<script type="text/javascript">
	$('#toDate').datepicker({
		dateFormat: 'dd/mm/yy',
		onSelect: function(date) {
			$('#fromDate').datepicker({
				dateFormat: 'dd/mm/yy',
				minDate: date,
				onSelect: function(date) {
					$('#filterForm').submit();
				}
			});
		}
	});
</script>