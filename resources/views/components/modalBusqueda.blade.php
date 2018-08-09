<?php
if (!isset($attributes['id'])){
	$attributes['id'] = 'modalTablaBusqueda';
}

if (!isset($attributes['idTabla'])){
	$attributes['idTabla'] = 'tabla';
}

if (!isset($attributes['titulo'])){
	$attributes['titulo'] = 'Buscar';
}

if (!is_array($value)){
	$value = [];
}

$controller = app('Modules\Admin\Http\Controllers\Controller');
?>
<div id="{{ $attributes['id'] }}" class="modal modal-busqueda fade" tabindex="-1" role="dialog">
	<div class="modal-dialog container">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title">{{ $attributes['titulo'] }}
				<!-- Single button -->
				<div class="btn-group btn-datatable" style="float: left; margin-right: 10px">
					<button type="button" class="btn btn-primary dropdown-toggle btn-sm" aria-haspopup="true" aria-expanded="false">
						Acciones <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						@if ($controller->permisologia($controller->ruta() . '/restaurar') || $controller->permisologia($controller->ruta() . '/destruir'))
							<li class="dropdown-header">Registros Eliminados</li>

							<li data-re="1">
								<a href="#">
									<i class="fa fa-eye" aria-hidden="true"></i> 
									Ver Registros Eliminados 
									<i class="check" aria-hidden="true"></i>
								</a>
							</li>

							<li data-sre="1">
								<a href="#">
									<i class="fa fa-eye" aria-hidden="true"></i> 
									Ver Solo Registros Eliminados 
									<i class="check" aria-hidden="true"></i>
								</a>
							</li>
							
							<li role="separator" class="divider"></li>
						@endif
						<li data-vfc="1">
							<a href="#">
								<i class="fa fa-search" aria-hidden="true"></i> 
								Ver filtros por Comluna
								<i class="fa fa-check check" aria-hidden="true"></i>
							</a>
						</li>
						
						<li role="separator" class="divider"></li>

						<li class="dropdown-header">Visualizar Columnas</li>
						@foreach($value as $columna => $ancho)
						<li data-column="{{ $loop->iteration - 1 }}">
							<a href="#">
								{{ $columna }}
								<i class="fa fa-check check" aria-hidden="true"></i>
							</a>
						</li>
						@endforeach
					</ul>
				</div>
				</h4>
			</div>
			<div class="modal-body">
				<table id="{{ $attributes['idTabla'] }}" class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							@foreach($value as $columna => $ancho)
							<th style="width: {{ $ancho }}%;">{{ $columna }}</th>
							@endforeach
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot>
						<tr>
							@foreach($value as $columna => $ancho)
							<th style="width: {{ $ancho }}%;">{{ $columna }}</th>
							@endforeach
						</tr>
					</tfoot>
				</table>
			</div>
			<!--<div class="modal-footer">
				<button type="button" class="btn blue" data-dismiss="modal">Cerrar</button>
			</div>-->
		</div>
	</div>
</div>