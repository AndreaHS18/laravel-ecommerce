<!DOCTYPE html>
<html lang="en">

<style type="text/css">
	.primeraFila {
		background-color: #4DAAD5;
		border: 1px solid white;
	}

	.encabezado {
		border: 1px solid white;
	}

	.primerFila {
		padding: 20px;
	}

	.filas {
		background-color: grey;
		border-bottom: 1px solid gray;
	}

	.contenedorTabla {
		padding-bottom: 30px;
	}
</style>

<head>

	@include('admin.css')

</head>

<body>

	@include('admin.sidebar')
	<!-- partial -->
	<div class="container-fluid page-body-wrapper">

		@include('admin.navbar')

		<!-- partial -->
		<div class="container-fluid page-body-wrapper contenedorTabla">
			<div class="container" align="center">

				@if(session()->has('message'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					{{session()->get('message')}}
				</div>
				@endif

				<table>
					<tr class="primeraFila">
						<td class="primerFila encabezado">ID del producto</td>
						<td class="primerFila encabezado">Nombre</td>
						<td class="primerFila encabezado">Descripción</td>
						<td class="primerFila encabezado">Cantidad</td>
						<td class="primerFila encabezado">Precio</td>
						<td class="primerFila encabezado">Imagen</td>
						<td class="primerFila encabezado"></td>
						<td class="primerFila encabezado"></td>
					</tr>
					@foreach($data as $producto)
					<tr class="filas" align="center">
						<td>{{$producto->id}}</td>
						<td>{{$producto->title}}</td>
						<td>{{$producto->description}}</td>
						<td>{{$producto->quantity}}</td>
						<td>{{$producto->price}}</td>
						<td><img height="100" width="100" src="{{asset('imagenes/'.$producto->image)}}" alt="Imagen del producto"></td>
						<td>
							<a class="btn btn-primary" href="{{url('updateView',$producto->id)}}">Actualizar</a>
						</td>
						<td>
							<a class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar el producto?')" href="{{url('deleteProduct',$producto->id)}}">Eliminar</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>

		<!-- partial -->

		@include('admin.script')

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>