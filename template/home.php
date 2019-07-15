<?php 
	/* Template Name: Home */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content">
	<?php 
		$slider_list = get_field('slider_list',$pageid);
		if($slider_list){
	?>
	<section id="sliders">
		<ul class="slider-home slider-list">
			<?php foreach($slider_list as $sl){?>
			<li>
				<div class="item-slider">
					<img src="<?php echo $sl['sl_image'];?>" alt="vndirect">
					<div class="inner">
						<a class="click-slider font18" href="<?php echo $sl['sl_download']; ?>">Cài đặt ngay</a>
					</div>
					<a class="link" href="<?php echo $sl['sl_link'];?>"></a>
				</div>
			</li>
			<?php }?>
		</ul>
	</section>
	<?php } ?>
	<?php 
		$control_list = get_field('control_list',$pageid);
		if($control_list){
	?>
	<section id="control-page">
		<ul class="list-control list-inline">
			<?php foreach($control_list as $i=>$cl){?>
			<li class="item-inline">
				<div class="infor animated fade-in animated-delay<?php echo $i; ?>">
					<a href="<?php echo $cl['link_co']; ?>" class="img-box">
						<img src="<?php echo $cl['icon_co']; ?>" alt="" class="show"/>
						<img src="<?php echo $cl['icon_hover_co']; ?>" alt="" class="hide"/>
					</a>
					<h4 class="font23 font700"><?php echo $cl['title_co']; ?></h4>
					<p><?php echo $cl['des_co']; ?></p>
					<a href="<?php echo $cl['link_co']; ?>" class="viewmore">Xem thêm</a>
				</div>
			</li>
			<?php }?>
		</ul>
	</section>
	<?php } ?>
	<!-- End control-page -->
	<section id="are-customer" class="banner-general" style="background-image: url(<?php echo get_field('banner_hcustomer',$pageid);?>);">
		<div class="main-are-customer list-inline">
			<div class="are-left item-inline">
				<div class="inner animated fade-left">
					<?php 
						if(!empty(get_field('title_hcustomer',$pageid))){
					?>
					<h2><?php echo get_field('title_hcustomer',$pageid);?></h2>
					<?php } ?>
					<?php 
						if(!empty(get_field('des_hcustomer',$pageid))){
					?>
					<p><?php echo get_field('des_hcustomer',$pageid);?></p>
					<?php } ?>
				</div>
			</div>
			<?php 
				$services_hlist = get_field('services_hlist',$pageid);
				if($services_hlist){
			?>
			<div class="are-right item-inline">
				<ul class="list-inline">
					<?php foreach($services_hlist as $j=>$sh){?>
					<li class="item-inline animated fade-in animated-delay<?php echo $j+1; ?>">
						<a href="<?php echo $sh['link_hse']; ?>">
							<div class="infor">
								<div class="img-box"><img src="<?php echo $sh['icon_hse'];?>" alt="" /></div>
								<h6><?php echo $sh['title_hse'];?></h6>
							</div>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
	</section>
	<!-- End are-customer -->
	<section id="stock-index">
		<div class="container">
			<div class="content-stock">
				<div class="row">
					<div class="stock-item stock-first col-md-3 animated fade-in animated-delay1">
						<h4 class="font700">Chỉ số chứng khoán</h4>
						<p class="font300">cập nhật liên tục theo giờ ( 17:00  | 19/01/2019 )</p>
					</div>
					<div class="stock-item col-md-3 text-center text-vn animated fade-in animated-delay2">
						<h4 class="font700">VN-INDEX: <span class="tgreen"> 902.30 0.41(0.05%) </span> <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-green.png" alt="" /></h4>
					</div>
					<div class="stock-item col-md-3 text-center text-hnx animated fade-in animated-delay3">
						<h4 class="font700">HNX: <span class="tred"> 101.56 -0.37(-0.36%)</span> <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-down-red.png" alt="" /></h4>
					</div>
					<div class="stock-item col-md-3 animated fade-in animated-delay4">
						<a href="" class="btn-orange">Giao dịch ngay</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End stock-index -->
</main>
<?php get_footer(); ?>
<script type="text/javascript">
	jQuery(function(){
		$('.slider-list').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 3000,
			arrows: true,
			dots: true,
		});
		
		var hei = $('.are-left').innerHeight();
		$('.are-right ul li').css('height',hei);
	});
</script>