<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Requests\RubroFormRequest;
use activofijo\Rubro;

class RubroController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $rubro=DB::table('Rubro')->where('descripcion','LIKE','%'.$query.'%')
            ->orderBy('CodRubro','asc')
            ->paginate(10);
            return view('almacen.rubro.index',["rubro"=>$rubro,"searchText"=>$query]);
        }
    }
    public function create(){
        return view("almacen.rubro.create");
    }
    public function store(RubroFormRequest $request){

        $mayuscula = strtoupper($request->get('descripcion'));
        $rubro = new rubro;
        $rubro->Descripcion = $mayuscula;
        $rubro->vidautil = $request->get('vidautil');
        $coeficiente = (100) / $request->get('vidautil');
        $rubro->coeficiente = $coeficiente;        
        if($request->get('deprecia') != ""){
            $rubro->deprecia = $request->get('deprecia');
        }else{
            $rubro->deprecia = 0;
        }

        if($request->get('actualiza') != ""){
            $rubro->actualiza = $request->get('actualiza');
        }else{
            $rubro->actualiza = 0;
        }
        $rubro->save();
        return Redirect::to("almacen/rubro");
    }
    public function show($id){
        return view("almacen.rubro.show",["rubro"=>Rubro::findOrFail($id)]);
    }
    public function edit($id){
        return view("almacen.rubro.edit",["rubro"=>Rubro::findOrFail($id)]);
    }
    public function update(RubroFormRequest $request,$id){
        $rubro = Rubro::findOrFail($id);
        $mayuscula = strtoupper($request->get('descripcion'));
        $rubro->Descripcion = $mayuscula;
        $rubro->vidautil = $request->get('vidautil');
        $coeficiente = (100) / $request->get('vidautil');
        $rubro->coeficiente = $coeficiente;        
        if($request->get('deprecia') != ""){
            $rubro->deprecia = $request->get('deprecia');
        }else{
            $rubro->deprecia = 0;
        }
        if($request->get('actualiza') != ""){
            $rubro->actualiza = $request->get('actualiza');
        }else{
            $rubro->actualiza = 0;
        }
        $rubro->update();
        return Redirect::to('almacen/rubro');
    }
    public function destroy($id){
        $rubro = Rubro::where('CodRubro','=',$id)->first();
        $rubro->delete();
        return Redirect::to('almacen/rubro');
    }
}
