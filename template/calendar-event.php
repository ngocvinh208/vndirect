<?php 
	/* Template Name: Calendar of event */
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
	.menu-relation > a.mega-menu-link:before{
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
<main id="content" class="calendar-event bg-gray">
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
	<div class="content-calendar-event content-general">
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
					<h3 class="section-title font600 font40">Lịch sự kiện</h3>
					<div class="form-default form-daily form-calendar">
						<form action="" method="POST">
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
					<div class="table-calendar table-general table-striped table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col" style="width: 10%;">Ngày</th>
									<th scope="col" style="width: 45%;">Tên sự kiện</th>
									<th scope="col" style="width: 45%;">Chi tiết</th>
								</tr>
							</thead>
							<tbody>	
								<?php
									$args = array(
										'post_type'	=> 'su_kien',
										'posts_per_page'	=> 10,
										'paged'	=> max($page,$paged),
										'meta_query' => array()
									);
									if(isset($_POST['tu_ngay']) && $_POST['tu_ngay'] != '') {
										$args['meta_query'][] = array(
											'key'	=> 'event_date',
											'value'	=> change_date($_POST['tu_ngay']),
											'compare'	=> '>=',
											'type'	=> 'DATE'
										);
									}
									if(isset($_POST['den_ngay']) && $_POST['den_ngay'] != '') {
										$args['meta_query'][] = array(
											'key'	=> 'event_date',
											'value'	=> change_date($_POST['den_ngay']),
											'compare'	=> '<=',
											'type'	=> 'DATE'
										);
									}
									$the_query = new WP_Query( $args );
									while ($the_query->have_posts() ) : $the_query->the_post();
								?>
								<tr>
									<td><?php echo get_field('event_date',$post->ID); ?></td>
									<td><?php the_title(); ?></td>
									<td><?php echo get_field('event_detail',$post->ID); ?></td>
								</tr>
								<?php
									endwhile;
									wp_reset_query();
								?>
						  </tbody>
						</table>
					</div>
					<div class="text-right">
						<?php
							$big = 999999999;
							$mcs_paginate_links = paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $the_query->max_num_pages,
								'prev_text'    => __('<i class="fa fa-angle-left"></i>','yup'),
								'next_text'    => __('<i class="fa fa-angle-right"></i>','yup') 
							  ) );
							 if($mcs_paginate_links) : 
						 ?>
						  <div class="control-post">
							  <?php echo $mcs_paginate_links ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
<script type="text/javascript">
	$('#toDate').datepicker({
		dateFormat: 'dd/mm/yy',
		changeMonth: true,
		changeYear: true
	});
	$('#fromDate').datepicker({
		dateFormat: 'dd/mm/yy',
		changeMonth: true,
		changeYear: true
	});
	jQuery(function(){
		$('.change-date').on('change',function(){
			$('form').trigger('submit');
		});
	});
</script>