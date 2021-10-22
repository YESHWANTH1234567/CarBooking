<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table='car_details';
    protected $fillable=['car_name','driver_id','car_number','car_seats','car_baggage','car_gear','car_image','car_location','car_price_per_km','created_by','updated_by'];
    public static function getCar($id)
    {
        return Car::find($id)->toArray();
    }
}
