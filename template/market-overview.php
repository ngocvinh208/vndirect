<?php 
	/* Template Name: Market Overview */
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
	<div class="content-calendar-event content-general">
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
					<div class="top-title flex-item">
						<h3 class="section-title font600 font40">Tổng quan thị trường</h3>
						<a href="" class="feedback font600">Phản hồi về dữ liệu <i class="fa fa-comments"></i></a>
					</div>
					<div class="content-chart">
						<a href="" class="view-detail btn-orange font600">Xem biểu đồ chi tiết</a>
						<div class="inner-chart">
							<img src="<?php echo get_template_directory_uri(); ?>/images/chart.jpg" alt="" />
						</div>
					</div>
					<div class="most-active">
						<h3 class="title-part font600 font20">Most active</h3>
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item"><a class="nav-link show active" data-toggle="tab" role="tab" href="#most1">Active</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#most2">% Gainers </a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#most3">% Losers </a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#most4">% Gainers </a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#most5">% Losers </a></li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="most1" role="tabpanel">
								<div class="table-active table-general table-striped table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Công ty</th>
												<th scope="col">Cao nhất</th>
												<th scope="col">Thấp nhất</th>
												<th scope="col">Đóng cửa</th>
												<th scope="col">Thay đổi</th>
												<th scope="col">Khối lượng</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>FLC</td>
												<td class="tgreen">5.66</td>
												<td class="tred">5.43</td>
												<td class="tgreen">5.58</td>
												<td class="tgreen">0.12(+2.20%)</td>
												<td>14,988,570</td>
											</tr>
											<tr>
												<td>FLC</td>
												<td class="tgreen">5.66</td>
												<td class="tred">5.43</td>
												<td class="tgreen">5.58</td>
												<td class="tgreen">0.12(+2.20%)</td>
												<td>14,988,570</td>
											</tr>
											<tr>
												<td>FLC</td>
												<td class="tgreen">5.66</td>
												<td class="tred">5.43</td>
												<td class="tgreen">5.58</td>
												<td class="tgreen">0.12(+2.20%)</td>
												<td>14,988,570</td>
											</tr>
											<tr>
												<td>FLC</td>
												<td class="tgreen">5.66</td>
												<td class="tred">5.43</td>
												<td class="tgreen">5.58</td>
												<td class="tgreen">0.12(+2.20%)</td>
												<td>14,988,570</td>
											</tr>
											<tr>
												<td>FLC</td>
												<td class="tgreen">5.66</td>
												<td class="tred">5.43</td>
												<td class="tgreen">5.58</td>
												<td class="tgreen">0.12(+2.20%)</td>
												<td>14,988,570</td>
											</tr>
									  </tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="most2" role="tabpanel">
								Update...
							</div>
							<div class="tab-pane fade" id="most3" role="tabpanel">
								Update...
							</div>
							<div class="tab-pane fade" id="most4" role="tabpanel">
								Update...
							</div>
							<div class="tab-pane fade" id="most5" role="tabpanel">
								Update...
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>