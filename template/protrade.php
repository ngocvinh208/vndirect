<?php 
	/* Template Name: Protrade */
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
	<section class="banner-protrade banner-product bg-white">
		<div class="banner-inner text-center">
			<div class="menu-horizontal">
				<ul>
					<li class="active"><a href="<?php echo get_permalink(179); ?>">Pro-trade</a></li>
					<li><a href="<?php echo get_permalink(177); ?>">StockBook</a></li>
					<li><a href="<?php echo get_permalink(174); ?>">DolFin</a></li>
				</ul>
			</div>
			<div class="banner-protrade-inner">
				<div class="container">
					<div class="infor text-center">
						<?php if(!empty(get_field('title_sto',$pageid))){?>
						<h1 class="animated fadeInUp"><img src="<?php echo get_field('title_sto',$pageid); ?>" alt="protrade" /></h1>
						<?php } ?>
						<?php if(!empty(get_field('title_small_sto',$pageid))){?>
						<h2 class="font40 font600 animated fadeInUp animated-delay2"><?php echo get_field('title_small_sto',$pageid); ?></h2>
						<?php } ?>
						<?php if(!empty(get_field('des_pro',$pageid))){?>
						<p class="animated fadeInUp animated-delay3"><?php echo get_field('des_pro',$pageid); ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pro-alltime bg-white">
		<?php if(!empty(get_field('img_pro1',$pageid))){?>
		<img src="<?php echo get_field('img_pro1',$pageid); ?>" alt="protrade" />
		<?php } ?>
		<div class="banner-protrade-inner">
			<div class="container">
				<div class="infor text-center">
					<?php if(!empty(get_field('title_sintro',$pageid))){?>
					<h2 class="font45 font600 animated fade-in"><?php echo get_field('title_sintro',$pageid); ?></h2>
					<?php } ?>
					<p class="animated fade-in"><?php echo get_field('des_pro2',$pageid); ?></p>
					<?php if(!empty(get_field('des_pro2',$pageid))){?>
					<?php } ?>
					<div class="downnow">
						<a href="<?php echo get_field('link_pro1',$pageid); ?>" class="btn-down openaccount animated fade-left">Truy cập ngay</a>
						<a href="<?php echo get_field('link_pro2',$pageid); ?>" class="btn-orange bg-orange openaccount animated fade-right"">Mở tài khoản</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="protrade-discover">
		<div class="container">
			<div class="banner-protrade-inner">
				<?php if(!empty(get_field('title_sto3',$pageid))){?>
				<h2 class="font45 font600 text-center animated fade-in"><?php echo get_field('title_sto3',$pageid); ?></h2>
				<?php } ?>
			</div>
			<?php 
				$function_sto3 = get_field('function_sto3',$pageid);
				if($function_sto3){
			?>
			<div class="row">
				<div class="col-md-7 offset-md-5">
					<div class="list-discover animated fade-right">
						<ul class="list-product list-general">
							<?php foreach($function_sto3 as $item){ ?>
							<li><?php echo $item['title_function_sto3']; ?></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php if(!empty(get_field('link_discover',$pageid))){?>
			<div class="img-discover animated fade-left"><img src="<?php echo get_field('link_discover',$pageid); ?>" alt="protrade" /></div>
			<?php } ?>
		</div>
	</section>
	<section class="section-communication banner-general" style="background-image: url('<?php echo get_field('banner_pro3',$pageid); ?>');">
		<div class="container">
			<div class="protrade-communication">
				<?php if(!empty(get_field('title_pro3',$pageid))){?>
				<h2 class="title48 font600 animated fade-in"><?php echo get_field('title_pro3',$pageid); ?></h2>
				<?php } ?>
				<?php if(!empty(get_field('des_pro3',$pageid))){?>
				<p class="font18 font300 animated fade-in"><?php echo get_field('des_pro3',$pageid); ?></p>
				<?php } ?>
				<?php 
					$function_pro3 = get_field('function_pro3',$pageid);
					if($function_pro3){
				?>
				<ul class="list-product list-general animated fade-in">
					<?php foreach($function_pro3 as $item){ ?>
					<li><?php echo $item['title_function_pro3']; ?></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
			<div class="downnow">
				<a href="<?php echo get_field('proapp_link',$pageid); ?>" class="btn-orange bg-orange openaccount animated fade-in">Tải ngay</a>
				<a href="<?php echo get_field('proacc_link',$pageid); ?>" class="btn-down openaccount animated fade-in animated-delay1">Mở tài khoản</a>
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