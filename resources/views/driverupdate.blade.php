
    {{-- {{$driverupdate}}
    {{exit}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>driver update</title>
</head>
<body><center>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                      </div>                        
                    @endif
                    <div class="card-header">{{ __('driver update') }}</div>  
                        <div class="card-body">
                            <form action="{{route('driverupdated')}}" method="POST" class="well form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="driver_id" value="{{$driverupdate->driver_id}}"/>
                                <input type="hidden" name="created_by" value="admin1">
                                <input type="hidden" name="updated_by" value="admin1">
                                <div class="form-group row">
                                    <label for="driver_name" class="col-md-4 col-form-label text-md-right">{{ __('driver name') }}</label>
                                    <div class="col-md-6"><input id="driver_name" type="text" class="form-control @error('driver_name') is-invalid @enderror" name="driver_name" value="{{$driverupdate->driver_name}}" required autocomplete="driver_name">
                                        @error('driver_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="driver_mobile" class="col-md-4 col-form-label text-md-right">{{ __('Driver mobile') }}</label>
                                    <div class="col-md-6"><input id="driver_mobile" type="text" class="form-control @error('driver_mobile') is-invalid @enderror" name="driver_mobile" value="{{$driverupdate->driver_mobile}}" required autocomplete="driver_mobile">
                                        @error('driver_mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="driver_address" class="col-md-4 col-form-label text-md-right">{{ __('Driver Address') }}</label>
                                    <div class="col-md-6"><input id="driver_address" type="text" class="form-control @error('driver_address') is-invalid @enderror" name="driver_address" value="{{$driverupdate->driver_address}}" required autocomplete="driver_address">
                                        @error('driver_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="driver_image" class="col-md-4 col-form-label text-md-right">{{ __('Driver Image') }}</label>
                                    <div class="col-md-6"><input id="driver_image" type="file" class="form-control @error('driver_image') is-invalid @enderror" name="driver_image"  value="{{$driverupdate->driver_image}}" required autocomplete="">
                                        @error('driver_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <input type="submit">
                                <a href="/admin/driverdetails">back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
</center>
</body>
</html>