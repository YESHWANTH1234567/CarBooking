<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>drivercreate</title>
</head>
<body><center>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <div class="card-header">{{ __('Driver Create new') }}</div>  
                        <div class="card-body">
                            <form action="{{route('driverstore')}}" enctype="multipart/form-data"  method="POST" class="well form-horizontal">
                                @csrf
                                <input type="hidden" name="created_by" value="{{Auth::user()->first_name}}">
                                <input type="hidden" name="updated_by" value="{{Auth::user()->first_name}}">

                                <div class="form-group row">
                                    <label for="driver_name" class="col-md-4 col-form-label text-md-right">{{ __('Driver name') }}</label>
                                    <div class="col-md-6"><input id="driver_name" type="text" class="form-control @error('driver_name') is-invalid @enderror" name="driver_name" value="{{old('driver_name')}}" required autocomplete="driver_name">
                                        @error('driver_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="driver_mobile" class="col-md-4 col-form-label text-md-right">{{ __('Driver mobile') }}</label>
                                    <div class="col-md-6"><input id="driver_mobile" type="text" class="form-control @error('driver_mobile') is-invalid @enderror" name="driver_mobile" value="{{old('driver_mobile')}}" required autocomplete="driver_mobile">
                                        @error('driver_mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="driver_address" class="col-md-4 col-form-label text-md-right">{{ __('Driver address') }}</label>
                                    <div class="col-md-6"><input id="driver_address" type="text" class="form-control @error('driver_address') is-invalid @enderror" name="driver_address" value="{{old('driver_address')}}" required autocomplete="driver_address">
                                        @error('driver_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="driver_image" class="col-md-4 col-form-label text-md-right">{{ __('Driver image') }}</label>
                                    <div class="col-md-6"><input id="driver_image" type="file" class="form-control @error('driver_image') is-invalid @enderror" name="driver_image"  value="" required autocomplete="">
                                        @error('driver_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <input type="submit">
                            </form><a href="/admin/driverdetails">back</a>
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