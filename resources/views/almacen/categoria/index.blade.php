@extends('layouts.principal')
@section('contenido')


    <!--<div class="box">
            <div class="box-header with-border">-->
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Listado de Categoria
                            <a href="categoria/create"><button type="button" class="btn btn-success">Nuevo</button></a>
                        </h3>
                        @include('almacen.categoria.search')
                </div>
    
              <!--<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>-->
            </div>
            <div class="box-body">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Rubro</th>
                                <th>Opciones</th>
                            </thead>
                            @foreach($categoria as $ca)
                            <tr>
                                <td>{{$ca->CodCategoria}}</td>
                                <td>{{$ca->Nombre}} </td>
                                <td>{{$ca->Descripcion}} </td>
                                <td>{{$ca->rubro}} </td>
                                
                                <td>
                                    <a href="{{URL::action('CategoriaController@edit',$ca->CodCategoria)}}"><button class="btn btn-info" > Editar</button></a>
                                    <a href="" data-target="#modal-delete-{{$ca->CodCategoria}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
                                </td>
                            </tr>  
                            @include('almacen.categoria.modal') 
                            @endforeach
                        </table>
                    </div>
                    {{$categoria->render()}}
                <!--</div>
            </div>-->
            <!-- /.box-body -->
            
            
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
@endsection