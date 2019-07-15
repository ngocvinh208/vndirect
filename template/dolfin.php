<?php 
	/* Template Name: DolFin */
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
</style>
<main id="content" class="bg-gray">
	<div class="banner-dolfin banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid); ?>');">
		<div class="banner-inner text-center">
			<div class="menu-horizontal">
				<ul>
					<li><a href="<?php echo get_permalink(179); ?>">Pro-trade</a></li>
					<li><a href="<?php echo get_permalink(177); ?>">StockBook</a></li>
					<li class="active"><a href="<?php echo get_permalink(174); ?>">DolFin</a></li>
				</ul>
			</div>
			<section class="banner-dolfin-inner">
				<div class="container">
					<div class="row">
						<div class="col-md-5 dolfin-left">
							<div class="infor text-center">
								<?php if(!empty(get_field('title_do',$pageid))){?>
								<h1 class="animated zoomIn"><img src="<?php echo get_field('title_do',$pageid); ?>" alt="dolfin" /></h1>
								<?php } ?>
								<?php if(!empty(get_field('title_small',$pageid))){?>
								<h2 class="font48 animated fadeInUp"><?php echo get_field('title_small',$pageid); ?></h2>
								<?php } ?>
								<?php if(!empty(get_field('des_do',$pageid))){?>
								<p class="des-general animated fadeInUp"><?php echo get_field('des_do',$pageid); ?></p>
								<?php } ?>
								<?php 
									$download_list = get_field('download_list',$pageid);
									if($download_list){
								?>
								<div class="vdownload animated fadeInUp">
									<?php foreach($download_list as $do){?>
									<a href="<?php echo $do['link_do']; ?>" style="background-image: url('<?php echo $do['icon_do']; ?>')">
										<h6 class="font18"><?php echo $do['title_do']; ?></h6>
										<p class="fon13"><?php echo $do['des_do']; ?></p>
									</a>
									<?php } ?>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php if(!empty(get_field('img_dolfin',$pageid))){?>
						<div class="col-md-7 dolfin-macbook  animated fadeInRight">
							<img src="<?php echo get_field('img_dolfin',$pageid) ?>" alt="vndirect" />
						</div>
						<?php } ?>
					</div>
				</div>
			</section>
		</div>
	</div>
	<section class="dolfin-application banner-dolfin-inner">
		<div class="container">
			<?php if(!empty(get_field('img_dolfin2',$pageid))){?>
			<div class="img-application">
				<img src="<?php echo get_field('img_dolfin2',$pageid) ?>" alt="vndirect" />
			</div>
			<?php } ?>
			<div class="row">
				<div class="col-md-7 offset-md-5">
					<div class="infor">
						<?php if(!empty(get_field('title_do2',$pageid))){?>
						<h2 class="title48 font600 animated fade-in"><?php echo get_field('title_do2',$pageid) ?></h2>
						<?php } ?>
						<?php if(!empty(get_field('des_do2',$pageid))){?>
						<p class="font18 font300  animated fade-in"><?php echo get_field('des_do2',$pageid) ?></p>
						<?php } ?>
						<?php 
							$function_list = get_field('function_list',$pageid);
							if($function_list){
						?>
						<ul class="list-application list-product list-general">
							<?php foreach($function_list as $fu){?>
							<li class="animated fade-in"><?php echo $fu['function_do']; ?></li>
							<?php } ?>
						</ul>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="dolfin-tool">
		<?php if(!empty(get_field('title_tool',$pageid))){?>
		<h3 class="text-center section-title font35 font600  animated fade-in"><?php echo get_field('title_tool',$pageid) ?></h3>
		<?php } ?>
		<?php 
			$tool_list = get_field('tool_list',$pageid);
			if($tool_list){
		?>
		<div class="list-tool section-box row">
			<?php foreach($tool_list as $i=>$tool){?>
			<div class="box-item col-md-4">
				<div class="infor box-gray text-center animated fade-in animated-delay<?php echo $i; ?>">
					<div class="img-box"><img src="<?php echo $tool['icon_to']; ?>" alt="vndirect" /></div>
					<h4 class="font25 font600"><?php echo $tool['title_to']; ?></h4>
					<p class="font16"><?php echo $tool['des_to']; ?></p>
					<!-- <a href=""></a> -->
				</div>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		<div class="text-center"><a href="" class="btn-orange bg-orange openaccount animated fade-in">Mở tài khoản</a></div>
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