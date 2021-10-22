<!DOCTYPE html>
<html>
    <head>
        <title>Conformation Page</title>
    </head>
    <style>
        img{
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        a{
            color: green;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <body>
        <h1 align="center">Conformation Page</h1>
        <p align="center">Pick Up Location : <b align="center">{{$bookingConformationDetails['source']}}</b></p>
        <p align="center">Drop Location : <b align="center">{{$bookingConformationDetails['destination']}}</b></p>
        <p align="center">Car Name : <b align="center">{{$bookingConformationDetails['carName']}}</b></p>
        <p align="center">Car Number : <b align="center">{{$bookingConformationDetails['carNumber']}}</b></p>
        <p align="center">Distance : <b align="center">{{$bookingConformationDetails['distance']}} KM</b></p>
        <p align="center">price : <b align="center">{{$bookingConformationDetails['price']}}</b></p>
        <img src="{{'http://localhost/Laravel%20Project/CarModule/resources/images/'.$bookingConformationDetails['carImage']}}" alt="car Image" width="20%" height="20%" >
        <p align="center">Seating : <b align="center">{{$bookingConformationDetails['carSeats']}}</b></p>
        <p align="center">Baggage : <b align="center">{{$bookingConformationDetails['carBaggage']}}</b></p><br>
        <a align="center" href="{{url('confirmBooking/'.$bookingConformationDetails['travelId'].'/'.$bookingConformationDetails['carId'].'/'.$bookingConformationDetails['price'])}}">Confirm Booking</a>
    </body>
</html>