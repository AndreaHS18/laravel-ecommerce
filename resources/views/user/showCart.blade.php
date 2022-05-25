<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/f3be05ef5f.js" crossorigin="anonymous"></script>

  <title>QuickICE</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
  <link rel="stylesheet" href="assets/css/owl.css">

  <style type="text/css">
    .primeraFila {
      color: white;
      padding: 10px;
      font-size: 20px;
    }

    .columnas {
      background-color: #4DAAD5;
    }

    .productos {
      background-color: #eee;
    }

    .producto {
      padding: 10px;
      color: black;
      text-align: center;
    }

    .boton {
      margin-top: 30px;
    }
  </style>

</head>

<body>

  @include('user.navBar')

  <div class="container" style="padding-top: 100px;">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Tu carrito</h2>
        </div>
      </div>

      <div align="center">
        <table>
          <tr class="columnas">
            <td class="primeraFila">Nombre del producto</td>
            <td class="primeraFila">Cantidad</td>
            <td class="primeraFila">Precio</td>
            <td class="primeraFila"></td>
          </tr>

          <form action="{{url('confirmOrden')}}" method="POST">
            @csrf
            @foreach($cart as $carrito)
            <tr class="productos">
              <td class="producto">
                <input type="text" name="productTitle[]" value="{{$carrito->productTitle}}" hidden="">
                {{$carrito->productTitle}}
              </td>
              <td class="producto">
                <input type="text" name="quantity[]" value="{{$carrito->quantity}}" hidden="">
                {{$carrito->quantity}}
              </td>
              <td class="producto">
                <input type="text" name="price[]" value="{{$carrito->price}}" hidden="">
                {{$carrito->price}}
              </td>
              <td class="producto">
                <a class="btn btn-danger" href="{{url('deleteProductCart',$carrito->id)}}">Eliminar</a>
              </td>
            </tr>
            @endforeach
        </table>
        <!-- <button class="btn btn-success" formaction="{{url('pdf',$cart)}}">Confirmar orden</button> -->
        <button class="btn btn-success boton">Confirmar orden</button>
        <button class="btn btn-primary boton">
          <a href="{{url('pdf',Auth::user()->id)}}">Imprimir comprobante</a>
        </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/slick.js"></script>
  <script src="assets/js/isotope.js"></script>
  <script src="assets/js/accordions.js"></script>


  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
      if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>
</body>

</html>