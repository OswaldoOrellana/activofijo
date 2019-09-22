@extends('layouts.principal')
@section('contenido')
    <div class="form-row col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Categoria {{$categoria->Nombre}}</h3>
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
            {!!Form::model($categoria,['method'=>'PATCH','route'=>['categoria.update',$categoria->CodCategoria]])!!}
            {{Form::token()}}
            <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">
            
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                                <label for="nombre">Nombre de la categoria del Bien</label>
                                <input type="text" name="nombre" required value="{{$categoria->Nombre}}" class="form-control" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Rubro</label>
                            <select name="codrubro" class="form-control">
                                @foreach ($rubro as $ru)
                                    @if ($ru->CodRubro == $categoria->CodRubro){
                                        <option value="{{$ru->CodRubro}}" selected>{{$ru->Descripcion}} </option>
                                    @else
                                        <option value="{{$ru->CodRubro}}">{{$ru->Descripcion}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" value="{{$categoria->Descripcion}}" name="descripcion" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-danger">Cancelar</button>
                </div>
            
            {!!Form::close()!!}
@endsection