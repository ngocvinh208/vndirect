<?php 
	$postid = get_the_ID(); 
	get_header(); 
	the_post();
?>
<style type="text/css">
	#menu-item-497 a{
		color: #f7941e !Important;
	}
</style>
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
	<div class="content-video content-general">
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
					<h3 class="section-title font600 font30"><?php the_title(); ?></h3>
					<section class="video-main box-white">
						<div class="video-main-list slider-video slider-list">
							<div class="video-main-item">
								<div class="video-main-play">
									<!-- <div class="video-wrapper">
										<?php $videoID = get_field('link_video',$vid); ?>
										<iframe class="youtubePlayer" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videoID; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									</div> -->
									<div class="video-section">
										<?php 
											$video_url = get_field('link_video',$postid); 
											$video_src = 'https://www.youtube.com/embed/'.$video_url;
											$videoID = get_youtube_id_from_url($video_src);
											$img_url = 'https://img.youtube.com/vi/'.$videoID.'/maxresdefault.jpg';
										?>
										<div class="video-run" id="<?php echo $postid; ?>" ></div>
										<img class="video-same-image" src="<?php echo $img_url ?>" alt="" />
										<div class="video-play" attr-id="<?php echo $postid; ?>" attr-data="<?php echo $video_url; ?>"></div>
									</div>
								</div >
								<div class="infor-video text-center">
									<h3 class="font800 font34"><?php echo get_the_title($postid); ?></h3>
									<?php if(!empty(get_field('des_video',$postid))){?>
									<div class="des font16"><?php echo get_field('des_video',$postid); ?></div>
									<?php } ?>
									<?php if(!empty(get_field('time_video',$postid))){?>
									<p class="time text-opa">Thời lượng <?php echo get_field('time_video',$postid); ?></p>
									<?php } ?>
								</div>
							</div>
							<?php
								$args = array(
									'post_type'	=> 'video_huong_dan',
									'posts_per_page' => 5,
									'post__not_in' => array($postid),
									's' => $_POST['tu_khoa'],
								);
								 $the_query = new WP_Query( $args );
								 while ($the_query->have_posts() ) : $the_query->the_post();
								 $vid = $post->ID;
							?>
							<div class="video-main-item">
								<div class="video-main-play">
									<!-- <div class="video-wrapper">
										<?php $videoID = get_field('link_video',$vid); ?>
										<iframe class="youtubePlayer" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videoID; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									</div> -->
									<div class="video-section">
										<?php 
											$video_url = get_field('link_video',$vid); 
											$video_src = 'https://www.youtube.com/embed/'.$video_url;
											$videoID = get_youtube_id_from_url($video_src);
											$img_url = 'https://img.youtube.com/vi/'.$videoID.'/maxresdefault.jpg';
										?>
										<div class="video-run" id="<?php echo $vid; ?>" ></div>
										<img class="video-same-image" src="<?php echo $img_url ?>" alt="" />
										<div class="video-play" attr-id="<?php echo $vid; ?>" attr-data="<?php echo $video_url; ?>"></div>
									</div>
								</div >
								<div class="infor-video text-center">
									<h3 class="font800 font34"><?php echo get_the_title($vid); ?></h3>
									<?php if(!empty(get_field('des_video',$vid))){?>
									<div class="des font16"><?php echo get_field('des_video',$vid); ?></div>
									<?php } ?>
									<?php if(!empty(get_field('time_video',$vid))){?>
									<p class="time text-opa">Thời lượng <?php echo get_field('time_video',$vid); ?></p>
									<?php } ?>
								</div>
							</div>
							<?php
								endwhile;
								wp_reset_query();
							?>	
						</div>
					</section>
					<section class="video-others">
						<h3 class="font20">Tìm kiếm <span class="font600">Video khác</span></h3>
						<div class="form-search-video form-custom">
							<form action="" method="POST">
								<input type="text" class="form-control" value="<?php echo $_POST['tu_khoa'];?>" name="tu_khoa" placeholder="Nhập từ khóa" />
								<button class="btn btn-orange"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="videos-list news-list">
							<?php
								$args = array(
									'post_type'	=> 'video_huong_dan',
									'posts_per_page' => 5,
									'post__not_in' => array($postid),
									's' => $_POST['tu_khoa'],
								);
								 $the_query = new WP_Query( $args );
								 while ($the_query->have_posts() ) : $the_query->the_post();
								 $vid = $post->ID;
							?>
							<div class="news-item flex-item">
								<div class="news-left">
									<?php 
										$video_url = get_field('link_video',$vid); 
										$video_src = 'https://www.youtube.com/embed/'.$video_url;
										$videoID = get_youtube_id_from_url($video_src);
										$img_url = 'https://img.youtube.com/vi/'.$videoID.'/maxresdefault.jpg';
									?>
									<a href="<?php echo get_permalink($vid); ?>" class="video-same"><img src="<?php echo $img_url; ?>" alt="" /></a>
								</div>
								<div class="news-infor">
									<h3><a href="<?php echo get_permalink($vid); ?>" class="font19 font600"><?php echo get_the_title($vid); ?></a></h3>
									<?php if(!empty(get_field('time_video',$vid))){?>
									<p class="time text-opa">Thời lượng <?php echo get_field('time_video',$vid); ?></p>
									<?php } ?>
								</div>
							</div>
							<?php
								endwhile;
								wp_reset_query();
							?>	
						</div>
						<div class="json-loading"><div class="lds-css ng-scope"><div style="width:100%;height:100%" class="lds-ripple"><div></div><div></div></div></div></div>	
						<a href="" class="loadmore btn-orange font16">Tải thêm</a>
					</section>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
<script type="text/javascript">
	jQuery(function(){
		var playertr;
		var check = false;
		
		var sliderhm = $('.slider-list').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			dots: false,
			adaptiveHeight: true
		});
		sliderhm.on('beforeChange', function(event, slick, currentSlide, nextSlide){
			 if(check == true) playertr.stopVideo();
		});
		sliderhm.on('afterChange', function(event, slick, currentSlide, nextSlide){
			 if(check == true) playertr.stopVideo();
		});
		
		$('.video-play').on('click',function() {
			$('iframe.video-run').each(function() {
				var id = $(this).attr('id');
				$(this).parents('.video-section').prepend('<div class="video-run" id="'+id+'"></div>');
				$(this).remove();
			});
			var id = $(this).attr('attr-id');
			var url = $(this).attr('attr-data');
			playertr = new YT.Player(id, {
				width: '100%',
				height: '100%',
				videoId: url,
				events: {
					'onReady': onPlayerReady,
					'onStateChange': onPlayerStateChange
				}
			});
			check = true;
		});
		var number = 5;
		$('body').on('click','.loadmore',function(){
			$('.json-loading').fadeIn();
			$.ajax({
				url:'<?php echo get_option('home') ?>/',
				type: 'POST', 
				cache: false,
				dataType: "json",
				data: {
					keynumber: number, 
					posttype: 'video_huong_dan',
					'get_post_more':true 
				},
				success: function(data) {
					number = number + 5;
					var $item = $(data);
					$('.videos-list').append($item);
					$('.json-loading').fadeOut();
				}
			});
			return false;
		});
	});
	function onPlayerReady(event) {
		event.target.playVideo();
	}
	function onPlayerStateChange(event) {
		if (event.data == YT.PlayerState.ENDED) {
			event.target.destroy();
		}
	}
</script>