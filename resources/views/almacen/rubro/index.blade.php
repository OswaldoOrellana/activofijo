@extends('layouts.principal')
@section('contenido')
<!--<div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Rubro 
                <a href="rubro/create"><button>Nuevo</button></a>
            </h3>
            @include('almacen.rubro.search')
        </div>
</div>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach($rubro as $ru)
                    <tr>
                        <td>{{$ru->CodRubro}}</td>
                        <td>{{$ru->Descripcion}}</td>
                        <td>
                            <a href=""><button class="btn btn-info"> Editar</button></a>
                            <a href=""><button class="btn btn-danger"> Eliminar</button></a>
                        </td>
                    </tr>   
                    @endforeach
                </table>
            </div>
            {{$rubro->render()}}
        </div>
    </div>-->


    <!--<div class="box">
            <div class="box-header with-border">-->
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3>Listado de Rubro 
                            <a href="rubro/create"><button type="button" class="btn btn-success">Nuevo</button></a>
                        </h3>
                        @include('almacen.rubro.search')
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
                                <th>Vida util</th>
                                <th>Coeficiente</th>
                                <th>Depreciacion</th>
                                <th>Actualizacion</th>
                                <th>Opciones</th>
                            </thead>
                            @foreach($rubro as $ru)
                            <tr>
                                <td>{{$ru->CodRubro}}</td>
                                <td>{{$ru->Descripcion}} </td>
                                <td>{{$ru->vidautil}} años </td>
                                <td>{{$ru->coeficiente}} %</td>
                                @if ($ru->deprecia == 1)
                                <td> V </td>    
                                @else
                                <td> F </td>
                                @endif
                                @if ($ru->actualiza)
                                <td> V </td>
                                @else
                                <td> F </td>
                                @endif
                                
                                <td>
                                    <a href="{{URL::action('RubroController@edit',$ru->CodRubro)}}"><button class="btn btn-info" > Editar</button></a>
                                    <a href="" data-target="#modal-delete-{{$ru->CodRubro}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
                                </td>
                            </tr>  
                            @include('almacen.rubro.modal') 
                            @endforeach
                        </table>
                    </div>
                    {{$rubro->render()}}
                <!--</div>
            </div>-->
            <!-- /.box-body -->
            
            
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
@endsection