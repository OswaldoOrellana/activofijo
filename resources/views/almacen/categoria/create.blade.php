@extends('layouts.principal')
@section('contenido')
    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Registrar Tipo de Bien</h3>
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
    
    {!!Form::open(array('url'=>'almacen/categoria','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">
            
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                    <label for="nombre">Nombre de la categoria del Bien</label>
                    <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Rubro</label>
                <select name="codrubro" class="form-control">
                    @foreach ($rubro as $ru)
                        <option value="{{$ru->CodRubro}}">{{$ru->Descripcion}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" value="{{old('nombre')}}" name="descripcion" class="form-control" placeholder="Descripcion de la categoria">
            </div>
        </div>
    </div>
    <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
    </div>

    {!!Form::close()!!}
@endsection