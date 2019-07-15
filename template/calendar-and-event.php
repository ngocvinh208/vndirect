<?php 
	/* Template Name: Calendar and Event */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content" class="stock-information bg-gray">
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-ttnc.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-ttnc.png" alt="" />
			<h1 class="font800 text-uppercase">Trung tâm nghiên cứu</h1>
		</div>
	</div>
	<div class="content-daily-news content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">TT nghiên cứu</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_research')); ?>
						</div>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<div class="section-content section-right item-inline">
					<h3 class="section-title font600 font40">Tin tức</h3>
					<ul class="top-control flex-item">
						<li>
							<a href="<?php echo get_category_link(1); ?>" class="ipo font18"><span>Thông tin đấu giá/ IPO</span></a>
						</li>
						<li>
							<a href="<?php echo get_permalink(54); ?>" class="active calendar font18"><span>Lịch và sự kiện</span></a>
						</li>
					</ul>
					<div class="form-default form-calen-share form-share">
						<form action="" method="POST" id="formCalendarE">
							<div class="row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control text-uppercase" id="codeStocks" value="<?php echo $_POST['event_code']; ?>" name="event_code" autocomplete="off" placeholder="Mã chứng khoán">
								</div>
								<div class="form-select form-group col-md-6">
									<select class="form-control" name="event_type" id="fieldStock" autocomplete="off">
										<option value="Tất cả">Tất cả</option>
										<?php $terms = get_terms('loai_su_kien');
											if($terms ) {
											foreach ( $terms as $term ) {
										?>
										<option value="<?php echo $term->term_id; ?>" <?php if(isset($_POST['event_type']) && $_POST['event_type'] == $term->term_id) echo 'selected'; ?>><?php echo $term->name; ?></option>
										<?php } } ?>
									</select>
								</div>
								<div class="form-collapse col-12">
									<div class="row">
										<div class="col-md-6">
											<div class="row">
												<div class="col-12 font600 font16 title-date">Ngày GDKHQ</div>
												<div class="form-group form-date col-md-6">
													<label for="toDate" class="label">Từ ngày</label>
													<input type="text" class="form-control form-date" id="toDateGD" name="tu_ngay_gd" value="<?php echo $_POST['tu_ngay_gd']; ?>" autocomplete="off" placeholder="DD/MM/YY">
												</div>
												<div class="form-group form-date col-md-6">
													<label for="toDate" class="label">Đến ngày</label>
													<input type="text" class="form-control form-date" id="fromDateGD" name="den_ngay_gd" value="<?php echo $_POST['den_ngay_gd']; ?>" autocomplete="off" placeholder="DD/MM/YY">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="row">
												<div class="col-12 font600 font16 title-date">Ngày thực hiện</div>
												<div class="form-group form-date col-md-6">
													<label for="toDate" class="label">Từ ngày</label>
													<input type="text" class="form-control form-date" id="toDatePer" name="tu_ngay_thuc_hien" value="<?php echo $_POST['tu_ngay_thuc_hien']; ?>" autocomplete="off" placeholder="DD/MM/YY">
												</div>
												<div class="form-group form-date col-md-6">
													<label for="toDate" class="label">Đến ngày</label>
													<input type="text" class="form-control form-date" id="fromDatePer" name="den_ngay_thuc_hien" value="<?php echo $_POST['den_ngay_thuc_hien']; ?>" autocomplete="off" placeholder="DD/MM/YY">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 action-form flex-item">
									<div class="button-form">
										<button class="btn btn-orange">Tìm kiếm</button>
										<a href="" class="btn btn-gray">xóa</a>
									</div>
									<a href="" class="hcollapse font600"><span>Thu gọn</span> <i class="fa fa-angle-up"></i></a>
								</div>
							</div>
						</form>
					</div>
					<?php
						$args = array(
							'post_type'	=> 'lich_su_kien',
							'posts_per_page'	=> 10,
							'paged'	=> max($page,$paged),
							'meta_query' => array(),
							'tax_query' => array()
						);
						if(isset($_POST['event_code']) && $_POST['event_code'] != '') {
							$args['tax_query'][] = array(
								'taxonomy'	=> 'ma_ck',
								'field'		=> 'slug',
								'terms'		=> $_POST['event_code']
							);
						}	
						if(isset($_POST['event_type']) && $_POST['event_type'] != '') {
							$args['tax_query'][] = array(
								'taxonomy'	=> 'loai_su_kien',
								'field'		=> 'id',
								'terms'		=> $_POST['event_type']
							);
						}
						if(isset($_POST['tu_ngay_gd']) && $_POST['tu_ngay_gd'] != '') {
							$args['meta_query'][] = array(
								'key'	=> 'ngay_gdkhq',
								'value'	=> change_date($_POST['tu_ngay_gd']),
								'compare'	=> '>=',
								'type'	=> 'DATE'
							);
						}
						if(isset($_POST['den_ngay_gd']) && $_POST['den_ngay_gd'] != '') {
							$args['meta_query'][] = array(
								'key'	=> 'ngay_gdkhq',
								'value'	=> change_date($_POST['den_ngay_gd']),
								'compare'	=> '<=',
								'type'	=> 'DATE'
							);
						}
						if(isset($_POST['tu_ngay_thuc_hien']) && $_POST['tu_ngay_thuc_hien'] != '') {
							$args['meta_query'][] = array(
								'key'	=> 'cevent_ngthuchien',
								'value'	=> change_date($_POST['tu_ngay_thuc_hien']),
								'compare'	=> '>=',
								'type'	=> 'DATE'
							);
						}
						if(isset($_POST['den_ngay_thuc_hien']) && $_POST['den_ngay_thuc_hien'] != '') {
							$args['meta_query'][] = array(
								'key'	=> 'cevent_ngthuchien',
								'value'	=> change_date($_POST['den_ngay_thuc_hien']),
								'compare'	=> '<=',
								'type'	=> 'DATE'
							);
						}
						$the_query = new WP_Query( $args );
						if($the_query->have_posts()) {
					?>
					<div class="table-calendar table-general table-striped table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col" style="width: 9.5%;">Mã CK</th>
									<th scope="col" style="width: 22.2%;">Loại sự kiện</th>
									<th scope="col" style="width: 14.8%;">Ngày GDKHQ</th>
									<th scope="col" style="width: 13.7%;">Ngày chốt</th>
									<th scope="col" style="width: 16.9%;">Ngày thực hiện</th>
									<th scope="col" style="width: 22.9%;">Chi tiết</th>
								</tr>
							</thead>
							<tbody>
								<?php
									while ($the_query->have_posts() ) : $the_query->the_post();
									$mack_terms = wp_get_post_terms($post->ID,'ma_ck');
								?>
								<tr>
									<td><?php if($mack_terms) echo $mack_terms[0]->name; ?></td>
									<td><?php the_title(); ?></td>
									<td><?php echo get_field('ngay_gdkhq',$post->ID); ?></td>
									<td><?php echo get_field('cevent_ngchot',$post->ID); ?></td>
									<td><?php echo get_field('cevent_ngthuchien',$post->ID); ?></td>
									<td><?php echo get_field('cevent_chitiet',$post->ID); ?></td>
								</tr>
								<?php
									endwhile;
									wp_reset_query();
								?>
						  </tbody>
						</table>
					</div>
					<?php } else echo '<div class="text-center nodata"><b>Xin lỗi!</b> <br /> Không có dữ liệu phù hợp với tìm kiếm</div>'; ?>
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
	$('#toDateGD').datepicker({
		dateFormat: 'dd/mm/yy',
	});
	$('#fromDateGD').datepicker({
		dateFormat: 'dd/mm/yy',
	});
	$('#toDatePer').datepicker({
		dateFormat: 'dd/mm/yy',
	});
	$('#fromDatePer').datepicker({
		dateFormat: 'dd/mm/yy',
	});
</script>