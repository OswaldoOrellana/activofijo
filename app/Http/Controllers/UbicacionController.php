<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Requests\UbicacionFormRequest;
use activofijo\Ubicacion;

class UbicacionController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $ubicacion=DB::table('Ubicacion')->where('Edificio','LIKE','%'.$query.'%')
            ->orderBy('CodUbicacion','asc')
            ->paginate(10);
            return view('ubicacion.ubicacion.index',["ubicacion"=>$ubicacion,"searchText"=>$query]);
        }
    }
    public function create(){
        return view("ubicacion.ubicacion.create");
    }
    public function store(UbicacionFormRequest $request){

        $edificio = strtoupper($request->get('edificio'));
        $ciudad = strtoupper($request->get('ciudad'));
        $pais = strtoupper($request->get('pais'));
        $ubicacion = new Ubicacion;
        $ubicacion->Edificio = $edificio;
        $ubicacion->Ciudad = $ciudad;
        $ubicacion->Pais = $pais;
        $ubicacion->save();
        return Redirect::to("ubicacion/ubicacion");
    }
    public function show($id){
        return view("ubicacion.ubicacion.show",["ubicacion"=>Ubicacion::findOrFail($id)]);
    }
    public function edit($id){
        return view("ubicacion.ubicacion.edit",["ubicacion"=>Ubicacion::findOrFail($id)]);
    }
    public function update(RubroFormRequest $request,$id){
        $edificio = strtoupper($request->get('edificio'));
        $ciudad = strtoupper($request->get('ciudad'));
        $pais = strtoupper($request->get('pais'));
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->Edificio = $edificio;
        $ubicacion->Ciudad = $ciudad;
        $ubicacion->Pais = $pais;
        $ubicacion->update();
        return Redirect::to('ubicacion/ubicacion');
    }
    public function destroy($id){
        $rubro = Ubicacion::where('CodUbicacion','=',$id)->first();
        $rubro->delete();
        return Redirect::to('ubicacion/ubicacion');
    }
}
