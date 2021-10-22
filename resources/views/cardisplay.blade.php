<?php
$combination['availablecar'] = json_decode($combination['availablecar'] , true);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Car Display</title>
        <style>
            body{
                    background-image: url("carback.jpg");
                    background-repeat: no-repeat;
                }
        </style>
    </head>
    <body>
        <?php
        $distance=round($combination['distance']);
        ?>
        <h1>Available Cars in Your Area</h1>
        <h4>Your Pick Up Location is: {{$combination['source']}}</h4>
        <h4>Your Drop Location is: {{$combination['destination']}}</h4>
        <h2>The distance From {{$combination['source']}} to {{$combination['destination']}} is {{$distance}}KM<h4>
        @foreach($combination['availablecar'] as $row)
        <form>
        <img src="{{'http://localhost/Laravel%20Project/CarModule/resources/images/'.$row['car_image']}}" alt="car Image" width="20%" height="20%" ><br>
        <a href="bookingdetails/{{$row['id']}}/{{$row['car_price_per_km']*$distance}}">Book Now</a>
        <h3>Car Name: {{$row['car_name']}}</h3>
        <h3>Car Registration Number: {{$row['car_number']}}</h3>
        <h3>Bagage: {{$row['car_baggage']}}</h3>
        <h3>price: {{$row['car_price_per_km']*$distance}}</h3>
        <br>
        @endforeach
        <?php

        exit;
        ?>
    </body>
</html>