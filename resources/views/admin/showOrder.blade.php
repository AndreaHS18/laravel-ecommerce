<!DOCTYPE html>
<html lang="en">

<head>

  @include('admin.css')

  <style type="text/css">
    .primeraFila {
      background-color: grey;
      border: 1px solid white;
    }

    .encabezado {
      border: 1px solid white;
    }

    .primerFila {
      padding: 20px;
    }

    .filas {
      background-color: black;
      border-bottom: 1px solid gray;
    }
  </style>

</head>

<body>

  @include('admin.sidebar')
  <div class="container-fluid page-body-wrapper">

    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
      <div class="container" align="center">
        <table>
          <tr class="primeraFila" align="center">
            <td class="primerFila encabezado">Nombre del usuario</td>
            <td class="primerFila encabezado">Teléfono del usuario</td>
            <td class="primerFila encabezado">Dirección del usuario</td>
            <td class="primerFila encabezado">Nombre del producto</td>
            <td class="primerFila encabezado">Precio del producto</td>
            <td class="primerFila encabezado">Cantidad del producto</td>
            <td class="primerFila encabezado">Status del producto</td>
            <td class="primerFila encabezado"></td>
          </tr>

          @foreach($order as $ordenes)
          <tr align="center" class="filas">
            <td class="primerFila">{{$ordenes->name}}</td>
            <td class="primerFila">{{$ordenes->phone}}</td>
            <td class="primerFila">{{$ordenes->address}}</td>
            <td class="primerFila">{{$ordenes->productTitle}}</td>
            <td class="primerFila">{{$ordenes->price}}</td>
            <td class="primerFila">{{$ordenes->quantity}}</td>
            <td class="primerFila">{{$ordenes->status}}</td>
            <td class="primerFila">
              <a class="btn btn-success" href="{{url('updateStatus',$ordenes->id)}}">Entregado</a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>

    @include('admin.script')

</body>

</html>