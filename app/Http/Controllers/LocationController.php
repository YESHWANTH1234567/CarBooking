<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\LocationDetailsModel;
// use Symfony\Component\Console\Input\Input;

class LocationController extends Controller
{
    public function locationDetails()
    {
        $locationdetails=Location::all();
        return view('locationdetails',compact('locationdetails'));  // view the locationdetails page
    }

    public function locationCreate()
    {
        return view('locationcreate');     // view the locationcreate page
    }
     
    public function locationStore(Request $request)
    {
        $requests=$request->all();                 // request all the file

        $request->validate([
            'location_name'=>'required|regex:/^[a-zA-Z]+$/u',
            'location_X_coordinate'=>'required|numeric',
            'location_Y_coordinate'=>'required|numeric'
        ]);
        if ($request->hasFile('location_image'))
        {            
            $a=$request->file('location_image')->store('location');

            $object = new Location
            ([
                "location_name"         => $request->get('location_name'),
                "location_X_coordinate" => $request->get('location_X_coordinate'),
                "location_Y_coordinate" => $request->get('location_Y_coordinate'),
                "location_image"        => $a,
                "created_by"            =>$request->get('created_by'),
                "updated_by"            => $request->get('updated_by'),
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $object->save(); // Finally, save the record.
        }
        return back()->with('success','file uploaded successfully');
    }
    public function locationUpdate($id)
    {
    
        $locationupdate=Location::where('location_id','=',$id)->first();
        return view('locationupdate',compact('locationupdate'));
        
    }
    public function locationUpdated(Request $request)
    { 
        $requests=$request->all();
    
        $request->validate([
            'location_name'=>'required|regex:/^[a-zA-Z]+$/u',
            'location_X_coordinate'=>'required|numeric',
            'location_Y_coordinate'=>'required|numeric'
        ]);
        if ($request->hasFile('location_image'))
        {  
            $a=$request->file('location_image')->store('location');
            $locationupdated=Location::where('location_id',$request['location_id'])->update([
                'location_name'          =>  $request->get('location_name'),
                'location_X_coordinate'  =>  $request->get('location_X_coordinate'),
                'location_Y_coordinate'  =>  $request->get('location_Y_coordinate'),
                'location_image'         =>  $a,
                'updated_by'             =>  $request->get('updated_by'),
                'created_at'             =>  now(),
                'updated_at'             =>  now()
            ]);
        
            return back()->with('success','file updateded successfully');        
        }
    }
    public function locationDelete($id)
    {
        
        $delete=Location::where('location_id',$id)->update([
            'status'=>'D'
        ]);
        return back()->with('delete','file deleted successfully');
    }
    public function bookingStart(Request $request)
    {
        $query = $request->get('query');
        $filter = Location::where('location_name', 'LIKE', "%".$query."%")->get();
        $filterResult=array();
        foreach($filter as $fill)
        {
            $filterResult[]=$fill->location_name;
        }
        return response()->json($filterResult);
    }

}