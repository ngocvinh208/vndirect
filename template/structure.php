<?php 
	/* Template Name: Structure */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<style type="text/css">
	.menu-relation >  a.mega-menu-link {
		background-color: #f7941e !important;
		font-weight: 700 !important;
		position: relative;
	}
	.menu-relation >  a.mega-menu-link:before{
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
		top: auto;
		background: transparent;
	}
</style>
<main id="content" class="bg-gray">
	<?php if(!empty(get_field('banner_page',$pageid))) { ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_field('banner_page',$pageid);?>');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-qhcd.png" alt="" />
			<h1 class="font800 text-uppercase">Quan hệ cổ đông</h1>
		</div>
	</div>
	<?php } else{ ?>
	<div class="content-banner banner-general" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner-chnn.jpg');">
		<div class="banner-inner text-center transform-center">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-qhcd.png" alt="" />
			<h1 class="font800 text-uppercase">Quan hệ cổ đông</h1>
		</div>
	</div>
	<?php } ?>
	<div class="content-structure content-hastitle content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline the-section">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">Quan hệ cổ đông</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_relationship')); ?>
						</div>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<div class="section-content section-right item-inline the-section">
					<h3 class="section-title font600 font40"><?php the_title(); ?></h3>
					<div class="des-title des-bold font16"><?php the_content(); ?></div>
					<section class="structure-main">
						<div class="structure-item">
							<div class="table-structure table-general table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col" style="width: 7.9%;">STT</th>
											<th scope="col" style="width: 18.2%;">Họ tên</th>
											<th scope="col" style="width: 18.2%;">Chức vụ</th>
											<th scope="col" style="width: 20.5%;">Số lượng sở hữu</th>
											<th scope="col" style="width: 17.6%;">Tỷ lệ sở hữu</th>
											<th scope="col" style="width: 17.6%;">Tỷ lệ đại diện</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$struc_terms = get_terms('danh_muc_co_dong',array('hide_empty'=>false,'exclude' => array(67)));
											if($struc_terms){
												foreach($struc_terms as $term){
										?>
										<tr class="title-cate">
											<td colspan="6" class="font20 font600"><?php echo $term->name;?></td>
										</tr>
										<?php
											$args = array(
												'post_type' => 'cau_truc_co_dong',
												'posts_per_page' => -1,
												'tax_query' => array(
													array(
														'taxonomy'  => 'danh_muc_co_dong',
														'field'   => 'ID',
														'terms' => $term->term_id
													),
												),
											);
											$the_query = new WP_Query( $args );
											$i=1;
											while ($the_query->have_posts() ) : $the_query->the_post();
											$postid = $post->ID;
										?>
										<tr class="struc-item">
											<td><?php echo $i; ?></td>
											<td><?php echo get_the_title($postid); ?></td>
											<td><?php echo get_field('position_struc',$postid);?></td>
											<td><?php echo get_field('amount_struc',$postid);?></td>
											<td><?php echo get_field('ownership_struc',$postid);?></td>
											<td><?php echo get_field('representation_struc',$postid);?></td>
										</tr>
										<?php
											$i++;
											endwhile;
											wp_reset_query();
										?>
										<?php }} ?>
								  </tbody>
								</table>
							</div>
						</div>
						<div class="structure-item">
							<h3 class="font20 font700">Danh sách cổ đông</h3>
							<div class="table-structure table-general table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col" style="width: 7.9%;">STT</th>
											<th scope="col" style="width: 18.2%;">Họ tên</th>
											<th scope="col" style="width: 18.2%;">Chức vụ</th>
											<th scope="col" style="width: 20.5%;">Số lượng sở hữu</th>
											<th scope="col" style="width: 17.6%;">Tỷ lệ sở hữu</th>
											<th scope="col" style="width: 17.6%;">Tỷ lệ đại diện</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$args = array(
												'post_type' => 'cau_truc_co_dong',
												'posts_per_page' => -1,
												'tax_query' => array(
													array(
														'taxonomy'  => 'danh_muc_co_dong',
														'field'   => 'ID',
														'terms' => 67
													),
												),
											);
											$the_query = new WP_Query( $args );
											$i=1;
											while ($the_query->have_posts() ) : $the_query->the_post();
											$postid = $post->ID;
										?>
										<tr class="struc-item">
											<td><?php echo $i; ?></td>
											<td><?php echo get_the_title($postid); ?></td>
											<td><?php echo get_field('position_struc',$postid);?></td>
											<td><?php echo get_field('amount_struc',$postid);?></td>
											<td><?php echo get_field('ownership_struc',$postid);?></td>
											<td><?php echo get_field('representation_struc',$postid);?></td>
										</tr>
										<?php
											$i++;
											endwhile;
											wp_reset_query();
										?>
								  </tbody>
								</table>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>