<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Tip</title>
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
                    <div class="conteudo-layout2">

						<div class="header-title">
							<div class="title">
								<i class="fas fa-user-plus"></i>
								<span>Cadastrar usuário</span>
							</div>
						</div>
						
						<form action="{{ route('cadastrar.usuarios.salvar') }}" method="POST" id="form" enctype="multipart/form-data">
							@csrf

							<div class="form-interno-geral">

                            <div class="form-interno">

                                <div class="form-group2">
                                    <span for="name">Nome</span>
									<input type="text" id="name" name="name" class="name @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Digite seu nome">
									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								
                                <div class="form-group2">
                                    <span for="email">E-mail</span>
									<input type="email" id="email" name="email" class="email  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Digite seu email">
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

							</div>

							<div class="form-interno">
								
                                <div class="form-group2">
                                    <span for="password">Senha</span>
									<input type="password" id="password" name="password" class="password @error('password') is-invalid @enderror" placeholder="Digite sua senha">
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

                                <div class="form-group2">
                                    <span for="telefone">Telefone</span>
									<input type="text" id="telefone" name="telefone" class="telefone @error('telefone') is-invalid @enderror" placeholder="Digite sua senha">
									@error('telefone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

							</div>

							<div class="form-interno3">

								<div class="kt-widget14__header kt-margin-b-10">
									<h5 class="kt-widget14__title">
										PERMISSÕES
									</h4>
								</div>

								<div class="perm-geral">

									<div class="kt-checkbox-inline">
										<div class="usuario checkperm1">
											<h5>Permissões dos usuarios</h5>
											<span class="kt-checkbox">
												<input type="checkbox" id="pcadastrar_usuario" name="pcadastrar_usuario"> Cadastrar Usuários
												<span></span>
											</span>
											<span class="kt-checkbox">
												<input type="checkbox" id="pvisualizar_usuario" name="pvisualizar_usuario"> Visualizar Usuários
												<span></span>
											</span>
											<span class="kt-checkbox">
												<input type="checkbox" id="peditar_usuario" name="peditar_usuario"> Editar Usuários
												<span></span>
											</span>
											<span class="kt-checkbox">
												<input type="checkbox" id="pdeletar_usuario" name="pdeletar_usuario"> Deletar Usuários
												<span></span>
											</span>
										</div>
										
									</div>

									<div class="kt-checkbox-inline">
										<div class="usuario2 checkperm1">
											<h5>Permissões dos clientes</h5>
											<span class="kt-checkbox">
												<input type="checkbox" id="pcadastrar_cliente" name="pcadastrar_cliente"> Cadastrar clientes
												<span></span>
											</span>
											<span class="kt-checkbox">
												<input type="checkbox" id="pvisualizar_cliente" name="pvisualizar_cliente"> Visualizar clientes
												<span></span>
											</span>
											<span class="kt-checkbox">
												<input type="checkbox" id="peditar_cliente" name="peditar_cliente"> Editar clientes
												<span></span>
											</span>
											<span class="kt-checkbox">
												<input type="checkbox" id="pdeletar_cliente" name="pdeletar_cliente"> Deletar clientes
												<span></span>
											</span>
										</div>
									</div>

								</div>

							</div>

							{{-- <button class='btn btn-large' type='button' title='Todos' id='todos' onclick='marcardesmarcar();'>Marcar/Desmarcar todos</i></button> --}}

							</div>

							<button type="submit" class="botao">Cadastrar usuário</button>
							
                            </div>
						</form>
						
						<main class="py-4">
							@yield('content')
						</main>
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
	<script src="assets/vendor/jquery/jquery.min.js"></script>
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
	<script src="{{ asset('jquery-validation/dist/jquery.validate.min.js')}}"></script>
	<script src="{{ asset('jquery-validation/dist/jquery.validate.js')}}"></script>
	<script>

	function marcardesmarcar(){
		$('input').each(
			function(){
				if ($("input").prop( "checked"))
				$(this).attr("checked", false);
				else $(this).attr("checked", true);            
			}
		);
	}

	$('form#form').validate({
		rules: {
			email: {
				required: true
			},
			name: {
				required: true
			},
			password: {
				required: true
			},
			telefone: {
				required: true
			},
		}
	})

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
