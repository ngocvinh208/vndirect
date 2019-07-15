<?php 
	/* Template Name: StockBook */
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
		z-index: 3;
		left: 50%;
		margin: 0 !important;
		transform: translateX(-50%);
		-ms-transform: translateX(-50%);
		-webkit-transform: translateX(-50%);
		-o-transform: translateX(-50%);
	}
	.menu-horizontal ul li a:after{
		background-size: 100% 100%;
	}
</style>
<main id="content" class="bg-gray">
	<div class="banner-stockbook banner-dolfin banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid); ?>');">
		<div class="banner-inner text-center">
			<div class="menu-horizontal">
				<ul>
					<li><a href="<?php echo get_permalink(179); ?>">Pro-trade</a></li>
					<li class="active"><a href="<?php echo get_permalink(177); ?>">StockBook</a></li>
					<li><a href="<?php echo get_permalink(174); ?>">DolFin</a></li>
				</ul>
			</div>
			<section class="banner-stockbook-inner">
				<div class="container">
					<div class="infor text-center">
						<?php if(!empty(get_field('title_sto',$pageid))){?>
						<h1 class="animated zoomIn"><img src="<?php echo get_field('title_sto',$pageid); ?>" alt="stockbook" /></h1>
						<?php } ?>
						<?php if(!empty(get_field('title_small_sto',$pageid))){?>
						<h2 class="font35 animated fadeInUp animated-delay3"><?php echo get_field('title_small_sto',$pageid); ?></h2>
						<?php } ?>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php 
		$download_list = get_field('download_list',$pageid);
		if($download_list){
	?>
	<section class="stock-stop">
		<div class="container">
			<div class="row">
				<?php foreach($download_list as $i=>$do){?>
				<div class="download-item col-md-4">
					<div class="infor text-center animated fade-in animated-delay<?php echo $i; ?>">
						<div class="img-box"><img src="<?php echo $do['image_do']; ?>" alt="stockbook" /></div>
						<p><img src="<?php echo $do['icon_do']; ?>" alt="stockbook" /></p>
						<p><?php echo $do['title_do']; ?></p>
						<a href="<?php echo $do['link_do']; ?>" class="text-blue"><?php echo $do['title_small_do']; ?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<?php } ?>
	<section class="stock-social banner-general" style="background-image: url('<?php echo get_field('banner_sintro',$pageid); ?>');">
		<div class="container">
			<?php if(!empty(get_field('title_sintro',$pageid))){?>
			<h2 class="font35 text-center animated fade-in"><?php echo get_field('title_sintro',$pageid); ?></h2>
			<?php } ?>
			<div class="row">
				<?php if(!empty(get_field('img_sto2',$pageid))){?>
				<div class="col-12 part-mo">
					<div class="social-center">
						<img src="<?php echo get_field('img_sto2',$pageid); ?>" alt="stockbook" />
					</div>
				</div>
				<?php } ?>
				<?php 
					$function_sto_left = get_field('function_sto_left',$pageid);
					if($function_sto_left){
				?>
				<div class="col-md-4 col-6">
					<?php foreach($function_sto_left as $funl){ ?>
					<div class="social-item text-center animated fade-left">
						<div class="img-social"><img src="<?php echo $funl['icon_fleft']; ?>" alt="stockbook" /></div>
						<p class="font18"><?php echo $funl['title_left']; ?></p>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if(!empty(get_field('img_sto2',$pageid))){?>
				<div class="col-md-4 part-pc">
					<div class="social-center">
						<img src=" <?php echo get_field('img_sto2',$pageid); ?>" alt="stockbook" />
					</div>
				</div>
				<?php } ?>
				<?php 
					$function_sto_right = get_field('function_sto_right',$pageid);
					if($function_sto_right){
				?>
				<div class="col-md-4 col-6">
					<?php foreach($function_sto_right as $funl){ ?>
					<div class="social-item text-center animated fade-right">
						<div class="img-social"><img src="<?php echo $funl['icon_right']; ?>" alt="stockbook" /></div>
						<p class="font18"><?php echo $funl['title_right']; ?></p>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<section class="section-experience banner-general" style="background-image: url('<?php echo get_field('banner_sto3',$pageid); ?>');">
		<div class="container">
			<div class="stock-exprience">
				<?php if(!empty(get_field('title_sto3',$pageid))){?>
				<h2 class="title48 font600 animated fade-in"><?php echo get_field('title_sto3',$pageid); ?></h2>
				<?php } ?>
				<?php 
					$function_sto3 = get_field('function_sto3',$pageid);
					if($function_sto3){
				?>
				<ul class="list-product list-general animated fade-in">
					<?php foreach($function_sto3 as $fu){?>
					<li><?php echo $fu['title_function_sto3']; ?></li>
					<?php } ?>
				</ul>
				<?php } ?>
				<div class="downnow">
					<a href="<?php echo get_field('link_download_now',$pageid);?>" class="btn-down openaccount animated fade-in">Tải ngay</a>
					<a href="<?php echo get_field('link_open_account',$pageid);?>" class="btn-orange bg-orange openaccount animated fade-in animated-delay1">Mở tài khoản</a>
				</div>
			</div>
		</div>
	</section>
	<section class="product-faq">
		<div class="container-inner">
			<div class="top-section text-center">
				<?php if(!empty(get_field('title_scontact',$pageid))){?>
				<h3 class="section-title font35 font600 animated fade-in"><?php echo get_field('title_scontact',$pageid)?></h3>
				<?php } ?>
				<?php if(!empty(get_field('des_scontact',$pageid))){?>
				<p class="font18 font300 animated fade-in"><?php echo get_field('des_scontact',$pageid)?></p>
				<?php } ?>
			</div>
			<?php 
				$contact_plist = get_field('contact_plist',$pageid);
				if($contact_plist){
			?>
			<div class="section-box row">
				<?php foreach($contact_plist as $sct){?>
				<div class="box-item col-md-6">
					<div class="infor box-white text-center animated fade-in">
						<div class="img-box img-facebook"><img src="<?php echo $sct['icon_sct']; ?>" alt="facebook" /></div>
						<h4 class="font25 font600"><?php echo $sct['title_sct']; ?></h4>
						<p class="font16 lineheight15"><?php echo $sct['des_sct']; ?></p>
						<a href="<?php echo $sct['link_sct']; ?>"></a>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>