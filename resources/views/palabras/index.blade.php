@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card mt-3">
        <div class="card-header bg-primary"><h3 class="text-white">  Gestion de Palabras</h3>
            <div class="float-right">
                <a type="button" class="btn btn-info text-white"  href="/home"> <i class="fas fa-undo"></i> Volver</a>
                
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-user-plus"></i>
                  Crear Palabra
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    <div class="text-white">  <i class="fas fa-user-plus"></i> Registrar Palabra</div>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                
                            </div>

                            
                            <div class="modal-body">

                                <form action="/gestionpalabras" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Identificacion</label>
                                        <input type="number" class="form-control" id="id_palabra" name="id_palabra"  placeholder="Ingrese la identificacion..." >
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre..." required >
                                    </div>

                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <select id="id_categoria" name="id_categoria" class="form-control" >
                                            @foreach($Categoria as $Comp)
                                            <option value="{{$Comp->id_categoria}}">
                                              (Cod. {{$Comp->id_categoria}})  {{$Comp->nombre}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" >Registrar Punto de Venta</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="PointTable">
                    <thead>
                    <tr>
                        <th>Codigo Palabra</th>
                        <th>palabra</th>
                        <th>Codigo Categoria</th>
                        <th>Nombre Categoria</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($palabras as $pt)
                        <tr>
                        <td>{{$pt->id_palabra}}</td>
                        <td>{{$pt->nombre}}</td>
                        <td>{{$pt->id_categoria}}</td>
                        <td>{{$pt->NombreCategoria}}</td>  
                        <td>
                            <button class="btn btn-primary "  data-toggle="modal" data-target="#myModalEdit{{$pt->id_palabra}}"><i class="fas fa-edit text-white"></i></button>
                          
                            <form method="POST" action="{{ url("gestionpalabras/{$pt->id_palabra}") }}">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-danger "><i class="fas fa-trash text-white"></i></button>   
                        </form>
                        </td>

                


                            <div class="modal fade" id="myModalEdit{{$pt->id_palabra}}">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title text-center ">Editar Palabra:  {{$pt->nombre}} </h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                      <form action="{{route('gestionpalabras.update',$pt->id_palabra)}}" method="POST">
                                        @method('PATCH')
                                        @csrf

                    
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Identificacion</label>
                                            <input type="text" class="form-control" id="id_palabra" name="id_palabra"  placeholder="Ingrese la identificacion..." value="{{$pt->id_palabra}}" disabled>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre..." required value="{{$pt->nombre}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select id="id_categoria" name="id_categoria" class="form-control" >
                                                @foreach($Categoria as $Comp)
                                                <option value="{{$Comp->id_categoria}}">
                                                  (Cod. {{$Comp->id_categoria}})  {{$Comp->nombre}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
    

                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-dark"><i class="fas fa-save text-white"></i>Actualizar</button>
                                    </div>
                                  </form>
                                  </div>
                                </div>
                              </div>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    </div>

@endsection

