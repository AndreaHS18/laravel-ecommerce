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
</head>

<body>

  @include('user.navBar')


  <div class="container" style="padding-top: 100px;">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Todos los productos</h2>

        </div>
      </div>

      @foreach($data as $producto)
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="{{asset('imagenes/'.$producto->image)}}" alt="Imagen del producto"></a>
          <div class="down-content">
            <a href="#">
              <h4>{{$producto->title}}</h4>
            </a>
            <h6>${{$producto->price}}</h6>
            <p>{{$producto->description}}</p>

            <form action="{{url('addCart',$producto->id)}}" method="post">
              @csrf
              <input type="number" value="1" min="1" class="form-control" style="width:100px;" name="quantity">
              <br>
              <button type="submit" style="border-color:white;">
                <a class="btn btn-primary">Añadir al carrito</a>
              </button>
            </form>

          </div>
        </div>
      </div>
      @endforeach
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