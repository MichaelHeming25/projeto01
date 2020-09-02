<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist-custom.css')}}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('template.navbar')
    <!-- END NAVBAR -->
    
		<!-- LEFT SIDEBAR -->
		@include('template.sidebarleft')
    <!-- END LEFT SIDEBAR -->
    
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="conteudo">
                    <div class="conteudo-layout">
						<div class="redes-sociais">
							<a href="#">
								<div class="card facebook">
									<i class="fab fa-facebook-f"></i>
									<span>Facebook</span>
								</div>
							</a>
							<a href="#">
								<div class="card twitter">
									<i class="fab fa-twitter"></i>
									<span>Twitter</span>
								</div>
							</a>
							<a href="#">
								<div class="card instagram">
									<i class="fab fa-instagram"></i>
									<span>Instagram</span>
								</div>
							</a>
							<a href="#">
								<div class="card whatsapp">
									<i class="fab fa-whatsapp"></i>
									<span>Whatsapp</span>
								</div>
							</a>
						</div>
					</div>
                </div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
    <!-- END MAIN -->
    
		{{-- <div class="clearfix"></div> --}}
		@include('template.footer')
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});

	$('.facebook').mouseenter( function(){
    //   $('.facebook').css({background:"#49494b", transition: "0.5s"});
      $('.facebook i, .facebook span').css({color:"#000", transition: "0.5s"});
    });
    $('.facebook').mouseleave( function(){
    //   $('.facebook').css({background:"#000", transition: "0.5s"});
	  $('.facebook i, .facebook span').css({color:"rgb(43, 145, 157)", transition: "0.5s"});
    });

	$('.instagram').mouseenter( function(){
    //   $('.instagram').css({background:"#49494b", transition: "0.5s"});
	  $('.instagram i, .instagram span').css({color:"#000", transition: "0.5s"});
    });
    $('.instagram').mouseleave( function(){
    //   $('.instagram').css({background:"#000", transition: "0.5s"});
	  $('.instagram i, .instagram span').css({color:"rgb(43, 145, 157)", transition: "0.5s"});
    });

	$('.whatsapp').mouseenter( function(){
    //   $('.whatsapp').css({background:"#49494b", transition: "0.5s"});
	  $('.whatsapp i, .whatsapp span').css({color:"#000", transition: "0.5s"});
    });
    $('.whatsapp').mouseleave( function(){
    //   $('.whatsapp').css({background:"#000", transition: "0.5s"});
	  $('.whatsapp i, .whatsapp span').css({color:"rgb(43, 145, 157)", transition: "0.5s"});
    });

	$('.twitter').mouseenter( function(){
    //   $('.twitter').css({background:"#49494b", transition: "0.5s"});
	   $('.twitter i, .twitter span').css({color:"#000", transition: "0.5s"});
    });
    $('.twitter').mouseleave( function(){
    //   $('.twitter').css({background:"#000", transition: "0.5s"});
	  $('.twitter i, .twitter span').css({color:"rgb(43, 145, 157)", transition: "0.5s"});
    });
	</script>
</body>

</html>