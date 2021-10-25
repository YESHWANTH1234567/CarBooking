@extends('layouts.app')
@section('content')
<div class="container">
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            #result
            {
                position: absolute;
                width: 100%;
                max-width: 870px;
                cursor: pointer;
                overflow-y: auto;
                max-height: 400px;
                box-sizing: border-box;
                z-index: 1001;
            }
            .link-class:hover{
                background-color: #f1f1f1;
            }
            body{
                background-image:url("images/wall1.jpg") ;
                background-repeat: no-repeat;
                background-size:100% ;
            }
        </style>
    </head>
    <body>
        <br>
        <div class="center">
            <form method="get" action="bookingdata">
                <div align="center">
                    <input type="text" name="pickup" id="pickup" class="form-control input-lg" placeholder="Enter pickup Location" autocomplete="off"/>
                    <div id="locations"></div>
                </div>
                <br>
                <div align="center">
                    <input type="text" name="destination" id="destination" class="form-control input-lg" placeholder="Enter drop location" autocomplete="off"/>
                    <div id="locations1"></div>
                </div>
                <br>
                <input type="submit" value="search">
            </form>
        </div>
    </body>
</html>
<script>
$(document).ready(function(){
    $('#pickup').on('keyup',function(){
        var query=$(this).val();
        $.ajax({
            url:"search",
            type:"get",
            data:{'search':query},
            success:function(data){
                if(data=='No results')
                {
                    $('#locations').html('');
                }
                else
                {
                    $('#locations').fadeIn();  
                    $('#locations').html(data);
                }
            }
        });
    });
    $('#locations').on('click', 'li a', function(){
        $('#pickup').val($(this).text());  
        $('#locations').fadeOut();
        console.log('value');
    });  
});
$(document).ready(function(){
    $('#destination').on('keyup',function(){
        var query=$(this).val();
        $.ajax({
            url:"search",
            type:"get",
            data:{'search':query},
            success:function(data){
                if(data=='No results')
                {
                    $('#locations1').html('');
                }
                else
                {
                    $('#locations1').fadeIn();  
                    $('#locations1').html(data);
                }
            }
        });
    });
    $('#locations1').on('click', 'li a', function(){  
        $('#destination').val($(this).text());  
        $('#locations1').fadeOut();
    });  
});
</script>
</div>
@endsection