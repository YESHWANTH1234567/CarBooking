<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table="travel_details";
    protected $fillable=['pickup_location','drop_location','distance','price','user_id'];
    public static function getTravel($id)
    {
        return Travel::where('user_id','=',$id)->first();
    }
    public static function deleteFunction($id){
        $travelDetails=Travel::find($id);
        $travelDetails->delete();
    }
    public static function travelDetails($id)
    {
        return Travel::find($id)->toArray();
    }
}
