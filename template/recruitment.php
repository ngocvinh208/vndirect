<?php 
	/* Template Name: Recruitment */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<style type="text/css">
	.mega-menu-chane >  a.mega-menu-link {
		background-color: #f7941e !important;
		font-weight: 700 !important;
		position: relative;
	}
	.mega-menu-chane >  a.mega-menu-link:before{
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
<main id="content" class="recruitment-content bg-gray">
	<?php if(!empty(get_field('banner_page',$pageid))) { ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid);?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-chnn.png" alt="" />
			<h1 class="font800 text-uppercase">Cơ hội nghề nghiệp</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-chnn.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-chnn.png" alt="" />
			<h1 class="font800 text-uppercase">Cơ hội nghề nghiệp</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-recruitment content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">Cơ hội nghề nghiệp</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_job')); ?>
						</div>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<section class="section-content section-right item-inline">
					<h3 class="section-title font600 font40">Vị trí tuyển dụng</h3>
					<div class="form-default form-share">
						<form action="" method="POST" id="searchRecrui"> 
							<div class="row">
								<div class="form-group col-12">
									<input type="text" class="form-control form-string" id="wordRecrui" value="<?php echo $_POST['tu_khoa'];?>" name="tu_khoa" autocomplete="off" placeholder="Nhập từ khóa tuyển dụng">
								</div>
								<div class="form-collapse col-12">
									<div class="row">
										<div class="form-select form-group col-md-6">
											<label for="" class="label">Phòng ban</label>
											<select class="form-control" name="phong_ban" id="department" autocomplete="off">
												<option value="Tất cả">Tất cả</option>
												<?php 
													$offterms = get_terms('phong_ban_tuyen_dung',array('hide_empty' => false));
													if($offterms){
													foreach ($offterms as $term) { $offid = $term->term_id;
												?>
												<option value="<?php echo $term->term_id; ?>" <?php if($_POST['phong_ban'] == $offid) echo 'selected'?>><?php echo $term->name; ?></option>
												<?php } } ?>
											</select>
										</div>
										<div class="form-select form-group col-md-6">
											<label for="" class="label">Khu vực</label>
											<select class="form-control" name="khu_vuc" id="area" autocomplete="off">
												<option value="Tất cả">Tất cả</option>
												<?php 
													$areaterms = get_terms('khu_vuc_tuyen_dung',array('hide_empty' => false));
													if($areaterms){
														foreach($areaterms as $term){ $areid = $term->term_id;
												?>
												<option value="<?php echo $term->term_id; ?>" <?php if($_POST['khu_vuc'] == $areid) echo 'selected'?>><?php echo $term->name; ?></option>
												<?php } } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-12 action-form flex-item">
									<div class="button-form">
										<button type="submit" class="btn btn-orange">Tìm kiếm</button>
										<a href="" class="btn btn-gray delete-form">xóa</a>
									</div>
									<a href="" class="hcollapse font600"><span>Thu gọn</span> <i class="fa fa-angle-up"></i></a>
								</div>
							</div>
						</form>
					</div>
					<div class="list-recruitment">
						<?php
							$args = array(
								'post_type'	=> 'tuyen_dung',
								'posts_per_page' => 9,
								'paged'	=> max($page,$paged),
								's' => $_POST['tu_khoa'],
								'tax_query' => array(),
							);
							if(isset($_POST['phong_ban']) && $_POST['phong_ban'] != '') {
								$args['tax_query'][] = array(
									'taxonomy'	=> 'phong_ban_tuyen_dung',
									'field'	=> 'id',
									'terms'	=> $_POST['phong_ban']
								);
							}
							if(isset($_POST['khu_vuc']) && $_POST['khu_vuc'] != '') {
								$args['tax_query'][] = array(
									'taxonomy'	=> 'khu_vuc_tuyen_dung',
									'field'	=> 'id',
									'terms'	=> $_POST['khu_vuc']
								);
							}
							 $the_query = new WP_Query( $args );
							 while ($the_query->have_posts() ) : $the_query->the_post();
							 $postid = $post->ID;
							 $of_terms = wp_get_post_terms($postid,'phong_ban_tuyen_dung');
		                     $ad_terms = wp_get_post_terms($postid,'khu_vuc_tuyen_dung');
							 $total_view = get_field('total_view',$post->ID);
							if(!$total_view) $total_view = 0;
						?>
						<div class="recruitment-item">
							<div class="recruitment-infor">
								<h3><a href="<?php echo get_permalink($postid); ?>" class="font24 font700"><?php echo get_the_title($postid); ?></a></h3>
								<p class="news-view"><a class="font300">Tuyển dụng</a> <span class="fontita"><i class="fa fa-eye"></i><?php echo $total_view; ?></span> 
									<?php if(!empty(get_field('date_public',$postid))){?>
									&nbsp; |<span>Ngày đăng: <b> <?php echo get_field('date_public',$postid);?> </b></span> 
									<?php } ?>
									<?php if(!empty(get_field('date_expiration',$postid))){?>
									&nbsp; |<span>Ngày hết hạn: <b> <?php echo get_field('date_expiration',$postid);?> </b></span>
									<?php } ?>
									<?php if(!empty(get_field('salary',$postid))){?>
									&nbsp; |<span>Mức lương: <b> <?php echo get_field('salary',$postid);?> </b></span> <?php } ?><br />
									<?php if($of_terms) {?>
									&nbsp; |<span>Phòng ban: <b> <?php echo $of_terms[0]->name; ?> </b></span>
									<?php } ?>
									<?php if($ad_terms) {?>
									&nbsp; |<span>Khu vực làm việc: <b> <?php echo $ad_terms[0]->name; ?> </b></span>
									<?php } ?>
								</p>
								<a href="<?php echo get_permalink($postid); ?>" class="apply btn-orange">Ứng tuyển</a>
							</div>
						</div>
						<?php
							endwhile;
							wp_reset_query();
						?>	
					</div>
					<div class="text-right">
						<?php
							$big = 999999999;
							$mcs_paginate_links = paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $the_query->max_num_pages,
								'prev_text'    => __('«','yup'),
								'next_text'    => __('»','yup') 
							  ) );
							 if($mcs_paginate_links) : 
						 ?>
						<nav class="control-post">
							<?php echo $mcs_paginate_links ?>
						</nav>
						<?php endif; ?>
					</div>
				</section>
			</div>
		</div>
	</div>
</main>
<?php 
 if($_POST){
?>
<!-- <script type="text/javascript">
jQuery(function(){
	$('html,body').animate({ scrollTop: $('#searchRecrui').offset().top - 50 }, 400);
});
</script> -->

<?php  } ?>
<?php get_footer(); ?>
<script type="text/javascript">
	jQuery(function(){
		$('.delete-form').on('click',function(){
			$('form').trigger("reset");
			return false;
		});
	});
</script>