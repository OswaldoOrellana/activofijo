<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    //
    protected $table='rubro';
    protected $primaryKey='CodRubro';

    public $timestamps=false;

    protected $fillable =[
        'Descripcion',
        'vidautil',
        'coeficiente',
        'deprecia',
        'actualiza'
    ];

    protected $guarded =[
        
    ];
}
