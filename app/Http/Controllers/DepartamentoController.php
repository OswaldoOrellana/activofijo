<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Requests\DepartamentoFormRequest;
use activofijo\Departamento;

class DepartamentoController extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $dpto=DB::table('Departamento as d')
            ->join('ubicacion as u','u.CodUbicacion','=','d.CodUbicacion')
            ->select('d.CodDepartamento','d.Descripcion','u.Edificio as edificio','u.Ciudad as ciudad','u.Pais as pais')
            ->where('d.Descripcion','LIKE','%'.$query.'%')
            ->orwhere('u.Edificio','LIKE','%'.$query.'%')
            ->orderBy('d.CodDepartamento','asc')
            ->paginate(10);
            return view('ubicacion.dpto.index',["departamento"=>$dpto,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $ubicacion=DB::table('ubicacion')->get();
        return view("ubicacion.dpto.create",["ubicacion"=>$ubicacion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoFormRequest $request)
    {   
        $count = DB::table('departamento')->count();
        $mayuscula = strtoupper($request->get('descripcion'));
        $dpto = new Departamento;
        $dpto->CodDepartamento = $count+1;
        $dpto->Descripcion = $mayuscula;
        $dpto->CodUbicacion = $request->get('codubicacion');
        $dpto->save();
        return Redirect::to("ubicacion/departamento");
        //dd($request->all());
    }

 
    public function show($id)
    {
        return view("ubicacion.dpto.show",["dpto"=>Departamento::findOrFail($id)]);
    }

   
    public function edit($id)
    {
        $dpto = Departamento::findOrFail($id);
        $ubicacion=DB::table('Ubicacion')->get();
        return view("ubicacion.dpto.edit",["departamento"=>$dpto,"ubicacion"=>$ubicacion]);
    }

    
    public function update(DepartamentoFormRequest $request, $id)
    {
        $dpto = Departamento::findOrFail($id);
        $mayuscula = strtoupper($request->get('descripcion'));
        $dpto->Descripcion = $mayuscula;
        $dpto->CodUbicacion = $request->get('codubicacion');
        $dpto->update();
        return Redirect::to('ubicacion/departamento');
    }

    
    public function destroy($id)
    {
        $dpto = Departamento::where('CodDepartamento','=',$id)->first();
        $dpto->delete();
        return Redirect::to('ubicacion/departamento');
    }
}
