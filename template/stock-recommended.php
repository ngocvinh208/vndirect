<?php 
	/* Template Name: Stocks Recommended */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<style type="text/css">
	.mega-menu-personal >  a.mega-menu-link {
		background-color: #f7941e !important;
		font-weight: 700 !important;
		position: relative;
	}
	.mega-menu-personal >  a.mega-menu-link:before{
		content: "";
		position: absolute !important;
		width: 0;
		height: 0;
		border-right: 15px solid transparent;
		border-left: 15px solid transparent;
		border-top: 15px solid #f7941e;
		bottom: -14px;
		z-index: 2;
		left: 50%;
		margin: 0 !important;
		transform: translateX(-50%);
		-ms-transform: translateX(-50%);
		-webkit-transform: translateX(-50%);
		-o-transform: translateX(-50%);
	}
</style>
<main id="content" class="stock-information bg-gray">
	<?php if(!empty(get_field('banner_page',$pageid))) { ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid);?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-khcn.png" alt="" />
			<h1 class="font800 text-uppercase">Khách hàng cá nhân</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-khcn.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-khcn.png" alt="" />
			<h1 class="font800 text-uppercase">Khách hàng cá nhân</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-calendar-event content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">Sản phẩm</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_product')); ?>
						</div>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<div class="section-content section-right item-inline">
					<h3 class="section-title font600 font40">Cổ phiếu khuyến nghị</h3>
					<div class="list-recommended row">
						<div class="recommended-item col-md-4">
							<div class="recommended-infor">
								<div class="recommended-icon text-center">
									<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/ebroker.png" alt="" />
								</div>
								<div class="recommended-interest text-center">
									<span>12 <sup>%</sup></span>
									<p class="font12">Lãi TB mỗi khuyến nghị</p>
								</div>
								<div class="recommended-des">
									<ul>
										<li><i class="fa fa-caret-right"></i>Ưa thích lướt sóng</li>
										<li><i class="fa fa-caret-right"></i>Môi giới trực tuyến khuyến nghị</li>
									</ul>
									<a href="" class="btn-orange view-detail">Xem ngay</a>
								</div>
							</div>
						</div>
						<div class="recommended-item col-md-4">
							<div class="recommended-infor">
								<div class="recommended-icon text-center">
									<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/vtrade.png" alt="" />
								</div>
								<div class="recommended-interest text-center">
									<span>14 <sup>%</sup></span>
									<p class="font12">Lãi TB mỗi khuyến nghị</p>
								</div>
								<div class="recommended-des">
									<ul>
										<li><i class="fa fa-caret-right"></i>Giao dịch vừa phải</li>
										<li><i class="fa fa-caret-right"></i>Hệ thống giao dịch khuyến nghị</li>
									</ul>
									<a href="" class="btn-orange view-detail">Xem ngay</a>
								</div>
							</div>
						</div>
						<div class="recommended-item col-md-4">
							<div class="recommended-infor">
								<div class="recommended-icon text-center">
									<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/blight.png" alt="" />
								</div>
								<div class="recommended-interest text-center">
									<span>27 <sup>%</sup></span>
									<p class="font12">Lãi TB mỗi khuyến nghị</p>
								</div>
								<div class="recommended-des">
									<ul>
										<li><i class="fa fa-caret-right"></i>Giao dịch ít</li>
										<li><i class="fa fa-caret-right"></i>Môi giới trực tuyến khuyến nghị</li>
									</ul>
									<a href="" class="btn-orange view-detail">Xem ngay</a>
								</div>
							</div>
						</div>
					</div>
					<div class="main-recommended">
						<div class="recommended-intro">
							<h3 class="font30 font600">E-broker <b>là gì?</b></h3>
							<div class="recommended-short font16">
								E-broker là các khuyến nghị do Môi giới trực tuyến tuyển chọn cổ phiếu và đưa ra khuyến nghị dựa trên nhận định thị trường và phong cách đầu tư của Môi giới trực tuyến.
							</div>
							<div class="recommended-detail">
								<div class="row">
									<div class="col-md-8">
										<div class="recommended-chart">
											<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/khuyennghi1.png" alt="" />
										</div>
									</div>
									<div class="col-md-4">
										<div class="recommended-list">
											<div class="re-item flex-item">
												<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/icon1.png" alt="" />
												<div class="infor">
													<h6 class="font700">Số lượng khuyến nghị</h6>
													<p>Tối đa 5 cổ phiếu/phiên giao dịch</p>
												</div>
											</div>
											<div class="re-item flex-item">
												<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/icon2.png" alt="" />
												<div class="infor">
													<h6 class="font700">Cơ sở khuyến nghị</h6>
													<p>Dựa trên các quy tắc ra tín hiệu của hệ thống giao dịch, hoàn toàn loại trừ yếu tố cảm tính.</p>
												</div>
											</div>
											<div class="re-item flex-item">
												<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/icon3.png" alt="" />
												<div class="infor">
													<h6 class="font700">Hiệu quả khuyến nghị</h6>
													<p>Lợi nhuận hàng năm lên tới</p>
													<ul>
														<li><b>0,76%</b> (V-trade)</li>
														<li><b>10,08%</b> (B-light))</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="recommended-intro">
							<h3 class="font30 font600">B-light, V-trade <b>là gì?</b></h3>
							<div class="recommended-short font16">
								B-light và V-trade do hệ thống giao dịch rà soát toàn bộ các cổ phiếu và đưa ra khuyến nghị, dựa trên các phân tích kỹ thuật đã được công nhận tính đúng đắn cao.
							</div>
							<div class="recommended-detail">
								<div class="row">
									<div class="col-md-8">
										<div class="recommended-chart">
											<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/khuyennghi2.png" alt="" />
										</div>
									</div>
									<div class="col-md-4">
										<div class="recommended-list">
											<div class="re-item flex-item">
												<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/icon1.png" alt="" />
												<div class="infor">
													<h6 class="font700">Số lượng khuyến nghị</h6>
													<p>Tối đa 5 cổ phiếu/phiên giao dịch</p>
												</div>
											</div>
											<div class="re-item flex-item">
												<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/icon2.png" alt="" />
												<div class="infor">
													<h6 class="font700">Cơ sở khuyến nghị</h6>
													<p>Dựa trên các quy tắc ra tín hiệu của hệ thống giao dịch, hoàn toàn loại trừ yếu tố cảm tính.</p>
												</div>
											</div>
											<div class="re-item flex-item">
												<img src="<?php echo get_template_directory_uri(); ?>/images/cophieu/icon3.png" alt="" />
												<div class="infor">
													<h6 class="font700">Hiệu quả khuyến nghị</h6>
													<p>Lợi nhuận hàng năm lên tới</p>
													<ul>
														<li><b>0,76%</b> (V-trade)</li>
														<li><b>10,08%</b> (B-light))</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>