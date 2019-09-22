<?php

namespace activofijo;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table='ubicacion';
    protected $primaryKey='CodUbicacion';

    public $timestamps=false;

    protected $fillable =[
        'Edificio',
        'Ciudad',
        'Pais'
    ];

    protected $guarded =[
        
    ];
}
