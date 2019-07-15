<?php 
$postid = get_the_ID();
$off_terms = wp_get_post_terms($postid,'phong_ban_tuyen_dung_dac_biet');
$add_terms = wp_get_post_terms($postid,'khu_vuc_tuyen_dung_dac_biet');
$total_view = get_field('total_view',$postid);
if(!$total_view) $total_view = 0;
$total_view += 1;
update_field('field_5cba1ba8281ce',$total_view,$postid);
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
	#menu-item-746 > a,#menu-item-747 > a{
		color: #f7941e;
	}
	#menu-item-746 .sub-menu{
		display: block;
	}
</style>
<main id="content" class="bg-gray">
	<div class="content-single-recruitment content-single content-general">
		<div class="container">
			<div class="list-inline section-custom">
				<aside class="sidebar section-left item-inline">
					<div class="sidebar-item">
						<h3 class="sidebar-title font700 font28">TT nghiên cứu</h3>
						<div class="menu-sidebar">
							<?php wp_nav_menu(array('theme_location'=> 'menu_job')); ?>
						</div>
					</div>
					<div class="sidebar-item">
						<?php get_template_part('include/part-search'); ?>
					</div>
				</aside>
				<div class="section-content section-right item-inline">
					<div class="top-section-special">
						<h1 class="section-title font700 font35"><?php the_title(); ?></h1>
						<a href="" data-toggle="modal" data-target="#modalApply" class="apply-special btn-orange">Ứng tuyển</a>
					</div>
					<div class="single-date flex-item">
						<p class="news-view"><a class="font300">Tuyển dụng đặc biệt</a> <span class="fontita font16"><i class="fa fa-calendar"></i><?php echo get_the_date('d/m/Y');  ?> &nbsp; /&nbsp;&nbsp;<i class="fa fa-eye"></i><?php echo $total_view; ?></span></p>
						<p class="news-share"><span class="font300">Chia sẻ</span>
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank"><i class="fa fa-paper-plane"></i></a>
						<a href="http://twitter.com/home?status=<?php the_title();?>+<?php the_permalink();?>"><i class="fa fa-twitter"></i></a>
						<a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink();?>&title=<?php the_title();?>"><i class="fa fa-linkedin"></i></a></p>
					</div>
					<section class="single-content content-text">
						<?php the_content(); ?>
						<a href="" data-toggle="modal" data-target="#modalApply"  class="apply-now btn-orange openaccount">Ứng tuyển ngay</a>
					</section>
					<!-- <section class="post-control">
						<div class="post-control-item previous_post">
							<span><i class="fa fa-angle-left"></i><b>Bài trước: </b></span>
							<?php previous_post_link( '<div class="nav-previous">%link</div>', '%title' ); ?>
						</div>
						<div class="post-control-item next_post">
							<span><i class="fa fa-angle-left"></i><b>Bài tiếp: </b></span>
							<?php next_post_link( '<div class="nav-next">%link</div>', '%title' ); ?>
						</div>
					</section> -->
					<div class="position-others">
						<h3 class="font25 font600 title-others">Vị trí tuyển dụng tương tự</h3>
						<div class="list-recruitment">
								<?php
								$args = array(
									'post_type'	=> 'tuyen_dung_dac_biet',
									'posts_per_page' => 3,
									'post__not_in'	=> array($postid),
									'tax_query'      =>     array(
										array(
											'taxonomy' => 'phong_ban_tuyen_dung_dac_biet',
											'field'   => 'ID',
											'terms' => $off_terms[0]->term_id
										),
									)
								);
								 $the_query = new WP_Query( $args );
								 while ($the_query->have_posts() ) : $the_query->the_post();
								 $reid = $post->ID;
								 $of_terms = wp_get_post_terms($reid,'phong_ban_tuyen_dung_dac_biet');
								 $ad_terms = wp_get_post_terms($reid,'khu_vuc_tuyen_dung_dac_biet');
								 $total_view = get_field('total_view',$post->ID);
								if(!$total_view) $total_view = 0;
							?>
							<div class="recruitment-item">
								<div class="recruitment-infor">
									<h3><a href="<?php echo get_permalink($reid); ?>" class="font24 font700"><?php echo get_the_title($reid); ?></a></h3>
									<p class="news-view"><a href="<?php echo get_permalink(185); ?>" class="font300">Tuyển dụng</a> <span class="fontita"><i class="fa fa-eye"></i><?php echo $total_view; ?></span> 
										<?php if(!empty(get_field('date_public',$reid))){?>
										&nbsp; |<span>Ngày đăng: <b> <?php echo get_field('date_public',$reid);?> </b></span> 
										<?php } ?>
										<?php if(!empty(get_field('date_expiration',$reid))){?>
										&nbsp; |<span>Ngày hết hạn: <b> <?php echo get_field('date_expiration',$reid);?> </b></span>
										<?php } ?>
										<?php if(!empty(get_field('salary',$reid))){?>
										&nbsp; |<span>Mức lương: <b> <?php echo get_field('salary',$reid);?> </b></span> <?php } ?><br />
										<?php if($of_terms) {?>
										&nbsp; |<span>Phòng ban: <b> <?php echo $of_terms[0]->name; ?> </b></span>
										<?php } ?>
										<?php if($ad_terms) {?>
										&nbsp; |<span>Khu vực làm việc: <b> <?php echo $ad_terms[0]->name; ?> </b></span>
										<?php } ?>
									</p>
								</div>
							</div>
							<?php
								endwhile;
								wp_reset_query();
							?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<div id="modalApply" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form action="" method="POST" id="applyForm">
				<div class="form-apply form-general the-json">
					<a href="" class="close-dialog" data-dismiss="modal" aria-label="Close">
						<img src="<?php echo get_template_directory_uri(); ?>/images/close.png" alt="">
					</a>
					<div class="modal-top">
						<h4 class="font700 font16">Ứng tuyển vào vị trí</h4>
						<h3 class="font700 font24"><?php the_title(); ?></h3>
						<p>Khu vực làm việc: <b><?php echo $add_terms[0]->name; ?></b></p>
						<input type="hidden" class="data-apply" name="data_appy" id="dataApply" value="<?php the_title(); ?>" />
						<input type="hidden" class="data-apply" name="area_appy" id="areaApply" value="<?php echo $add_terms[0]->name; ?>" />
					</div>
					<h4 class="font700 font16 title-fill">Thông tin liên hệ ứng viên</h4>
					<div class="row">
						<div class="col-md-6 form-group">
							<label class="label">Name</label>
							<input type="text" name="name_apply" id="applyName" class="form-control" placeholder="Họ tên" autocomplete="off" />
						</div>
						<div class="col-md-6 form-group">
							<label class="control-label">Email</label>
							<input type="email" name="email_apply" id="applyEmail" class="form-control" placeholder="Email" autocomplete="off" />
						</div>
						<div class="col-md-6 form-group">
							<label class="label">Số điện thoại</label>
							<input type="number" name="phone_apply" id="applyPhone" class="form-control" placeholder="Số điện thoại" autocomplete="off" />
						</div>
						<div class="col-md-6 form-group">
							<label class="label">Nơi ở hiện tại</label>
							<input type="text" name="address_apply" id="applyAddress" class="form-control" placeholder="Address/Company" autocomplete="off" />
						</div>
					</div>
					<div class="form-group">
						<div class="topcv flex-item">
							<h4 class="font700 font16">Hồ sơ của bạn</h4>
							<label for="fileCV" class="label-file"><i class="fa fa-cloud-upload"></i>	
							Tải hồ sơ						
							<input type="hidden" id="getFilename"  />							
							<input type="hidden" id="getFileType"  />							
							<input type="hidden" id="getFileContent"  />							
							<input type="file" id="fileCV" class="input-file" name="my_file" accept=".doc,.docx,.pdf"/>						
							</label>
						</div>
						<p class="text-support font13 text-opa">"Hỗ trợ định dạng *.doc, *.docx, *.pdf và không quá 2MB</p>
						<div class="up-load">
							<p class="filename font18 text-blue"><i class="fa fa-list-alt"></i><span class="namecv"></span></p>
							<a class="remove" href=""><i class="fa fa-trash"></i></a>
						</div>
					</div>
					<input type="hidden" id="fillFile" value="" />
					<button type="submit" class="btn btn-apply btn-orange">Ứng tuyển</button>					
					<div class="loading-json"><div class="lds-css ng-scope"><div style="width:100%;height:100%" class="lds-ripple"><div></div><div></div></div></div></div>	
					<div class="alert alert-success message-alertform" role="alert">Cám ơn bạn đã gửi CV!</div>
				</div>				
			</form>
		</div>
	</div>
</div> <!-- End modal apply -->
<?php get_footer();?>
<script type="text/javascript">
jQuery(function(){
	$('.remove').on('click',function(){
		$('.namecv').text('');
		$('#fileCV').val('').attr('value','');
		return false;
	});
	setInterval(function(){ 
		if($('#fileCV').hasClass('error')) $('.up-load').addClass('error');
		else $('.up-load').removeClass('error');
	}, 50);
	loadimage();
});
$('#applyForm').validate({		
	rules: {			
		name_apply: {				
			required: true,			
		},			
		phone_apply: {
			required: true,			
			number: true		
		},			
		email_apply: {			
			required: true,				
			email: true			
		},		
		address_apply: {				
			required: true			
		},			
		my_file: {			
			required: true			
		}		
	},		
	submitHandler: function(form) {
		$('.loading-json').show();			
		$.ajax({				
			url:'<?php echo get_option('home') ?>/',				
			type: 'POST', 				
			cache: false,				
			dataType: "json",				
			data: {					
			name: $('#applyName').val(),  					
			phone: $('#applyPhone').val(), 					
			email: $('#applyEmail').val(), 										
			address: $('#applyAddress').val(),	
			position: $('#dataApply').val(),
			area: $('#areaApply').val(),
			filecv: $('#fillFile').val(),
			'get_apply_special':true 				
			},				
			success: function(data) {					
				$('.loading-json').hide();			
				$('.message-alertform').fadeIn();					
				$('#applyForm').trigger('reset');					
				setTimeout(function(){ $('.message-alertform').fadeOut(); }, 2000);
				setTimeout(function(){ $('.close-dialog').click(); }, 2000);						
			}			
		});		
	}	
});
function loadimage() {	
	$('.input-file').on('change', function(event){		
		var files = this.files;		
		var file = files[0];		
		$('.namecv').text(file.name);
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		var formData = new FormData();
		formData.append('updoc', $('input[type=file]')[0].files[0]);
		formData.append('action', "questiondatahtml");
		$('.loading-json').show();	
		$.ajax({
			url: ajaxurl,
			type: "POST",
			data:formData,cache: false,
			processData: false,
			contentType: false,
			success:function(data) {
				$('#fillFile').val(data).attr('value',data);
				$('.loading-json').hide();	
			}
		});
	});
}
</script>