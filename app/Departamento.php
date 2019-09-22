<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamento';
    protected $primaryKey='CodDepartamento';

    public $timestamps=false;

    protected $fillable =[
        'CodDepartamento',
        'Descripcion',
        'CodUbicacion'
    ];

    protected $guarded =[
        
    ];
}
