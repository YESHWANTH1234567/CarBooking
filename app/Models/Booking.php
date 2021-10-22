<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table="booking_details";
    protected $fillable=['from_location','to_location','distance','price','car_name','car_image','car_seats','car_baggage','driver_name','driver_mobile','driver_address','driver_image'];
}
