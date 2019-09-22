@extends('layouts.principal')
@section('contenido')


    <!--<div class="box">
            <div class="box-header with-border">-->
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Listado de Areas
                            <a href="departamento/create"><button type="button" class="btn btn-success">Nuevo</button></a>
                        </h3>
                        @include('ubicacion.dpto.search')
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
                                <th>Descripcion</th>
                                <th>Edificio</th>
                                <th>Ciudad</th>
                                <th>Pais</th>
                            </thead>
                            @foreach($departamento as $dpto)
                            <tr>
                                <td>{{$dpto->CodDepartamento}}</td>
                                <td>{{$dpto->Descripcion}} </td>
                                <td>{{$dpto->edificio}} </td>
                                <td>{{$dpto->ciudad}} </td>
                                <td>{{$dpto->pais}} </td>
                                
                                <td>
                                    <a href="{{URL::action('DepartamentoController@edit',$dpto->CodDepartamento)}}"><button class="btn btn-info" > Editar</button></a>
                                    <a href="" data-target="#modal-delete-{{$dpto->CodDepartamento}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
                                </td>
                            </tr>  
                            @include('ubicacion.dpto.modal') 
                            @endforeach
                        </table>
                    </div>
                    {{$departamento->render()}}
                <!--</div>
            </div>-->
            <!-- /.box-body -->
            
            
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
@endsection