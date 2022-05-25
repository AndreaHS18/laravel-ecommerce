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
      padding-top: 3px;
    }

    label {
      display: inline-block;
      width: 200px;
      font-weight: bold;
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

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h1 style="color:black;">Quick <span style="color:#5DC4F3;">ICE</span></h1>
        </div>
      </div>

      <div>
        <p>Hola, {{Auth::user()->name}}, tu orden ha sido registrada exitosamente.</p>
        <p>Pronto entregaremos tu pedido.</p>
      </div>


      <div style="width: 300px; border:1px solid black; border-radius:4px; padding:10px;">
        <div class="div-name">
          <label>Nombre</label>
          <p class="txt" type="text" name="title" disabled="">{{Auth::user()->name}}</p>
        </div>

        <div class="div-name">
          <label>Correo</label>
          <p class="txt" type="text" name="price" value="" disabled="">{{Auth::user()->email}}</p>
        </div>

        <div class="div-name">
          <label>Teléfono</label>
          <p class="txt" type="text" name="des" value="" disabled="">{{Auth::user()->phone}}</p>
        </div>

        <div class="div-name">
          <label>Dirección</label>
          <p class="txt" type="text" name="quantity" value="" disabled="">{{Auth::user()->address}}</p>
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