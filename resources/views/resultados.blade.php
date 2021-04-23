@extends('layouts.app')

@section('content')
<div class="container">


    <h1 class="text-center"> <i class="fas fa-filter"></i> Resultados del filtro <i class="fas fa-filter"></i></h1>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"><strong>Resultados Obtenidos:</strong></h4>
        <p>
           Cantidad de registros Obtenidos {{$Cantidad}}
           <br>
           @foreach($informacionCategoria as $cat)
        <strong>Codigo Categoria: </strong>   {{$cat->id_categoria}}    
         <br>
        <strong>Nombre Categoria: </strong>  {{$cat->nombre}}
           @endforeach
        </p>
      </div>


    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Palabra</th>
          </tr>
        </thead>
        <tbody>
            @foreach($resultado as $rs)
          <tr>
            <td>{{$rs->nombre}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
       
    <div class="d-flex justify-content-center">

    <div class="row my-5">
        <a type="button" class="btn btn-info text-white"  href="/home"> <i class="fas fa-undo"></i> Volver</a>

    </div>
   </div>

</div>
@endsection
