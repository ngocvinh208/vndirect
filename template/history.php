<?php 
	/* Template Name: History */
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
	<div class="content-history content-general">
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
					<h3 class="section-title font600 font40">Lịch sử cổ tức</h3>
					<section class="form-default form-calen-share form-share">
						<form action="" id="formHistory">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-12 font600 font16 title-date">Ngày chốt</div>
										<div class="form-group form-date col-md-6">
											<label for="toDate" class="label">Từ ngày</label>
											<input type="text" class="form-control form-date" id="toDateClose" name="tu_ngay_chot" value="<?php echo $_GET['tu_ngay_chot']; ?>" autocomplete="off" placeholder="DD/MM/YY">
										</div>
										<div class="form-group form-date col-md-6">
											<label for="toDate" class="label">Đến ngày</label>
											<input type="text" class="form-control form-date" id="fromDateClose" name="den_ngay_chot" value="<?php echo $_GET['den_ngay_chot']; ?>" autocomplete="off" placeholder="DD/MM/YY">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-12 font600 font16 title-date">Ngày thực hiện</div>
										<div class="form-group form-date col-md-6">
											<label for="toDate" class="label">Từ ngày</label>
											<input type="text" class="form-control form-date" id="toDatePer" name="tu_ngay_gd" value="<?php echo $_GET['tu_ngay_gd']; ?>" autocomplete="off" placeholder="DD/MM/YY">
										</div>
										<div class="form-group form-date col-md-6">
											<label for="toDate" class="label">Đến ngày</label>
											<input type="text" class="form-control form-date" id="fromDatePer" name="den_ngay_gd" value="<?php echo $_GET['den_ngay_gd']; ?>" autocomplete="off" placeholder="DD/MM/YY">
										</div>
									</div>
								</div>
								<div class="col-12 action-form flex-item">
									<div class="button-form">
										<button type="submit" class="btn btn-orange">Tìm kiếm</button>
										<a href="" class="btn btn-gray">xóa</a>
									</div>
								</div>
							</div>
						</form>
					</section>
					<section class="structure-main">
						<div class="structure-item">
							<div class="table-history table-structure table-general table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col" style="width: 16.9%;">Đợt trả cổ tức</th>
											<th scope="col" style="width: 10.6%;">Tỷ lệ</th>
											<th scope="col" style="width: 15.3%;">Ngày chốt</th>
											<th scope="col" style="width: 20.1%;">Ngày thực hiện</th>
											<th scope="col" style="width: 31.1%;">Chi tiết</th>
										</tr>
									</thead>
									<tbody>
										<tr class="title-cate">
											<td colspan="6" class="font20 font600 downyears" attr-id="#history1"><i class="fa fa-caret-right"></i>Năm 2018</td>
										</tr>
										<tr class="toggle-history" id="history1">
								    		<td colspan="6" style="padding: 0;">
								      			<div class="table-review">
													<table class="table">
													  	<tbody>
															<tr class="struc-item">
																<td>27/08/2018</td>
																<td>50%</td>
																<td>27/08/2018</td>
																<td>27/08/2018</td>
																<td>Số lượng 2435676CP</td>
															</tr>
															<tr class="struc-item">
																<td>27/08/2018</td>
																<td>50%</td>
																<td>27/08/2018</td>
																<td>27/08/2018</td>
																<td>Số lượng 2435676CP</td>
															</tr>
													  	</tbody>
													</table>
												</div> 
								      		</td>
								    	</tr>
										<tr class="title-cate">
											<td colspan="6" class="font20 font600 downyears" attr-id="#history2"><i class="fa fa-caret-right"></i>Năm 2017</td>
										</tr>
										<tr class="toggle-history" id="history2">
								    		<td colspan="6" style="padding: 0;">
								      			<div class="table-review">
													<table class="table">
													  	<tbody>
															<tr class="struc-item">
																<td>27/08/2018</td>
																<td>50%</td>
																<td>27/08/2018</td>
																<td>27/08/2018</td>
																<td>Số lượng 2435676CP</td>
															</tr>
															<tr class="struc-item">
																<td>27/08/2018</td>
																<td>50%</td>
																<td>27/08/2018</td>
																<td>27/08/2018</td>
																<td>Số lượng 2435676CP</td>
															</tr>
													  	</tbody>
													</table>
												</div> 
								      		</td>
								    	</tr>
										<tr class="title-cate">
											<td colspan="6" class="font20 font600 downyears" attr-id="#history3"><i class="fa fa-caret-right"></i>Năm 2016</td>
										</tr>
										<tr class="toggle-history" id="history3">
								    		<td colspan="6" style="padding: 0;">
								      			<div class="table-review">
													<table class="table">
													  	<tbody>
															<tr class="struc-item">
																<td>27/08/2018</td>
																<td>50%</td>
																<td>27/08/2018</td>
																<td>27/08/2018</td>
																<td>Số lượng 2435676CP</td>
															</tr>
															<tr class="struc-item">
																<td>27/08/2018</td>
																<td>50%</td>
																<td>27/08/2018</td>
																<td>27/08/2018</td>
																<td>Số lượng 2435676CP</td>
															</tr>
													  	</tbody>
													</table>
												</div> 
								      		</td>
								    	</tr>
										<tr class="title-cate">
											<td colspan="6" class="font20 font600 downyears" attr-id="#history4"><i class="fa fa-caret-right"></i>Năm 2015</td>
										</tr>
										<tr class="toggle-history" id="history4">
								    		<td colspan="6" style="padding: 0;">
								      			<div class="table-review">
													<table class="table">
													  	<tbody>
															<tr class="struc-item">
																<td>27/08/2018</td>
																<td>50%</td>
																<td>27/08/2018</td>
																<td>27/08/2018</td>
																<td>Số lượng 2435676CP</td>
															</tr>
															<tr class="struc-item">
																<td>27/08/2018</td>
																<td>50%</td>
																<td>27/08/2018</td>
																<td>27/08/2018</td>
																<td>Số lượng 2435676CP</td>
															</tr>
													  	</tbody>
													</table>
												</div> 
								      		</td>
								    	</tr>
								  </tbody>
								</table>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
<script type="text/javascript">
	jQuery(function(){
		$('.downyears').on('click',function(){
			var href = $(this).attr('attr-id');
			$(this).toggleClass('active');
			$(href).slideToggle();
			return false;
		});
		$('#toDateClose').datepicker({
			dateFormat: 'dd/mm/yy',
		});
		$('#fromDateClose').datepicker({
			dateFormat: 'dd/mm/yy',
		});
		$('#toDatePer').datepicker({
			dateFormat: 'dd/mm/yy',
		});
		$('#fromDatePer').datepicker({
			dateFormat: 'dd/mm/yy',
		});
	});
</script>