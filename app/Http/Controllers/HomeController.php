<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Location;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }
    public function adminHome()
    {
        return view('admin');
    }
    public function search(Request $request)
    {
        $output='';
        $query=$request->get('search');
        if($query=='')
        {
            return 'No results';
        }
        else
        {
            $data=Location::locationDetails($query);
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
             $output .= '
             <li><a>'.$row->location_name.'</a></li>
             ';
            }
            $output .= '</ul>';
            return  $output;
        }
    }
    public function bookingData(Request $request)
    {
        $combination=array();
        $source=$request['pickup'];
        $destination=$request['destination'];
        $sourceCoordinates=Location::xCoordinate($source);
        $destinationCoordinates=Location::yCoordinate($destination);
        $distance=round(sqrt(pow($sourceCoordinates['location_X_coordinate']-$destinationCoordinates['location_X_coordinate'],2)+pow($sourceCoordinates['location_Y_coordinate']-$destinationCoordinates['location_Y_coordinate'],2)));
        $sourceLocationId=$sourceCoordinates['location_id'];
        $availableCar=Location::carSearch($sourceLocationId);
        $object=new Travel();
        $object->pickup_location=$source;
        $object->drop_location=$destination;
        $object->distance=$distance;
        $object->user_id=Auth::user()->id;
        $object->save();
        $combination=["source"=>"$source","destination"=>"$destination","distance"=>"$distance","availablecar"=>"$availableCar"];
        return view('cardisplay',compact('combination'));
    }
    public function backToPage()
    {
        return view('admin');
    }
    public function bookingDetails($id,$price)
    {
        $bookingConformationDetails=array();
        $carDetails=Car::getCar($id);
        $travelDetails=Travel::getTravel(Auth::user()->id);
        $travelId=$travelDetails['id'];
        $carId=$carDetails['id'];
        $carName=$carDetails['car_name'];
        $carImage=$carDetails['car_image'];
        $carNumber=$carDetails['car_number'];
        $carSeats=$carDetails['car_seats'];
        $carBaggage=$carDetails['car_baggage'];
        $source=$travelDetails['pickup_location'];
        $destination=$travelDetails['drop_location'];
        $distance=$travelDetails['distance'];
        $bookingConformationDetails=['price'=>$price,'carId'=>$carId,'travelId'=>$travelId,'source'=>$source,'destination'=>$destination,'distance'=>$distance,'carName'=>$carName,'carImage'=>$carImage,'carNumber'=>$carNumber,'carSeats'=>$carSeats,'carBaggage'=>$carBaggage];
        return view('bookingconformation',compact('bookingConformationDetails'));
    }

}
