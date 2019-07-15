<?php 
$term_current = get_queried_object();
get_header();
?>
<style type="text/css">
	.menu-relation >  a.mega-menu-link {
		background-color: #f7941e !important;
		font-weight: 700 !important;
		position: relative;
	}
	#menu-item-1221 a{
		color:#f7941e !important;
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
							<?php $terms = get_terms('danh_muc_bao_cao',array('hide_empty' => false));
								if($terms ) {
								foreach ( $terms as $term ) {
								$term_link = get_term_link( $term, 'danh_muc_bao_cao' );
							?>
							<li class="nav-item"><a href="<?php echo $term_link; ?>" class="nav-link show <?php if($term->term_id == $term_current->term_id) echo 'active'; ?>"><?php echo $term->name; ?></a></li>
							<?php  } } ?>

						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="tab1" role="tabpanel">
								<div class="form-report form-default form-calendar">
									<form action="" method="POST">
										<div class="row">
											<div class="form-period col-md-4">
												<div class="row">
													<div class="col-12"><label for="toDate" class="label">Kỳ báo cáo</label></div>
													<div class="form-select form-group col-md-5">
														<select class="form-control" name="quy_bao_cao" id="periodReport" autocomplete="off">
															<option value="Lĩnh vực">Cả năm</option>
															<option value="1" <?php if($_POST['quy_bao_cao'] == '1') echo 'selected'; ?>>Quý 1</option>
															<option value="2" <?php if($_POST['quy_bao_cao'] == '2') echo 'selected'; ?>>Quý 2</option>
															<option value="3" <?php if($_POST['quy_bao_cao'] == '3') echo 'selected'; ?>>Quý 3</option>
															<option value="4" <?php if($_POST['quy_bao_cao'] == '4') echo 'selected'; ?>>Quý 4</option>
														</select>
													</div>
													<div class="form-group form-date col-md-5">
														<select class="form-control" name="nam_bao_cao" id="yearsReport" autocomplete="off">
															<?php 
																$year = '';
																$terms = get_terms('bctc_nam');
																if($terms ) {
																foreach ( $terms as $i=>$term ) {
																if($i == 0) $year = $term->name;
															?>
															<option <?php if($term->slug == $_POST['nam_bao_cao']) echo 'selected'; ?> value="<?php echo $term->slug; ?>" <?php if($i == 0) echo 'selected'; ?>><?php echo $term->name; ?></option>
															<?php } } ?>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group form-select col-md-3">
												<label class="label">Số kì hiển thị</label>
												<select class="form-control" name="so_ki_hien_thi" id="periodDisplays" autocomplete="off">
													<option value="1" <?php if($_POST['so_ki_hien_thi'] == '1') echo 'selected'; ?>>1</option>
													<option value="2" <?php if($_POST['so_ki_hien_thi'] == '2') echo 'selected'; ?>>2</option>
													<option value="3" <?php if($_POST['so_ki_hien_thi'] == '3') echo 'selected'; ?>>3</option>
													<option value="4" <?php if($_POST['so_ki_hien_thi'] == '4') echo 'selected'; ?>>4</option>
													<option value="5"  <?php if($_POST['so_ki_hien_thi'] == '5' || !$_POST['so_ki_hien_thi']) echo 'selected'; ?>>5</option>
												</select>
											</div>
											<div class="form-group form-select col-md-3">
												<label class="label">Đơn vị</label>
												<select class="form-control" name="don_vi" id="unit" autocomplete="off">
													<option value="1" <?php if($_POST['don_vi'] == '1') echo 'selected'; ?>>1.000 vnd</option>
													<option value="2" <?php if($_POST['don_vi'] == '2' || !$_POST['don_vi']) echo 'selected'; ?>>1.000.000 vnd</option>
												</select>
											</div>
											<div class="form-group col-md-2">
												<button class="btn btn-orange">Tìm kiếm</button>
											</div>
										</div>
									</form>
								</div>
								<?php 
									if(isset($_POST['nam_bao_cao']) && $_POST['nam_bao_cao'] != '') $year = $_POST['nam_bao_cao']; 
									$ky = 5;
									if(isset($_POST['so_ki_hien_thi']) && $_POST['so_ki_hien_thi'] != '') $ky = $_POST['so_ki_hien_thi'];
									$uni = 2;
									if(isset($_POST['don_vi']) && $_POST['don_vi'] != '') $uni = $_POST['don_vi']; 
								?>
								<div class="table-financial table-general table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th scope="col" style="width: 40%;"></th>
												<th scope="col" style="width: 12;"><?php if($ky >0) { ?>Q4/<?php echo $year; } ?></th>
												<th scope="col" style="width: 12%;"><?php if($ky >1) { ?>Q3/<?php echo $year; } ?></th>
												<th scope="col" style="width: 12%;"><?php if($ky >2) { ?>Q2/<?php echo $year; } ?></th>
												<th scope="col" style="width: 12%;"><?php if($ky >3) { ?>Q1/<?php echo $year; } ?></th>
												<th scope="col" style="width: 12%;"><?php if($ky >4) { ?>Q4/<?php echo $year-1; } ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
												$args = array(
													'post_type'	=> 'bao_cao_tai_chinh',
													'posts_per_page' => 1,
													'tax_query'	=> array(
														array(
															'taxonomy'	=> 'bctc_nam',
															'field'		=> 'slug',
															'terms'	=> $year
														),
														array(
															'taxonomy'	=> 'danh_muc_bao_cao',
															'field'		=> 'id',
															'terms'	=> $term_current->term_id
														),
													)
												);
												$pp = get_posts($args);
												if($pp) {
													$bc_list = get_field('bc_list',$pp[0]->ID);
												}
												$args2 = array(
													'post_type'	=> 'bao_cao_tai_chinh',
													'posts_per_page' => 1,
													'tax_query'	=> array(
														array(
															'taxonomy'	=> 'bctc_nam',
															'field'		=> 'slug',
															'terms'	=> $year-1
														),
														array(
															'taxonomy'	=> 'danh_muc_bao_cao',
															'field'		=> 'id',
															'terms'	=> $term_current->term_id
														),
													)
												);
												$pp2 = get_posts($args2);
												if($pp2) {
													$bc_list2 = get_field('bc_list',$pp2[0]->ID);
												}
												if($bc_list) {
												foreach($bc_list as $j=>$bc) {
												$posi = $bc['vị_tri'];
											?>
											<tr class="level<?php echo $posi; ?>">
												<td class="level level-parent font16">
													<?php if($posi == 1 || $posi == 2) { ?>
													<b><i class="fa fa-caret-down"></i><?php echo $bc['name']; ?></b>
													<?php } else if($posi == 5) { ?>
													<i class="fa fa-caret-right"></i><?php echo $bc['name']; ?>
													<?php } else { ?>
													<i class="fa fa-caret-down"></i><?php echo $bc['name']; ?>
													<?php } ?>
												</td>
												<?php if($uni == 1) { ?>
												<td><?php if($ky >0) { if($posi == 1 || $posi == 2) echo '<b>'.number_format($bc['quy_1'],0,",",".").'</b>'; else echo number_format($bc['quy_1'],0,",","."); } ?></td>
												<td><?php if($ky >1) { if($posi == 1 || $posi == 2) echo '<b>'.number_format($bc['quy_2'],0,",",".").'</b>'; else echo number_format($bc['quy_2'],0,",","."); } ?></td>
												<td><?php if($ky >2) { if($posi == 1 || $posi == 2) echo '<b>'.number_format($bc['quy_3'],0,",",".").'</b>'; else echo number_format($bc['quy_3'],0,",","."); } ?></td>
												<td><?php if($ky >3) { if($posi == 1 || $posi == 2) echo '<b>'.number_format($bc['quy_4'],0,",",".").'</b>'; else echo number_format($bc['quy_4'],0,",","."); } ?></td>
												<td><?php if($ky >4) { if($bc_list2) { if($posi == 1 || $posi == 2) echo '<b>'.number_format($bc_list2[$j]['quy_1'],0,",",".").'</b>'; else echo number_format($bc_list2[$j]['quy_1'],0,",","."); } } ?></td>
												<?php } else { 
												?>
												<td><?php if($ky >0) { if($posi == 1 || $posi == 2) echo '<b>'. number_format(round($bc['quy_1']*0.001),0,",",".") .'</b>'; else echo number_format(round($bc['quy_1']*0.001),0,",","."); } ?></td>
												<td><?php if($ky >1) { if($posi == 1 || $posi == 2) echo '<b>'.number_format(round($bc['quy_2']*0.001),0,",",".").'</b>'; else echo number_format(round($bc['quy_2']*0.001),0,",","."); } ?></td>
												<td><?php if($ky >2) { if($posi == 1 || $posi == 2) echo '<b>'.number_format(round($bc['quy_3']*0.001),0,",",".").'</b>'; else echo number_format(round($bc['quy_3']*0.001),0,",","."); } ?></td>
												<td><?php if($ky >3) { if($posi == 1 || $posi == 2) echo '<b>'.number_format(round($bc['quy_4']*0.001),0,",",".").'</b>'; else echo number_format(round($bc['quy_4']*0.001),0,",","."); } ?></td>
												<td><?php if($ky >4) { if($bc_list2) { if($posi == 1 || $posi == 2) echo '<b>'.number_format(round($bc_list2[$j]['quy_1']*0.001),0,",",".").'</b>'; else echo number_format(round($bc_list2[$j]['quy_1']*0.001),0,",","."); } } ?></td>
												<?php } ?>
											</tr>
											<?php } } ?>
									  </tbody>
									</table>
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