<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Driver extends Model
{
    use HasFactory;
    protected $table='driver_details';
    protected $fillable=['driver_name','driver_mobile','driver_image','driver_address','created_by','updated_by'];
    public static function driverDetails($id)
    {
        return Driver::find($id)->toArray();
    }
}
