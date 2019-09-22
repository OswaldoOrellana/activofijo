<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table='categoria';
    protected $primaryKey='CodCategoria';

    public $timestamps=false;

    protected $fillable =[
        'Nombre',
        'Descripcion',
        'CodRubro'
    ];

    protected $guarded =[
        
    ];
}
