
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{asset('images/imagotipo.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/ventas/style.css') }}" />
    @if (isset($html['css']))
		@foreach ($html['css'] as $css)
			<link rel="stylesheet" type="text/css" href="{{ url($css) }}" />
		@endforeach
	@endif
    <title>Document</title>
</head>
<body>
	@include('ventas::partials.menu')
    <section style="position:relative">
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="container">
					<div class="page-content-inner">
						<div class="row">
							<div class="col-md-12 page-404">
								<h1 class="number font-green text-center"> 404 </h1>
								<div class="details text-center">
									<h3>No Encontramos lo Solicitado.</h3>
									<p>
										No podemos encontrar la p&aacute;gina que est&aacute; buscando.
										<br />
										<a href="{{ url(\Config::get('admin.prefix')) }}"> Regresa a Inicio </a> o prueba con la barra de men&uacute;.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('ventas::partials.footer')
	<script src="{{asset('public/js/jquery.js')}}"></script>
	@stack('js')
</body>
</html>
