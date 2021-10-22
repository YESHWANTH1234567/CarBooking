<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>location details</title>
    <style>
        table, th, td {
        border: 1px solid black;
        }
        #logbtn {

            padding: 3px;
            display:block;
            background-color: #ad2d2d;
            color: rgb(235, 240, 233);
            text-align:center;
            position: absolute;
            top: 35px;
            right: 1px;

            }
        </style>
</head><center>
    <body class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (Session::has('delete'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('delete')}}
                      </div>                        
                    @endif
                    <div class="card-header">{{ __('location details') }}</div>  
                        <div class="card-body"><a href="/admin/locationcreate" class="btn btn-success">+ add new location</a>
                            <a href="/admin/back" id="logbtn" class="btn btn-info btn-lg">back</a>
                            <table>
                                <tr>
                                    <th>Location id</th>
                                    <th>Location name</th>
                                    <th>Location_X_coordinate</th>
                                    <th>Location_Y_coordinate</th>
                                    <th>Location image</th>
                                    <th>action</th>
                                    
                                </tr>
                                                    
                               @foreach ($locationdetails as $details)
                               @if ($details->status=='A') 
                               <tr>
                                   <td><center>{{$details->location_id}}</center></td>
                                   <td><center>{{$details->location_name}}</center></td>
                                   <td><center>{{$details->location_X_coordinate}}</center></td>
                                   <td><center>{{$details->location_Y_coordinate}}</center></td>
                                   <td><center><img src="http://localhost/Laravel%20Project/CarModule/resources/images/{{$details->location_image}}" alt="{{$details->location_name}}" width="100px"/></center></td>
                                   <td><center><a href="locationupdate/{{$details->location_id}}" class="btn btn-info">edit</a>
                                   <a onclick="return myFunction()" href="locationdelete/{{$details->location_id}}" class="btn btn-danger">delete</a></center></td>
                                </tr> 
                               @endif
                               @endforeach                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body></center>
</html>
<script type="text/javascript" src="{{asset('../js/alert.js')}}"></script>