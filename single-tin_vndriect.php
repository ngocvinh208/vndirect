<?php 
	$postid = get_the_ID();
	get_header(); 
	the_post();
	$viewupdate = 1;
	$view_numbers = get_field('view_numbers',$postid);
	if($view_numbers) $viewupdate = $view_numbers + 1;
	update_field('field_5caff60c1b084',$viewupdate,$postid);
?>
<style type="text/css">
	.sidebar-item ul > li#menu-item-498 > a{
		color: #f7941e !Important;
	}
</style>
<main id="content" class="bg-gray">
	<div class="content-single content-general">
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
				<div class="section-content section-right item-inline">
					<h1 class="section-title font700 font35"><?php the_title(); ?></h1>
					<div class="single-date flex-item">
						<p class="news-view"><a href="<?php echo get_permalink(80);?>" class="font300">Bản tin hằng ngày</a> <span class="fontita font16"><i class="fa fa-calendar"></i><?php echo get_the_date('d/m/Y');  ?> &nbsp; /&nbsp;&nbsp;<i class="fa fa-eye"></i><?php echo $viewupdate;?></span></p>
						<p class="news-share"><span class="font300">Chia sẻ</span>
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank"><i class="fa fa-paper-plane"></i></a>
						<a href="http://twitter.com/home?status=<?php the_title();?>+<?php the_permalink();?>"><i class="fa fa-twitter"></i></a>
						<a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink();?>&title=<?php the_title();?>"><i class="fa fa-linkedin"></i></a>
						</p>
					</div>
					<section class="single-content content-text">
						<?php the_content(); ?>
					</section>
					<section class="post-control">
						<div class="post-control-item previous_post">
							<span><i class="fa fa-angle-left"></i><b>Bài trước: </b></span>
							<?php previous_post_link( '<div class="nav-previous">%link</div>', '%title' ); ?>
						</div>
						<div class="post-control-item next_post">
							<span><i class="fa fa-angle-left"></i><b>Bài tiếp: </b></span>
							<?php next_post_link( '<div class="nav-next">%link</div>', '%title' ); ?>
						</div>
					</section>
					<section class="related-posts">
						<h3 class="section-title font30 font600">Có thể bạn quan tâm</h3>
						<div class="news-list">
						<?php
							$args = array(
								'post_type' => 'tin_vndriect',
								'posts_per_page' => 3,
								'post__not_in'	=> array($postid)
							);
							 $the_query = new WP_Query( $args );
							while ($the_query->have_posts() ) : $the_query->the_post();
							$did = $post->ID;
							$view_numbers = get_field('view_numbers',$did);
						?>
						<div class="news-item flex-item">
							<div class="news-left">
								<div class="news-date">
									<p><span class="date-day"><?php echo get_the_date( 'd' ); ?></span class="date-month"><sup>/<?php echo get_the_date( 'm' ); ?></sup></p>
									<p class="date-year font16 font300 text-center">năm <?php echo get_the_date( 'Y' ); ?></p>
								</div>
							</div>
							<div class="news-infor">
								<h3><a href="<?php echo get_the_permalink($did); ?>" class="font24 font700"><?php echo get_the_title($did);?></a></h3>
								<p class="news-view"><a href="<?php echo get_permalink(80);?>" class="font300">Tin VNDIRECT</a> <span class="fontita"><i class="fa fa-eye"></i><?php echo $view_numbers;?></span></p>
								<div class="news-des font16">
									<?php echo wp_trim_words(get_the_excerpt($post->ID), 40); ?> 
								</div>
								<a href="" class="download"><img src="<?php echo get_template_directory_uri(); ?>/images/download.png" alt="" /></a>
							</div>
						</div>
						<?php
							endwhile;
							wp_reset_query();
						?>
					</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer();?>