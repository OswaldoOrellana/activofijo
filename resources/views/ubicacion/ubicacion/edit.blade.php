@extends('layouts.principal')
@section('contenido')
    <div class="form-row col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Ubicacion {{$ubicacion->Nombre}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>                
            @endif
    </div>
            <!--si es Patch entra al edit-->
            {!!Form::model($ubicacion,['method'=>'PATCH','route'=>['ubicacion.update',$ubicacion->Codubicacion]])!!}
            {{Form::token()}}
            <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">
            
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                                <label for="edificio">Edificio</label>
                                <input type="text" name="nombre" required value="{{$ubicacion->Edificio}}" class="form-control" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Ciudad</label>
                            <input type="text" name="ciudad" required value="{{$ubicacion->Ciudad}}" class="form-control" >

                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="pais">Pais</label>
                            <input type="text" value="{{$ubicacion->Pais}}" name="pais" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-danger">Cancelar</button>
                </div>
            
            {!!Form::close()!!}
@endsection