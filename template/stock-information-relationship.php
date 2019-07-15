<?php 
	/* Template Name: Stock information relationship */
	$pageid = get_the_ID();
	get_header();
	the_post();
?>
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
	<div class="content-exchange content-hastitle content-general">
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
					<h3 class="section-title font600 font40">Thông tin cổ phiếu</h3>
					<p class="stock-time font16 font600"><i class="fa fa-clock-o"></i>Tue - 05/03/2019</p>
					<section class="exchanging section-box row hstock-item">
						<div class="box-exchange box-item col-md-6">
							<div class="infor box-white text-center">
								<span class="text-exchange text-green">Đang giao dịch</span>
								<div class="top-exchange">
									<div class="row">
										<div class="col-6 text-left">
											<p class="text-green textvnd font27">VND</p>
											<p class="text-kldg">KLGD: 1,083,25</p>
										</div>
										<div class="col-6">
											<p class="text-green textmain font600">17.76 <span><img src=" <?php echo get_template_directory_uri(); ?>/images/arrow-up.png" alt="" /></span></p>
											<p class="text-green text-plus font20">+  0.10 ( + 50%)</p>
										</div>
									</div>
								</div>
								<div class="bottom-exchange">
									<div class="row">
										<div class="col">
											<p>Cao nhất</p>
											<span class="text-green font20 font600">18</span>
										</div>
										<div class="col">
											<p>Trung bình</p>
											<span class="text-orange font20 font600">17.8</span>
										</div>
										<div class="col">
											<p>Thấp nhất</p>
											<span class="tred font20 font600">17.6</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-parameter box-item col-md-6">
							<div class="infor box-white text-center">
								<ul class="list-prameter">
									<li>
										<p class="font13">Giá cao nhất 52 tuần:</p>
										<span class="value">32.80</span>
									</li>
									<li>
										<p class="font13">Giá thấp nhất 52 tuần: </p>
										<span class="value">15.40</span>
									</li>
									<li>
										<p class="font13">Số lượng cổ phiếu đã phát hành:</p>
										<span class="value">220,430,169</span>
									</li>
									<li>
										<p class="font13">Số lượng cổ phiếu đang phát hành:</p>
										<span class="value">208,565,465</span>
									</li>
									<li>
										<p class="font13">Khối lượng trung bình 10 phiên: </p>
										<span class="value">1,112,252</span>
									</li>
									<li>
										<p class="font13">EPS:</p>
										<span class="value">1,823</span>
									</li>
									<li>
										<p class="font13">ROA: </p>
										<span class="value">3.7%</span>
									</li>
									<li>
										<p class="font13">ROE: </p>
										<span class="value">12.8%</span>
									</li>
									<li>
										<p class="font13">P/E:</p>
										<span class="value">9.8%</span>
									</li>
									<li>
										<p class="font13">P/B:</p>
										<span class="value">13%</span>
									</li>
								</ul>
							</div>
						</div>
					</section>
					<section class="hstock-item" id="chart-stock">
						<img src="<?php echo get_template_directory_uri(); ?>/images/chart-stock.png" alt="" />
					</section>
					<!-- <section class="stock-percent hstock-item">
						<h3 class="font22 font600">Cổ đông lớn</h3>
						<div class="section-box row">
							<div class="shareholders-one box-item col-md-6">
								<div class="infor box-white">
									<p>As at 27/02/2018</p>
									<div class="circle">
										<div id="circle1"></div>
									</div>
									<ul class="list-des">
										<li><span style="background-color: #7c7c7b"></span>Công ty TNHH một thành viên tài chính IPA</li>
										<li><span style="background-color: #9787cd"></span>PYN ELITE FUND ( NON - UCITS )</li>
										<li><span style="background-color: #9bbb59"></span>VI ( VIET NAM INVESTMENTS) FUNDI,L.P</li>
										<li><span style="background-color: #dddddd"></span>Cổ đông cá nhân</li>
										<li><span style="background-color: #f39200"></span>Cổ đông tổ chức</li>
									</ul>
								</div>
							</div>
							<div class="shareholders-two box-item col-md-6">
								<div class="infor box-white">
									<p>As at 27/02/2018</p>
									<div class="circle">
										<div id="circle2"></div>
									</div>
									<ul class="list-des">
										<li><span style="background-color: #dddddd"></span>Cổ đông nước ngoài</li>
										<li><span style="background-color: #f39200"></span>Cổ đông trong nước</li>
									</ul>
								</div>
							</div>
						</div>
					</section> -->
					<section class="receive-news hstock-item content-contact">
						<h3 class="font22 font600">Đăng ký nhận thông tin định kỳ</h3>
						<div class="form-contact form-box box-white">
							<?php echo do_shortcode(get_field('shortcode_news',$pageid)); ?>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
<script type="text/javascript">
	
	  google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
		 //chart1 
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Công ty TNHH một thành viên tài chính IPA',{v: 25.29, f: '25.29%'}],
          ['PYN ELITE FUND ( NON - UCITS )',{v: 10.91, f: '10.91%'}],
          ['VI ( VIET NAM INVESTMENTS) FUNDI,L.P',{v: 5, f: '5.00%'}],
          ['Cổ đông cá nhân',{v: 23.89, f: '23.89%'} ],
          ['Cổ đông tổ chức',{v: 34.91, f: '34.91%'}]
        ]);

        var options = {
			pieSliceText: 'value',
			sliceVisibilityThreshold: 0.0001,
			colors: ['#7c7c7b', '#9787cd', '#9bbb59', '#dddddd', '#f39200'],
			legend: 'none',
			enableInteractivity: false,
			chartArea: {width: '90%', height: '90%'},
			width: 352,
			height: 352,
			pieHole: 0.5,
			fontSize: 14,
        };

        var chart = new google.visualization.PieChart(document.getElementById('circle1'));
        chart.draw(data, options);
		
		//chart2
		
		var data2 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Cổ đông nước ngoài',{v: 52.22, f: '52.22%'} ],
          ['Cổ đông trong nước',{v: 47.78, f: '47.78%'}]
        ]);

        var options2 = {
			pieSliceText: 'value',
			sliceVisibilityThreshold: 0.0001,
			colors: ['#f39200', '#dddddd'],
			legend: 'none',
			enableInteractivity: false,
			chartArea: {width: '90%', height: '90%'},
			width: 352,
			height: 352,
			pieHole: 0.5,
			fontSize: 14,
        };

        var chart = new google.visualization.PieChart(document.getElementById('circle2'));
        chart.draw(data2, options2);
      }
	  
</script>