<!doctype html>
<html lang="pt-br">

<head>
	<title>Dashboard | Clientes</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css')}}">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist-custom.css')}}">
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
	
    {{-- CSS TABLE --}}
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
	<link rel='stylesheet' href='{{ asset('css/metisMenu.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('css/timeline.css') }}'>
    <link rel='stylesheet' href='{{ asset('css/morris.css') }}'>
    <link rel="stylesheet" href="{{ asset('css/listar.css') }}">
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
						<div class="header-title">
							<div class="title">
								<i class="fas fa-users"></i>
								<span>Lista de clientes</span>
							</div>
						</div>

						@if (session('mensagem'))
							<div class="alert alert-success fade  mb-0 pl-3 pr-3 pt-1 pb-1 col-12" role="alert">
							<div class="alert-icon"><i class="far fa-check-circle"></i></div>
								<div class="alert alert-success">
									{{ session('mensagem') }}
								</div>
								<div class="alert-close">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="fas fa-times"></i></span>
									</button>
								</div>
							</div>
							
						@elseif(session('invalido'))
							<div class="alert alert-danger fade show mb-0 pl-3 pr-3 pt-1 pb-1 col-12" role="alert">
							<div class="alert-icon"><i class="far fa-check-circle"></i></div>
								<div class="alert alert-danger">
									{{ session('invalido') }}
								</div>
								<div class="alert-close">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="fas fa-times"></i></i></span>
									</button>
								</div>
							</div>
						@endif
						
                        <div class="lista-usuarios">
                            <table id="example" class="display" style="width:100%">
								<thead>
									<tr>
										<th>ID</th>
										<th>NOME</th>
										<th>E-MAIL</th>
										<th>STATUS</th>
										{{-- <th>TELEFONE</th>
										<th>CPF</th> --}}
										<th>DELETAR / EDITAR / VER MAIS</th>
									</tr>
								</thead>
                              <tbody>
                                @for ($i = 0; $i < sizeof($clientes); $i++)
                                  <tr>
									  
                                    @isset($clientes[$i]['id'])
                                      <td>{{ $clientes[$i]['id'] }}</td>
                                    @endisset
                    
                                    @isset($clientes[$i]['name'])
                                      <td>{{ $clientes[$i]['name'] }}</td>
                                    @endisset
                    
                                    @isset($clientes[$i]['email'])
                                      <td>{{ $clientes[$i]['email'] }}</td>
									@endisset
									
                                    @isset($clientes[$i]['status'])
                                      <td>{{ $clientes[$i]['status'] }}</td>
                                    @endisset

                                    {{-- @isset($clientes[$i]['telefone'])
                                        <td>{{ $clientes[$i]['telefone'] }}</td>
                                    @endisset

                                    @isset($clientes[$i]['cpf'])
                                        <td>{{ $clientes[$i]['cpf'] }}</td>
                                    @endisset --}}

                                    <td>
                                      <div class="botoes">
										<button type="button" class="botao-remover" style="margin-right: 10px;" onclick="javascript:location.href='clientes/remover/{{ $clientes[$i]['id'] }}'"><i class="far fa-trash-alt"></i></button>  
                                        <button type="button" class="botao-editar" onclick="javascript:location.href='clientes/editar/{{ $clientes[$i]['id'] }}'"><span class="entypo-tools"><i class="fas fa-edit"></i></span></button>
                                        <button type="button" class="botao-editar" onclick="javascript:location.href='clientes/vermais/{{ $clientes[$i]['id'] }}'"><span class="entypo-tools"><i class="fas fa-ellipsis-h"></i></span></button>
                                      </div>
									</td>
									
                                  </tr>
                                @endfor
                              </tbody>
                          </table>
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
	
	<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	{{-- <script src="assets/vendor/jquery/jquery.min.js"></script> --}}
	<script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendor/chartist/js/chartist.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
    
	<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src='{{ asset('js/metisMenu.min.js') }}'></script>
	<script type="text/javascript" src='{{ asset('js/timeline-min.js') }}'></script>
    <script type="text/javascript" src='{{ asset('js/raphael-min.js') }}'></script>
	<script type="text/javascript" src='{{ asset('js/morris.min.js') }}'></script>
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

    $(document).ready( function () {
        $('#myTable').DataTable();
    });

	$(document).ready(function() {

		$('#example').DataTable( {
			"paging":   false,
			"ordering": false,
			"info":     false,
			language:{
				"search": "<span class='busca'><i class='fas fa-search'></i></span>",
			}
		});

	});

	</script>
</body>

</html>
