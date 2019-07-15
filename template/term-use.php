<?php 
	/* Template Name: Term use */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content" class="bg-gray">
	<div class="content-banner-termuse content-banner banner-general" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
		<div class="banner-inner text-center transform-center">
			<h1 class="font800 text-uppercase"><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="content-termuse content-hastitle">
		<div class="container">
			<div class="list-termuse row">
				<?php 
					$list_termuse = get_field('list_termuse',$pageid);
					if($list_termuse){
						foreach($list_termuse as $item){
				?>
				<div class="col-md-4">
					<div class="term-item">
						<div class="img-box text-center"><img src="<?php echo $item['icon_use'];?>" alt="" /></div>
						<div class="term-des text-justify"><?php echo $item['content_use'];?></div>
					</div>
				</div>
				<?php }} ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>