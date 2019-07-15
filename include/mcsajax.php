<?php
/* Apply */
function is_ajax_apply(){
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
add_action('init', 'get_apply');
function get_apply() {
	if(isset($_POST['get_apply']) && is_ajax_apply()){
		$position = $_POST['position'];
		$area = $_POST['area'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$filecv = $_POST['filecv'];
		$my_post = array(
		  'post_title'    => wp_strip_all_tags($name),
		  'post_status'   => 'publish',
		  'post_type'   => 'danh_sach_ung_tuyen'
		);
		$aid = wp_insert_post( $my_post );
		if($aid) {
			update_field('field_5ca49104cfc03',$position,$aid);
			update_field('field_5ca49a751ae7a',$area,$aid);
			update_field('field_5ca49092026a3',$name,$aid);
			update_field('field_5ca490bb026a5',$phone,$aid);
			update_field('field_5ca490b4026a4',$email,$aid);
			update_field('field_5ca490c4026a6',$address,$aid);
			update_field('field_5ca490d4026a7',$filecv,$aid);
			/*Send mail*/
			$emailmain = get_field('email_apply','option');
			$subject = 'VNDIRECT – Thông báo có người ứng tuyển';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: vndirect <ir@vndirect.com.vn>' . "\n";
			ob_start();
			?>
			<h3 style="margin: 0 0 20px;">Hi Admin!</h3>
			<p>Thông báo có người ứng tuyển:</p>
			<p>Vị trí: <?php echo $position; ?></p>
			<p>Địa điểm: <?php echo $area; ?></p>	
			<p>Họ tên: <?php echo $name; ?></p>
			<p>Số điện thoại: <?php echo $phone; ?></p>					
			<p>Email: <?php echo $email; ?></p>
			<p>Nơi ở hiện tại: <?php echo $address; ?></p>
			<?php
			$emailbody = ob_get_clean();
			wp_mail($emailmain,$subject,$emailbody,$headers);
		}
		echo json_encode($aid);
		exit;
	}
}
/* Apply */
function is_ajax_apply_special(){
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
add_action('init', 'get_apply_special');
function get_apply_special() {
	if(isset($_POST['get_apply_special']) && is_ajax_apply_special()){
		$position = $_POST['position'];
		$area = $_POST['area'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$filecv = $_POST['filecv'];
		$my_post = array(
		  'post_title'    => wp_strip_all_tags($name),
		  'post_status'   => 'publish',
		  'post_type'   => 'ung_tuyen_dac_biet'
		);
		$aid = wp_insert_post( $my_post );
		if($aid) {
			update_field('field_5cac72cbaf485',$position,$aid);
			update_field('field_5cac72cbaf516',$area,$aid);
			update_field('field_5cac72cbaf594',$name,$aid);
			update_field('field_5cac72cbaf685',$phone,$aid);
			update_field('field_5cac72cbaf60d',$email,$aid);
			update_field('field_5cac72cbaf700',$address,$aid);
			update_field('field_5cac72cbaf781',$filecv,$aid);
			
			/*Send mail*/
			$emailmain = get_field('email_apply','option');
			$subject = 'VNDIRECT – Thông báo có người ứng tuyển đặc biệt';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: vndirect <ir@vndirect.com.vn>' . "\n";
			ob_start();
			?>
			<h3 style="margin: 0 0 20px;">Hi Admin!</h3>
			<p>Thông báo có người ứng tuyển đặc biệt:</p>
			<p>Vị trí: <?php echo $position; ?></p>
			<p>Địa điểm: <?php echo $area; ?></p>	
			<p>Họ tên: <?php echo $name; ?></p>
			<p>Số điện thoại: <?php echo $phone; ?></p>					
			<p>Email: <?php echo $email; ?></p>
			<p>Nơi ở hiện tại: <?php echo $address; ?></p>
			<?php
			$emailbody = ob_get_clean();
			wp_mail($emailmain,$subject,$emailbody,$headers);
		}
		echo json_encode($aid);
		exit;
	}
}
//Get post more
function is_ajax_postmore(){
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
add_action('init', 'get_post_more');
function get_post_more() {
	if(isset($_POST['get_post_more']) && is_ajax_postmore()){
		$keynumber = $_POST['keynumber'];
		$posttype = $_POST['posttype'];
		ob_start();
		$args = array(
			'post_type'	=> $posttype,
			'posts_per_page'	=> 5,
			's' => $_POST['tu_khoa'],
			'offset'	=> $keynumber,
		);
		$the_query = new WP_Query( $args );
		if($the_query->have_posts()) {
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
		}
		$array_return = ob_get_clean();
		echo json_encode($array_return);
		exit;
	}
}
/* Upload file */
add_action( 'wp_ajax_questiondatahtml', 'questiondatahtml_update' );
add_action( 'wp_ajax_nopriv_questiondatahtml', 'questiondatahtml_update' );
function questiondatahtml_update() {
	if ( $_FILES ) { 
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');
		$file_handler = 'updoc';
		$attach_id = media_handle_upload($file_handler,$pid );
	}
	echo $attach_id;
	wp_die();
}
?>