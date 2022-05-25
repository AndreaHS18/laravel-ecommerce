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
    .title {
      color: white;
      padding-top: 25px;
      font-size: 25px
    }

    .div-name {
      padding: 15px;
    }

    label {
      display: inline-block;
      width: 200px;
    }

    .txt {
      color: black;
    }

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
      background-color: white;
      border-bottom: 1px solid gray;
      color: black;
    }

    .contenedorTabla {
      padding-bottom: 30px;
    }
  </style>

</head>

<body>

  @include('user.navBar')

  <div class="container" style="padding-top: 150px;">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Información</h2>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          {{session()->get('message')}}
        </div>
        @endif

        <form action="{{url('updateInfo2',Auth::user()->id)}}" method="post" enctype="multipart/form-data">

          @csrf

          <div class="div-name">
            <label>Nombre</label>
            <input class="txt" type="text" name="title" value="{{Auth::user()->name}}" disabled="">
          </div>

          <div class="div-name">
            <label>Correo</label>
            <input class="txt" type="text" name="price" value="{{Auth::user()->email}}" disabled="">
          </div>

          <div class="div-name">
            <label>Teléfono</label>
            <input class="txt" type="text" name="des" value="{{Auth::user()->phone}}" disabled="">
          </div>

          <div class="div-name">
            <label>Dirección</label>
            <input class="txt" type="text" name="quantity" value="{{Auth::user()->address}}" disabled="">
          </div>
        </form>
        <button class="btn btn-primary">
          <a href="{{url('updateInfo',Auth::user()->id)}}">MODIFICAR INFORMACIÓN</a>
        </button>
        <button class="btn btn-primary">
          <a href="#">CAMBIAR CONTRASEÑA</a>
        </button>
      </div>
    </div>
  </div>

  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Pedidos</h2>
          </div>
        </div>
        <table>
          <tr class="primeraFila">
            <td class="primerFila encabezado">Nombre</td>
            <td class="primerFila encabezado">Descripción</td>
            <td class="primerFila encabezado">Cantidad</td>
            <td class="primerFila encabezado">Precio</td>
            <td class="primerFila encabezado">Imagen</td>
          </tr>
          @foreach($data as $producto)
          <tr class="filas" align="center">
            <td>{{$producto->title}}</td>
            <td>{{$producto->description}}</td>
            <td>{{$producto->quantity}}</td>
            <td>{{$producto->price}}</td>
            <td><img height="100" width="100" src="{{asset('imagenes/'.$producto->image)}}"></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright &copy; 2022 Quick ICE SLP, MX. - Design: Andrea Hernández Sierra</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

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