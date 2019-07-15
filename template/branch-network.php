<?php 
	/* Template Name: Branch Network */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content" class="bg-gray">
	<?php if(!empty(get_field('banner_page',$pageid))) { ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid);?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-center.png" alt="" />
			<h1 class="font800 text-uppercase">Trung tâm hỗ trợ</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-ttht.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-center.png" alt="" />
			<h1 class="font800 text-uppercase">Trung tâm hỗ trợ</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-brach content-hastitle content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline the-section">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">Trung tâm hỗ trợ</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_center')); ?>
						</div>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<div class="section-content section-right item-inline the-section">
					<h3 class="section-title font600 font40"><?php the_title(); ?></h3>
					<div class="main-map box-white">
						<div id="multimap"></div>
						<div class="form-country">
							<form action="" method="POST">
								<div class="row">
									<div class="col-md-5">	
										<label for="" class="label">Tỉnh/Thành phố</label>
										<div class="form-select form-group">
											<select class="form-control select-province" name="tinh_thanh" id="fillProvince">
												<option value="">Tỉnh/Thành phố</option>
												<?php $terms = get_terms('mang_luoi_dia_diem',array('hide_empty' => false,'parent' => 0));
													if($terms ) {
													foreach ( $terms as $term ) { $termid = $term->term_id;
												?>
												<option value="<?php echo $termid; ?>" attr-id="<?php echo $term->term_id; ?>" add-lat="<?php echo get_field('add_latitude',$term) ?>" add-long="<?php echo get_field('add_longitude',$term) ?>" <?php if($_POST['tinh_thanh'] ==  $termid) echo 'selected'?>><?php echo $term->name; ?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-md-5">	
										<label for="" class="label">Quận/Huyện</label>
										<div class="form-select form-group">
											<select name="quan_huyen" class="form-control select-district" id="fillDistrict">
												<option value="">Quận / huyện</option>
												<?php
													$terms = get_terms('mang_luoi_dia_diem',array('hide_empty' => false,'parent' => 0));
													if($terms ) {
													foreach ( $terms as $term ) { 
													$termid = $term->term_id;
													$termchi = get_terms('mang_luoi_dia_diem', array('hide_empty' => false,'parent' => $termid ));
													if($termchi ) {
													foreach ( $termchi as $termc ) { $termcid = $termc->term_id;
												?>
												<option class="option-child" attr-parent="<?php echo $termid; ?>" value="<?php echo $termcid; ?>" add-lat="<?php echo get_field('add_latitude',$termc) ?>" add-long="<?php echo get_field('add_longitude',$termc); ?>" <?php if($_POST['quan_huyen'] ==  $termcid) echo 'selected'?>><?php echo $termc->name; ?></option>
												<?php }}}} ?>
											</select>
										</div>
									</div>
									<div class="col-md-2">
										<div class="button-form">
											<button class="btn btn-orange btn-search font600">Tìm kiếm</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="list-brach">
						<ul>
							<?php
								$args = array(
									'post_type' => 'mang_luoi_chi_nhanh',
									'posts_per_page' => -1,
									'tax_query' => array(),
								);
								if(isset($_POST['tu_khoa']) && $_POST['tu_khoa'] != '') {
									$keyw = strtolower($_POST['tu_khoa']);
									$keyw = str_replace(" ","-",$keyw);
									$args['tax_query'][] = array(
										'taxonomy'	=> 'mang_luoi_dia_diem',
										'field'	=> 'slug',
										'terms'	=> $keyw
									);
								}
								if(isset($_POST['tinh_thanh']) && $_POST['tinh_thanh'] != '') {
									$args['tax_query'][] = array(
										'taxonomy'	=> 'mang_luoi_dia_diem',
										'field'	=> 'id',
										'terms'	=> $_POST['tinh_thanh']
									);
								}
								if(isset($_POST['quan_huyen']) && $_POST['quan_huyen'] != '') {
									$args['tax_query'][] = array(
										'taxonomy'	=> 'mang_luoi_dia_diem',
										'field'	=> 'id',
										'terms'	=> $_POST['quan_huyen']
									);
								}
								$the_query = new WP_Query( $args );
								while ($the_query->have_posts() ) : $the_query->the_post();
								$postid = $post->ID;
							?>
							<li class="flex-item">
								<div class="viewmap card-right" data-latitude="<?php echo get_field('branch_lat',$postid)?>" data-longitude="<?php echo get_field('branch_long',$postid)?>">
									<h6 class="font20 font600"><a href=""><?php echo get_the_title($postid); ?></a></h6>
									<?php if(!empty(get_field('add_br',$postid))){ ?>
									<p><?php echo get_field('add_br',$postid);?></p>
									<?php } ?>
									<a href="" class="viewmap-icon" ><img src="<?php echo get_template_directory_uri(); ?>/images/marker.png" alt="" /></a>
								</div>
								<div class="card-left text-right">
									<a href="" class="viewmap viewmap-text font300 font13" data-latitude="<?php echo get_field('branch_lat',$postid)?>" data-longitude="<?php echo get_field('branch_long',$postid)?>">Xem bản đồ</a>
									<p>
										<?php if(!empty(get_field('tel_br',$postid))){ ?>
										<span>Tell : <?php echo get_field('tel_br',$postid)?> </span>
										<?php } ?>
										<?php if(!empty(get_field('fax_br',$postid))){ ?>
										<span class="faxmap"> Fax : <?php echo get_field('fax_br',$postid)?> </span>
										<?php } ?>
									</p>
								</div>
							</li>
							<?php
								endwhile;
								wp_reset_query();
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
<?php 
	if($_POST){
?>
<script type="text/javascript">
	$(window).load(function(){
		$('html, body').animate({
			scrollTop: $( $('.form-country')).offset().top - $('#header').outerHeight()
		}, 400);
	});
</script>
<?php } ?>
<script type="text/javascript">
	var icon1 = "<?php the_field('icon_map','option'); ?>";
	var icon2 = "<?php the_field('icon_map','option'); ?>";
	var allMarkers = [];
	var center_lat = <?php the_field('address_lat_center','option'); ?>;
	var center_long = <?php the_field('address_long_center','option'); ?>;
	var map;
	var marker;
	var lati = ' ';
	var longti = ' ';
	var indextam = 99;
	jQuery(function(){
		mapmulti();
		$('.viewmap').each(function(index){
			$(this).click(function(){
				console.log(indextam);
				if(indextam != 99) {
					allMarkers[indextam].setIcon(icon1);
				}
				indextam = index;
				allMarkers[index].setIcon(icon2);
				var latitude = $(this).attr('data-latitude'),
					longitude = $(this).attr('data-longitude');
				moveToLocation(latitude,longitude );
				$('html, body').animate({
					scrollTop: $( $('#multimap')).offset().top - $('#header').outerHeight()
				}, 400);
				return false;
			});
		});
		
		$('.select-province').on('change',function(){
			var finpro = $('.select-province option:selected').attr('attr-id');
			console.log(finpro);
			$('.select-district option').each(function(){
				$('.select-district').prop('selectedIndex',0);
				var findi = $(this).attr('attr-parent');
				if(findi == finpro) $(this).addClass('active');
				else $(this).removeClass('active');
			});
		});
		
		var finpro = $('.select-province option:selected').attr('attr-id');
		$('.select-district option').each(function(){
			var findi = $(this).attr('attr-parent');
			if(findi == finpro) $(this).addClass('active');
			else $(this).removeClass('active');
		});
	});
	
	function mapmulti(){
		var map_options = {
			center: new google.maps.LatLng(center_lat, center_long),
			zoom: 16,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			streetViewControl: false,
			mapTypeControl: false
		}
		map = new google.maps.Map(document.getElementById('multimap'), map_options);	
		geocoder = new google.maps.Geocoder();
		$('.viewmap').each(function(){
			var thi = $(this);
			var title = $(this).attr('attr-title');
			var latitude = $(this).attr('data-latitude'),
				longitude = $(this).attr('data-longitude');
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(latitude, longitude),
				map: map,
				icon: icon1,
				title: title,
			});
			allMarkers.push(marker);
		});
	}
	function moveToLocation(lat, lng){
		var center = new google.maps.LatLng(lat, lng);
		map.panTo(center);
	}
	function map_search(){
		var addlat = $('.select-province option:selected').attr('add-lat');
		var addlong = $('.select-province option:selected').attr('add-long');
		var addlat2 = $('.select-district option:selected').attr('add-lat');
		var addlong2 = $('.select-district option:selected').attr('add-long');
		var pacheck = $('.select-province option:selected').val();
		var chicheck = $('.select-district option:selected').val();
		if(chicheck && chicheck != ' '){
			lati = addlat2; 
			longti = addlong2;
		}else{
			lati = addlat; 
			longti = addlong;
		}
		var center = new google.maps.LatLng(lati, longti);
		map.setCenter(center);
	}
</script>