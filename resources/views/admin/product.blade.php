<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')

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
  </style>
</head>

<body>
  @include('admin.sidebar')
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">

    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="container" align="center">
        <h1 class="title">Añadir producto</h1>

        @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          {{session()->get('message')}}
        </div>
        @endif

        <form action="{{url('uploadProduct')}}" method="post" enctype="multipart/form-data">

          @csrf

          <div class="div-name">
            <label>Nombre del producto</label>
            <input class="txt" type="text" name="title" placeholder="Nombre del producto" required="">
          </div>

          <div class="div-name">
            <label>Precio del producto</label>
            <input class="txt" type="number" name="price" placeholder="Precio del producto" required="" min="0">
          </div>

          <div class="div-name">
            <label>Descripción del producto</label>
            <input class="txt" type="text" name="des" placeholder="Descripción del producto" required="">
          </div>

          <div class="div-name">
            <label>Cantidad del producto</label>
            <input class="txt" type="number" name="quantity" placeholder="Cantidad del producto" required="" min="0">
          </div>

          <div class="div-name">
            <input type="file" name="file">
          </div>

          <div class="div-name">
            <input class="btn btn-success" type="submit">
          </div>
        </form>
      </div>
    </div>

    <!-- partial -->

    @include('admin.script')

</body>

</html>