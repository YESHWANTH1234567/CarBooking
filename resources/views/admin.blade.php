@extends('layouts.app')
   
@section('content')
<link rel='stylesheet' href="{{asset('../css/navbar.css')}}">
<div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href='adminRegister'>Create New Admin</a>
    <a href="//www.tripzumi.com/">Flights</a>
    <a href="//www.claritytts.com/">About Us</a>
  </div>
  <div class="topnav1">
    <a href="cardetails">Car Details</a>
    <a href="locationdetails">Location Details</a>
    <a href="driverdetails">Driver Details</a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are Admin.
                    <a href="/bookingpage">bookingpage</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection