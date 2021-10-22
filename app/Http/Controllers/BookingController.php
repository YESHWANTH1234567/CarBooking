<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Travel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function confirmBooking($id,$carId,$price)
    {
        $carDetails=Car::getCar($carId);
        $travelDetails=Travel::travelDetails($id);
        $userId=$travelDetails['user_id'];
        $userDetails=User::userDetails($userId);
        $driverId=$carDetails['driver_id'];
        $driverDetails=Driver::driverDetails($driverId);
        $object=new Booking();
        $object->from_location=$travelDetails['pickup_location'];
        $object->to_location=$travelDetails['drop_location'];
        $object->distance=$travelDetails['distance'];
        $object->price=$price;
        $object->user_id=$travelDetails['user_id'];
        $object->car_name=$carDetails['car_name'];
        $object->car_image=$carDetails['car_image'];
        $object->car_baggage=$carDetails['car_baggage'];
        $object->car_seats=$carDetails['car_seats'];
        $object->driver_name=$driverDetails['driver_name'];
        $object->driver_mobile=$driverDetails['driver_mobile'];
        $object->driver_address=$driverDetails['driver_address'];
        $object->driver_image=$driverDetails['driver_image'];
        $object->save();
        Mail::to($userDetails['email'])->send(new BookingMail("hello how are you"));
        Travel::deleteFunction($id);
    }

}
