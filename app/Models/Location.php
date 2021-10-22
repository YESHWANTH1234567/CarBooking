<?php

namespace App\Models;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Location extends Model
{
    use HasFactory;
    protected $fillable=['location_name','location_X_coordinate','location_Y_coordinate','location_image','created_by','updated_by'];
    public static function locationDetails($query)
    {
        return Location::where('location_name','like','%'.$query.'%')
        ->get();
    }
    public static function xCoordinate($source)
    {
        $sourceDetails=Location::where('location_name','like','%'.$source.'%')->first();
        return $sourceDetails;
    }
    public static function yCoordinate($destination)
    {
        $destinationDetails=Location::where('location_name','like','%'.$destination.'%')->first();
        return $destinationDetails;
    }
    public static function carSearch($id)
    {
        return Car::where('car_location','like','%'.$id.'%')->get(); 
    }
}
