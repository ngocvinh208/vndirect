<h3 class="sidebar-title font700 font25">Liên lạc với VNDIRECT</h3>
<ul>
	<li><a>Hotline: <?php echo the_field('hotline','option');?></a></li>
	<li>
		<a href="mailto:<?php the_field('email','option');?>"  class="dropdown">Gửi email cho chúng tôi <i class="fa fa-angle-right"></i></a>
	</li>
	<li>
		<p>Tìm kiếm chi nhánh</p>
		<div class="form-custom">
			<form action="<?php echo get_permalink(194); ?>" method="POST">
				<input type="text" class="form-control" name="tu_khoa" value="<?php echo $_POST['tu_khoa']; ?>" placeholder="Nhập tên thành phố" />
				<button class="btn btn-orange">Tìm</button>
			</form>
		</div>
	</li>
</ul>