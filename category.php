<?php 
	$term_current = get_queried_object();
	$tid = $term_current->term_id;
	get_header(); 
?>
<main id="content" class="stock-information bg-gray">
	<?php if($tid == 77){ ?>
	<?php if(!empty(get_field('banner_page',$term_current))) { ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$term_current);?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/school/icon-hoithao.png" alt="" />
			<h1 class="font800 text-uppercase">Hội thảo và đào tạo</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/school/banner-hoithao.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/school/icon-hoithao.png" alt="" />
			<h1 class="font800 text-uppercase">Hội thảo và đào tạo</h1>
		</div>
	</div>
	<?php } ?>
	<?php } else { ?>
		<?php if(!empty(get_field('banner_page',$term_current))) { ?>
		<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$term_current);?>');">
			<div class="banner-inner text-center transform-center">
				<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-ttnc.png" alt="" />
				<h1 class="font800 text-uppercase"><?php echo $term_current->name; ?></h1>
			</div>
		</div>
		<?php } else{ ?>
		<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-ttnc.jpg');">
			<div class="banner-inner text-center transform-center">
				<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-ttnc.png" alt="" />
				<h1 class="font800 text-uppercase">Trung tâm nghiên cứu</h1>
			</div>
		</div>
	<?php } ?>
	<?php } ?>
	<div class="content-daily-news content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline">
					<?php if($tid == 77){?>
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">Hội thảo đào tạo</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_school')); ?>
						</div>
					</div>
					<?php }else{ ?>
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">TT nghiên cứu</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_research')); ?>
						</div>
					</div>
					<?php } ?>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<div class="section-content section-right item-inline">
					<h3 class="section-title font600 font40"><?php echo $term_current->name; ?></h3>
					<?php if($tid == 1){?>
					<ul class="top-control flex-item">
						<li>
							<a href="<?php echo get_category_link(1); ?>" class="active ipo font18"><span>Thông tin đấu giá/ IPO</span></a>
						</li>
						<li>
							<a href="<?php echo get_permalink(54); ?>" class="calendar font18"><span>Lịch và sự kiện</span></a>
						</li>
					</ul>
					<?php } ?>
					<div class="form-default form-daily form-calendar">
						<form action="" id="filterForm" method="POST">
							<div class="row">
								<div class="form-group col-md-4">
									<h4 class="font20 font600">Tìm theo ngày</h4>
								</div>
								<div class="form-group form-date col-md-4">
									<label for="toDate" class="label">Từ ngày</label>
									<input type="text" class="form-control form-date" id="toDate" name="tu_ngay" value="<?php echo $_POST['tu_ngay']; ?>" autocomplete="off" placeholder="DD/MM/YY">
								</div>
								<div class="form-group form-date col-md-4">
									<label for="fromDate" class="label">Đến ngày</label>
									<input type="text" class="form-control" id="fromDate" name="den_ngay" value="<?php echo $_POST['den_ngay']; ?>" autocomplete="off" placeholder="DD/MM/YY">
								</div>
							</div>
							<div class="text-right button-form">
								<a href="" class="btn btn-gray">xóa</a>
							</div>
						</form>
					</div>
					<?php
						function mcs_query_datphong_date( $where = '', $wp_query ) {
								$beginDate = '2015-11-01';
								$endDate = '2217-11-06';
								if(isset($_POST['tu_ngay']) !='') {
									$beginDate = change_date($_POST['tu_ngay']);
								}
								if(isset($_POST['den_ngay']) !='') {
									$endDate = change_date($_POST['den_ngay']);
								}
								$where .= " AND post_date >= '".$beginDate."' AND post_date <= '".$endDate."'";
								
								return $where;
						}
						add_filter( 'posts_where', 'mcs_query_datphong_date', 10, 2 );
						$args = array(
							'posts_per_page' => 8,
							'paged'	=> max($page,$paged),
							'cat'	=> $term_current->term_id
						);
						$the_query = new WP_Query( $args );
						if($the_query->have_posts()){ 
					?>
					<div class="news-list">
						<?php
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
								<p class="news-view"><a class="font300"><?php echo $term_current->name; ?></a> <span class="fontita">
								<?php if($view_numbers){?>
									<i class="fa fa-eye"></i><?php echo $view_numbers;?></span>
								<?php } ?>
								</p>
								<div class="news-des font16">
									<?php echo wp_trim_words(get_the_excerpt($post->ID), 40); ?> 
								</div>
								<?php 
									$filere = get_field('file_report',$post->ID);
									if($filere){
								?>
								<a href="<?php echo $filere; ?>" target="_blank" class="download"><img src="<?php echo get_template_directory_uri(); ?>/images/download.png" alt="download" /></a>
								<?php } ?>
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
					<?php } else echo '<div class="text-center nodata"><b>Xin lỗi</b><br /> Không có dữ liệu phù hợp với tìm kiếm.</div>'; ?>
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