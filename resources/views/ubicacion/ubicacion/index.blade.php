@extends('layouts.principal')
@section('contenido')

    <!--<div class="box">
            <div class="box-header with-border">-->
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Mis Ubicaciones
                            <a href="ubicacion/create"><button type="button" class="btn btn-success">Nuevo</button></a>
                        </h3>
                        @include('ubicacion.ubicacion.search')
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
                                <th>Edificio</th>
                                <th>Ciudad</th>
                                <th>Pais</th>
                                <th>Opciones</th>
                            </thead>
                            @foreach($ubicacion as $ubi)
                            <tr>
                                <td>{{$ubi->CodUbicacion}}</td>
                                <td>{{$ubi->Edificio}} </td>
                                <td>{{$ubi->Ciudad}} </td>
                                <td>{{$ubi->Pais}} </td>                                
                                <td>
                                    <a href="{{URL::action('UbicacionController@edit',$ubi->CodUbicacion)}}"><button class="btn btn-info" > Editar</button></a>
                                    <a href="" data-target="#modal-delete-{{$ubi->CodUbicacion}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
                                </td>
                            </tr>  
                            @include('ubicacion.ubicacion.modal') 
                            @endforeach
                        </table>
                    </div>
                    {{$ubicacion->render()}}
                <!--</div>
            </div>-->
            <!-- /.box-body -->
            
            
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
@endsection