<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function driverDetails(){
        $driverdetails=Driver::all();
        return view('driverdetails',compact('driverdetails'));
    }
    public function driverCreate(){
        return view('drivercreate');
    }
    public function driverStore(Request $request){
        $requests=$request->all();
        $request->validate([
            'driver_name'=>'required|regex:/^[a-zA-Z]+$/u',
            'driver_mobile'=>'required|numeric',
            'driver_address'=>'required'
        ]);
        if ($request->hasFile('driver_image'))
        {            
            $a=$request->file('driver_image');
            
            $object = new Driver
            ([
                "driver_name"         => $request->get('driver_name'),
                "driver_mobile"       => $request->get('driver_mobile'),
                "driver_address"      => $request->get('driver_address'),
                "driver_image"        => $a,
                "created_by"          => $request->get('created_by'),
                "updated_by"          => $request->get('updated_by'),
                "created_at"          => now(),
                "updated_at"          => now()
            ]);
            $object->save(); // Finally, save the record.
        }
        return back()->with('success','file uploaded successfully');
    }
    public function driverUpdate($id){
        $driverupdate=Driver::where('driver_id',$id)->first();
        
        return view('driverupdate',compact('driverupdate'));
        
    }
    public function driverDelete($id){
        $deriverdelete=Driver::where('driver_id',$id)->update([
            'status'=>'D'
            
        ]);
        return back()->with('delete','file deleted successfully');
    }
    public function driverUpdated(Request $request){
        
        // print_r('hi');exit;
        $requests=$request->all();
        // print_r($requests);exit;
        $request->validate([
            'driver_name'=>'required|regex:/^[a-zA-Z]+$/u',
            'driver_mobile'=>'required|numeric',
            'driver_address'=>'required'
        ]);
        if ($request->hasFile('driver_image'))
        {  
            $a=$request->file('driver_image')->store('driver');
            $driverupdated=Driver::where('driver_id',$request['driver_id'])->update([
                'driver_name'            =>  $request->get('driver_name'),
                'driver_mobile'          =>  $request->get('driver_mobile'),
                'driver_address'         =>  $request->get('driver_address'),
                'created_by'             =>  $request->get('created_by'),
                'updated_by'             =>  $request->get('updated_by'),
                'created_at'             =>  now(),
                'updated_at'             =>  now()
            ]);
            // $locationupdated->save();
            return back()->with('success','file updateded successfully');        
        }
    }
}
