@extends('layouts.app')
@section('content')
<div class="container">
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
        <style>
            .center
            {
                margin: auto;
                width: 300px;
            }
            table
            {
                width: auto;
                font: 17px Calibri;
            }
            table, th, td 
            {
                border: solid 1px #DDD;
                border-collapse: collapse;
                padding: 2px 3px;
                text-align: center;
            }
            img 
            {
                width: 50%;
            }
    </style>
    </head>
    <body>
        <br>
        <div class="center">
                <div class="form-group">
                    <input type="text" placeholder="Enter the Pick Up Location" id="pickup" name="pickup" class="form-control">
                </div>
                <span id="data"></span>
                <div class="form-group">
                    <input type="text" placeholder="Enter the Drop Location" id="drop" name="drop" class="form-control">
                </div>
                <span id="data1"></span>
                <input type="submit" value="search">
        </div>
    </body>
</html>
<script type="text/javascript">
        var route = "{{ url('search') }}";

        $('#pickup').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
</script>

@endsection