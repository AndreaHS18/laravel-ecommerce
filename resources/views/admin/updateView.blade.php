<!DOCTYPE html>
<html lang="en">

<head>

  <base href="/public">

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

  @include('admin.css')

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

        <form action="{{url('updateProduct',$data->id)}}" method="post" enctype="multipart/form-data">

          @csrf

          <div class="div-name">
            <label>Nombre del producto</label>
            <input class="txt" type="text" name="title" value="{{$data->title}}" required="">
          </div>

          <div class="div-name">
            <label>Precio del producto</label>
            <input class="txt" type="number" name="price" value="{{$data->price}}" required="" min="0">
          </div>

          <div class="div-name">
            <label>Descripción del producto</label>
            <input class="txt" type="text" name="des" value="{{$data->description}}" required="">
          </div>

          <div class="div-name">
            <label>Cantidad del producto</label>
            <input class="txt" type="number" name="quantity" value="{{$data->quantity}}" required="" min="0">
          </div>

          <div class="div-name">
            <label>Imagen actual</label>
            <img height="100" width="100" src="/productImage/{{$data->image}}">
          </div>

          <div class="div-name">
            <label>Cambiar imagen</label>
            <input type="file" name="file">
          </div>

          <div class="div-name">
            <input class="btn btn-success" type="submit" value="ACTUALIZAR">
          </div>
        </form>
      </div>
    </div>

    <!-- partial -->

    @include('admin.script')

</body>

</html>