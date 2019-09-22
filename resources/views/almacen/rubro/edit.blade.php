@extends('layouts.principal')
@section('contenido')
    <div class="form-row col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Rubro {{$rubro->Descripcion}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>                
            @endif
            <!--si es Patch entra al edit-->
            {!!Form::model($rubro,['method'=>'PATCH','route'=>['rubro.update',$rubro->CodRubro]])!!}
            {{Form::token()}}
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="descripcion">Nombre del Rubro</label>
                <input type="text" name="descripcion" class="form-control" value="{{$rubro->Descripcion}}" placeholder="Nombre...">
            </div>

            <div class="form-group  col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="vidautil">Vida Util (años)</label>
                <input type="number" class="form-control" name="vidautil" value="{{$rubro->vidautil}}" >
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!--<label for="coeficiente">Coeficiente (% en año)</label>
                    <input type="text" class="form-control" name="coeficiente" disabled>-->
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                    <div class="form-check form-check-inline col-md-3">
                        <!--<input class="form-check-input" type="checkbox" name="deprecia">-->

                        {{Form::checkbox('deprecia','1', ($rubro->deprecia==1)?true:false)}}
                        <label class="form-check-label" for="deprecia">
                        <h4>Deprecia</h4>
                        </label>
                    </div>
                    <div class="form-check form-check-inline col-md-9">
                        <!--<input class="form-check-input" type="checkbox" name="actualiza">-->
                        {{Form::checkbox('actualiza','1', ($rubro->actualiza==1)?true:false)}}
                        <label class="form-check-label" for="actualiza">
                             <h4>Actualiza</h4>
                        </label>
                    </div>
            </div>

            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
            {!!Form::close()!!}
    </div>
@endsection