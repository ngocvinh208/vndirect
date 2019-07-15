<?php 
	/* Template Name: Stock information */
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
					<h3 class="section-title font600 font40">Thông tin cổ phiếu</h3>
					<div class="form-default form-share">
						<form action="">
							<div class="row">
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="codeStocks" name="code_stock" autocomplete="off" placeholder="Mã chứng khoán">
								</div>
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="nameStock" name="name_stock" autocomplete="off" placeholder="Tên công ty">
								</div>
								<div class="form-collapse col-12">
									<div class="row">
										<div class="form-select form-group col-md-6">
											<select class="form-control" name="field_stock" id="fieldStock" autocomplete="off">
												<option value="Lĩnh vực">Lĩnh vực</option>
												<option value="">Thực phẩm & đồ uống</option>
												<option value="">Thực phẩm & đồ uống</option>
											</select>
										</div>
										<div class="form-select form-group col-md-6">
											<select class="form-control" name="exchanges_stock" id="exchangesStock" autocomplete="off">
												<option value="Sàn giao dịch chứng khoán">Sàn giao dịch chứng khoán</option>
												<option value="">HOSTC</option>
												<option value="">HOSTC</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-12 action-form flex-item">
									<div class="button-form">
										<button class="btn btn-orange">Tìm kiếm</button>
										<a href="" class="btn btn-gray">xóa</a>
									</div>
									<a href="" class="hcollapse font600"> <span>Thu gọn</span> <i class="fa fa-angle-up"></i></a>
								</div>
							</div>
						</form>
					</div>
					<div class="table-calendar table-general table-striped table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col" style="width: 10.5%;">Mã CK</th>
									<th scope="col" style="width: 15.5%;">Tên công ty</th>
									<th scope="col" style="width: 32%;">Tên đầy đủ của công ty</th>
									<th scope="col" style="width: 24.5%;">Lĩnh vực</th>
									<th scope="col" style="width: 17.5%;">Sàn GDCK</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a href="">CDM</a></td>
									<td>MEKONGFISH</td>
									<td>Công ty cổ phần thủy sản Mekong</td>
									<td>Thực phẩm & đồ uống</td>
									<td>HOSTC</td>
								</tr>
								<tr>
									<td><a href="">CDM</a></td>
									<td>MEKONGFISH</td>
									<td>Công ty cổ phần thủy sản Mekong</td>
									<td>Thực phẩm & đồ uống</td>
									<td>HOSTC</td>
								</tr>
								<tr>
									<td><a href="">CDM</a></td>
									<td>MEKONGFISH</td>
									<td>Công ty cổ phần thủy sản Mekong</td>
									<td>Thực phẩm & đồ uống</td>
									<td>HOSTC</td>
								</tr>
								<tr>
									<td><a href="">CDM</a></td>
									<td>MEKONGFISH</td>
									<td>Công ty cổ phần thủy sản Mekong</td>
									<td>Thực phẩm & đồ uống</td>
									<td>HOSTC</td>
								</tr>
								<tr>
									<td><a href="">CDM</a></td>
									<td>MEKONGFISH</td>
									<td>Công ty cổ phần thủy sản Mekong</td>
									<td>Thực phẩm & đồ uống</td>
									<td>HOSTC</td>
								</tr>
								<tr>
									<td><a href="">CDM</a></td>
									<td>MEKONGFISH</td>
									<td>Công ty cổ phần thủy sản Mekong</td>
									<td>Thực phẩm & đồ uống</td>
									<td>HOSTC</td>
								</tr>
								<tr>
									<td><a href="">CDM</a></td>
									<td>MEKONGFISH</td>
									<td>Công ty cổ phần thủy sản Mekong</td>
									<td>Thực phẩm & đồ uống</td>
									<td>HOSTC</td>
								</tr>
								<tr>
									<td><a href="">CDM</a></td>
									<td>MEKONGFISH</td>
									<td>Công ty cổ phần thủy sản Mekong</td>
									<td>Thực phẩm & đồ uống</td>
									<td>HOSTC</td>
								</tr>
								<tr>
									<td><a href="">CDM</a></td>
									<td>MEKONGFISH</td>
									<td>Công ty cổ phần thủy sản Mekong</td>
									<td>Thực phẩm & đồ uống</td>
									<td>HOSTC</td>
								</tr>
						  </tbody>
						</table>
					</div>
					<div class="text-right">
						<nav class="control-post">
							<a class="next page-numbers" href=""><i class="fa fa-angle-left"></i></a>	
							<span aria-current='page' class='page-numbers current'>1</span>
							<a class='page-numbers' href=''>2</a>
							<a class="next page-numbers" href=""><i class="fa fa-angle-right"></i></a>				
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>