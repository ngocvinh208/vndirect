<?php 
	/* Template Name: Announced risk */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content" class="bg-gray">
	<div class="content-banner-risk content-banner banner-general" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
		<div class="banner-inner text-center transform-center">
			<h1 class="font800 text-uppercase bg-orange"><?php the_title(); ?></h1>
			<h2 class="font800 text-uppercase title-bottom"><?php echo get_field('title_small',$pageid);?></h2>
			<p class="font16"><?php echo get_field('short_des_risk',$pageid);?></p>
		</div>
	</div>
	<div class="content-risk content-hastitle">
		<section class="risk-guide risk-general">
			<div class="container">
				<div class="top-section text-center">
					<h2 class="title-risk font800 font50 text-orange text-uppercase"><?php echo get_field('title_big1',$pageid);?></h2>
					<h3 class="text-uppercase font800 title-bottom"><?php echo get_field('title_small1',$pageid);?></h3>
				</div>
				<div class="list-guide row">
					<?php 
						$list_guide = get_field('list_guide',$pageid);
						if($list_guide){
							foreach($list_guide as $item){
					?>
					<div class="col-md-4">
						<div class="guide-item text-center">
							<div class="img-box text-center"><img src="<?php echo $item['icon_guide'];?>" alt="" /></div>
							<p class="guide-des des-general"><?php echo $item['des_guide'];?></p>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>
		</section>
		<section class="risk-recommendation risk-general bg-white">
			<div class="container">
				<div class="top-section text-center">
					<h2 class="title-risk font800 font50 text-orange text-uppercase"><?php echo get_field('title_big2',$pageid);?></h2>
					<h3 class="text-uppercase font800 title-bottom"><?php echo get_field('title_small2',$pageid);?></h3>
					<p class="font20 font600"><?php echo get_field('short_des2',$pageid);?></p>
				</div>
				<div class="row align-center">
					<div class="col-md-5 col-12">
						<div class="img-risk"><img src="<?php echo get_field('img_recommendation',$pageid); ?>" alt="" /></div>
					</div>
					<div class="col-md-7 col-12">
						<ul class="list-rrecommendation list-general">
							<?php 
								$list_recommendation = get_field('list_recommendation',$pageid);
								if($list_recommendation){
									foreach($list_recommendation as $item){
							?>
							<li class="font18"><?php echo $item['des_recommendation']?></li>
							<?php }} ?>
						</ul>
						<p class="note text-orange font18"><?php echo get_field('note_recommendation',$pageid); ?></p>
					</div>
				</div>
			</div>
		</section>
		<section class="risk-responsibility  risk-general bg-gray">
			<div class="container">
				<div class="top-section text-center">
					<h2 class="title-risk font800 font50 text-orange text-uppercase"><?php echo get_field('title_big3',$pageid);?></h2>
					<h3 class="text-uppercase font800 title-bottom"><?php echo get_field('title_small3',$pageid);?></h3>
				</div>
				<div class="list-responsibility row">
					<?php 
						$list_responsibility = get_field('list_responsibility',$pageid);
						if($list_responsibility){
							foreach($list_responsibility as $item){
					?>
					<div class="col-md-4">
						<div class="respon-item text-center box-white">
							<div class="img-box text-center"><img src="<?php echo $item['icon_responsibility'];?>" alt="" /></div>
							<h4 class="font25 font700"><?php echo $item['title_responsibility'];?></h4>
							<p class="respon-des text-justify des-general"><?php echo $item['des_responsibility'];?></p>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>
		</section>
		<section class="risk-commitment risk-general bg-white">
			<div class="container">
				<div class="row align-center">
					<div class="col-md-6 col-12 infor-commitment">
						<h2 class="title-risk font800 font50 text-orange text-uppercase"><?php echo get_field('title_big4',$pageid); ?></h2>
						<div class="des-commitment des-general"><?php echo get_field('short_des_commitment',$pageid); ?></div>
					</div>
					<div class="col-md-6 col-12">
						<div class="img-risk"><img src="<?php echo get_field('img_commitment',$pageid); ?>" alt="" /></div>
					</div>
				</div>
			</div>
		</section>
	</div>
</main>
<?php get_footer(); ?>