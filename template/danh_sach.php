<?php 
	/* Template Name: Danh sách */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
<main id="content" class="bg-gray">
	<div class="container">
		<ol>
			<li><a href="<?php echo home_url();?>" target="_blank">Trang chủ</a></li>
			<li><a href="<?php echo get_permalink(174); ?>" target="_blank">2-sanpham</a></li>
			<li><a href="<?php echo get_permalink(177); ?>" target="_blank">2-sanpham-stockbook</a></li>
			<li><a href="<?php echo get_permalink(179); ?>" target="_blank">2-sanpham-protrade</a></li>
			<li><a href="<?php echo home_url();?>/dich_vu/dich-vu-moi-gioi/" target="_blank">3-dich vu</a></li>
			<li><a href="<?php echo get_permalink(172);?>" target="_blank">4-Trung tam ho tro</a></li>
			<li><a href="<?php echo get_permalink(78);?>" target="_blank">4-Trung tam ho tro-lien he</a></li>
			<li><a href="<?php echo get_permalink(194);?>" target="_blank">4-Trung tam ho tro-mang luoi chi nhanh</a></li>
			<li><a href="<?php echo get_permalink(80);?>" target="_blank">4-Trung tam ho tro-tin VNDriect</a></li>
			<li><a href="<?php echo get_permalink(52);?>" target="_blank">5-Trung tam nghien cuu</a></li>
			<li><a href="<?php echo get_permalink(54);?>" target="_blank">5.2-Trung tam nghien cuu</a></li>
			<li><a href="<?php echo get_permalink(44);?>" target="_blank">5.3-thong tin co phieu</a></li>
			<li><a href="<?php echo get_permalink(46);?>" target="_blank">5.4-du lieu thi truong</a></li>
			<li><a href="<?php echo get_permalink(50);?>" target="_blank">5.5-bao cao phan tich</a></li>
			<li><a href="<?php echo home_url();?>/lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit-sed-do-eiusmod/" target="_blank">6-chi tiet bai viet</a></li>
			<li><a href="<?php echo get_permalink(181);?>" target="_blank">7-co hoi nghe nghiep</a></li>
			<li><a href="<?php echo get_permalink(183);?>" target="_blank">7.2-ve vndirect</a></li>
			<li><a href="<?php echo get_permalink(185);?>" target="_blank">7.3-tuyendung</a></li>
			<li><a href="<?php echo home_url();?>/vndirect-tuyen-dung-pho-phong-marketing/" target="_blank">7.4- chitiet tuyendung</a></li>
			<li><a href="<?php echo get_permalink(48);?>" target="_blank">8-co phieu khuyen nghi</a></li>
			<li><a href="<?php echo get_permalink(191);?>" target="_blank">9-quan he co dong-bao cao tai chinh</a></li>
			<li><a href="<?php echo get_permalink(58);?>" target="_blank">9-quan he co dong-bao cao thuong nien</a></li>
			<li><a href="<?php echo get_permalink(60);?>" target="_blank">9-quan he co dong-cau hoi thuong gap</a></li>
			<li><a href="<?php echo get_permalink(62);?>" target="_blank">9-quan he co dong-cong bo thong tin</a></li>
			<li><a href="<?php echo get_permalink(64);?>" target="_blank">9-quan he co dong-thanh vien ban kiem soat</a></li>
			<li><a href="<?php echo get_permalink(68);?>" target="_blank">9-quan he co dong-cau truc co dong</a></li>
			<li><a href="<?php echo get_permalink(70);?>" target="_blank">9-quan he co dong-lich su co tuc</a></li>
			<li><a href="<?php echo get_permalink(74);?>" target="_blank">9-quan he co dong-Dai hoi co dong</a></li>
			<li><a href="<?php echo get_permalink(76);?>" target="_blank">9-quan he co dong-lien he</a></li>
			<li><a href="<?php echo get_permalink(42);?>" target="_blank">9-quan he co dong-lich va su kien</a></li>
			<li><a href="<?php echo get_permalink(196);?>" target="_blank">9-quan he co dong-thong tin co phieu</a></li>
			<li><a href="<?php echo get_permalink(98);?>" target="_blank">10- cong bo rui ro</a></li>
			<li><a href="<?php echo get_permalink(82);?>" target="_blank">11- dieu khoan su dung</a></li>	
		</ol>
	</div>
	<style>
		ol{
			padding: 50px 0;
			margin-left: 15px;
		}
		ol li{
			padding: 3px 10px;
			font-size: 18px;
		}
		ol li a{
			text-decoration: none;
		}
	</style>
</main>
<?php get_footer(); ?>