<?php 
	/* Template Name: Financial Report */
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
<main id="content" class="financial-report bg-gray">
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-qhcd.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-qhcd.png" alt="" />
			<h1 class="font800 text-uppercase">Quan hệ cổ đông</h1>
		</div>
	</div>
	<div class="content-financial content-general">
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
					<h3 class="section-title font600 font40">Báo cáo tài chính</h3>
					<div class="most-active">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item"><a class="nav-link show active" data-toggle="tab" role="tab" href="#tab1">Bảng cân đối kế toán</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#tab2">Báo cáo KQKD</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#tab3">Báo cáo lưu chuyển tiền tệ</a></li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="tab1" role="tabpanel">
								<div class="form-report form-default form-calendar">
									<form action="">
										<div class="row">
											<div class="form-period col-md-4">
												<div class="row">
													<div class="col-12"><label for="toDate" class="label">Kỳ báo cáo</label></div>
													<div class="form-select form-group col-md-5">
														<select class="form-control" name="quy_bao_cao" id="periodReport" autocomplete="off">
															<option value="Lĩnh vực">Chọn quý</option>
															<option value="">Quý 4</option>
															<option value="">Quý 3</option>
															<option value="">Quý 2</option>
															<option value="">Quý 1</option>
														</select>
													</div>
													<div class="form-group form-date col-md-5">
														<select class="form-control" name="nam_bao_cao" id="yearsReport" autocomplete="off">
															<option value="Lĩnh vực">Chọn năm</option>
															<option value="">2018</option>
															<option value="">2017</option>
															<option value="">2016</option>
															<option value="">2015</option>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group form-select col-md-3">
												<label class="label">Số kì hiển thị</label>
												<select class="form-control" name="so_ki_hien_thi" id="periodDisplays" autocomplete="off">
													<option value="">5</option>
													<option value="">4</option>
													<option value="">3</option>
													<option value="">2</option>
												</select>
											</div>
											<div class="form-group form-select col-md-3">
												<label class="label">Đơn vị</label>
												<select class="form-control" name="don_vi" id="unit" autocomplete="off">
													<option value="Đơn vị">Đơn vị</option>
													<option value="">1.000.000 vnd</option>
													<option value="">1.000 vnd</option>
												</select>
											</div>
											<div class="form-group col-md-2">
												<button class="btn btn-orange">Tìm kiếm</button>
											</div>
										</div>
									</form>
								</div>
								<div class="table-financial table-general table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th scope="col" style="width: 40%;"></th>
												<th scope="col" style="width: 12;">Q4/2018</th>
												<th scope="col" style="width: 12%;">Q3/2018</th>
												<th scope="col" style="width: 12%;">Q2/2018</th>
												<th scope="col" style="width: 12%;">Q1/2018</th>
												<th scope="col" style="width: 12%;">Q4/2017</th>
											</tr>
										</thead>
										<tbody>
											<tr class="level1">
												<td class="level level-parent font16"><b><i class="fa fa-caret-down"></i>Tổng tài sản</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,816,044</b></td>
											</tr>
											<tr class="level2">
												<td class="level"><span></span><b><i class="fa fa-caret-down"></i>Tài sản ngắn hạn</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,816,044</b></td>
											</tr>
											<tr class="level3">
												<td class="level"><span></span><i class="fa fa-caret-down"></i>Tài sản chính ngắn hạn</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,816,044</td>
											</tr>
											<tr class="level4">
												<td class="level"><span></span><i class="fa fa-caret-right"></i>Tiền và các khoản tương đương tiền</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,816,044</td>
											</tr>
											<tr class="level2">
												<td class="level"><span></span><b><i class="fa fa-caret-down"></i>Tài sản dài hạn</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,816,044</b></td>
											</tr>
											<tr class="level3">
												<td class="level"><span></span><i class="fa fa-caret-down"></i>Tài sản chính ngắn hạn</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,816,044</td>
											</tr>
											<tr class="level4">
												<td class="level"><span></span><i class="fa fa-caret-right"></i>Tiền và các khoản tương đương tiền</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,816,044</td>
											</tr>
											<tr class="level1">
												<td class="level level-parent font16"><b><i class="fa fa-caret-down"></i>Tổng cộng nguồn vốn</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,816,044</b></td>
											</tr>
											<tr class="level2">
												<td class="level"><span></span><b><i class="fa fa-caret-down"></i>Tài sản ngắn hạn</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,816,044</b></td>
											</tr>
											<tr class="level3">
												<td class="level"><span></span><i class="fa fa-caret-down"></i>Tài sản chính ngắn hạn</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,816,044</td>
											</tr>
											<tr class="level4">
												<td class="level"><span></span><i class="fa fa-caret-right"></i>Tiền và các khoản tương đương tiền</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,816,044</td>
											</tr>
											<tr class="level2">
												<td class="level"><span></span><b><i class="fa fa-caret-down"></i>Tài sản dài hạn</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,544,092</b></td>
												<td><b>10,816,044</b></td>
												<td><b>10,816,044</b></td>
											</tr>
											<tr class="level3">
												<td class="level"><span></span><i class="fa fa-caret-down"></i>Tài sản chính ngắn hạn</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,816,044</td>
											</tr>
											<tr class="level4">
												<td class="level"><span></span><i class="fa fa-caret-right"></i>Tiền và các khoản tương đương tiền</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,544,092</td>
												<td>10,816,044</td>
												<td>10,816,044</td>
											</tr>
									  </tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="tab2" role="tabpanel">
								Update...
							</div>
							<div class="tab-pane fade" id="tab3" role="tabpanel">
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
<script type="text/javascript">
	$('#toDate').datepicker({
		dateFormat: 'dd/mm/yy',
		minDate: 0,
		onSelect: function(date) {
			$('#fromDate').datepicker('destroy');
			$('#fromDate').datepicker({
				dateFormat: 'dd/mm/yy',
				minDate: date,
			});
		 },
		 onClose: function(dateText,datePickerInstance) {
			$("#fromDate").focus();
		}
	});
</script>