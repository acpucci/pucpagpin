<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    //nombre, telefono, email, msj
    use SoftDeletes;
    protected $table = 'personas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 
        'email',
        'phone',
        'message'
    ];

}
?>