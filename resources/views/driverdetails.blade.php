{{-- {{print_r($driverdetails)}}
{{exit}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>driver details</title>
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
            .active{

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
                    <div class="card-header">{{ __('driver details') }}</div>  
                        <div class="card-body"><a href="/admin/drivercreate" class="btn btn-success">+ add new driver</a>
                            <a href="/admin/back" id="logbtn" class="btn btn-info btn-lg">back</a>
                            <table>
                                <tr>
                                    <th>Driver id</th>
                                    <th>Driver name</th>
                                    <th>Driver mobile</th>
                                    <th>Driver image</th>
                                    <th>Driver availability</th>
                                    <th>Action</th>                                   
                                </tr>                                                    
                               @foreach ($driverdetails as $details)
                               @if ($details->status=='A') 
                               <tr>
                                   <td>{{$details->driver_id}}</td>
                                   <td>{{$details->driver_name}}</td>
                                   <td>{{$details->driver_mobile}}</td>
                                   <td><img src="http://localhost/Laravel%20Project/CarModule/resources/images/{{$details->driver_image}}" alt="{{$details->driver_name}}" width="100px"/></td>
                                   <td>
                                       @if ($details->driver_availablility=='A')
                                       <div class="active">available</div>                                           
                                       @elseif($details->driver_availablility=='B')
                                       <div class="active">booked</div>                                             
                                       @endif
                                   </td>
                                   <td><a href="driverupdate/{{$details->driver_id}}" class="btn btn-info">edit</a>
                                   <a onclick="return myFunction()" href="driverdelete/{{$details->driver_id}}" class="btn btn-danger">delete</a></td>
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