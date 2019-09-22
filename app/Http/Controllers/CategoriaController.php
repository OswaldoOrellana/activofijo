<?php

namespace activofijo\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use activofijo\Categoria;
use Illuminate\Support\Facades\Redirect;
use activofijo\Http\Requests\CategoriaFormRequest;

class CategoriaController extends Controller
{

    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $categoria=DB::table('categoria as c')
            ->join('rubro as r','r.CodRubro','=','c.CodRubro')
            ->select('c.CodCategoria','c.Nombre','c.Descripcion','r.Descripcion as rubro')
            ->where('c.Nombre','LIKE','%'.$query.'%')
            ->orwhere('r.Descripcion','LIKE','%'.$query.'%')
            ->orderBy('c.CodCategoria','asc')
            ->paginate(10);
            return view('almacen.categoria.index',["categoria"=>$categoria,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $rubro=DB::table('Rubro')->get();
        return view("almacen.categoria.create",["rubro"=>$rubro]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaFormRequest $request)
    {   
        
        $mayuscula = strtoupper($request->get('nombre'));
        $categoria = new Categoria;
        $categoria->Nombre = $mayuscula;
        $categoria->Descripcion = $request->get('descripcion');
        $categoria->CodRubro = $request->get('codrubro');
        $categoria->save();
        return Redirect::to("almacen/categoria");
        //dd($request->all());
    }

 
    public function show($id)
    {
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }

   
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $rubro=DB::table('Rubro')->get();
        return view("almacen.categoria.edit",["categoria"=>$categoria,"rubro"=>$rubro]);
    }

    
    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $mayuscula = strtoupper($request->get('nombre'));
        $categoria->Nombre = $mayuscula;
        $categoria->CodRubro = $request->get('codrubro');
        $categoria->Descripcion = $request->get('descripcion');
        
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }

    
    public function destroy($id)
    {
        $categoria = Categoria::where('CodCategoria','=',$id)->first();
        $categoria->delete();
        return Redirect::to('almacen/categoria');
    }
}

