
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>locationdetails</title>
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
                    <div class="card-header">{{ __('location update') }}</div>  
                        <div class="card-body">
                            <form action="{{route('locationupdated')}}" method="POST" class="well form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="location_id" value="{{$locationupdate->location_id}}"/>
                                <input type="hidden" name="updated_by" value={{Auth::user()->first_name}}">
                                <div class="form-group row">
                                    <label for="location_name" class="col-md-4 col-form-label text-md-right">{{ __('Location name') }}</label>
                                    <div class="col-md-6"><input id="location_name" type="text" class="form-control @error('location_name') is-invalid @enderror" name="location_name" value="{{$locationupdate->location_name}}" required autocomplete="location_name">
                                        @error('location_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="location_X_coordinate" class="col-md-4 col-form-label text-md-right">{{ __('location_X_coordinate') }}</label>
                                    <div class="col-md-6"><input id="location_X_coordinate" type="text" class="form-control @error('location_X_coordinate') is-invalid @enderror" name="location_X_coordinate" value="{{$locationupdate->location_X_coordinate}}" required autocomplete="location_X_coordinate">
                                        @error('location_X_coordinate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="location_Y_coordinate" class="col-md-4 col-form-label text-md-right">{{ __('location_Y_coordinate') }}</label>
                                    <div class="col-md-6"><input id="location_Y_coordinate" type="text" class="form-control @error('location_Y_coordinate') is-invalid @enderror" name="location_Y_coordinate" value="{{$locationupdate->location_Y_coordinate}}" required autocomplete="location_Y_coordinate">
                                        @error('location_Y_coordinate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="location_image" class="col-md-4 col-form-label text-md-right">{{ __('location image') }}</label>
                                    <div class="col-md-6"><input id="location_image" type="file" class="form-control @error('location_image') is-invalid @enderror" name="location_image"  value="{{$locationupdate->location_image}}" required autocomplete="">
                                        @error('location_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <input type="submit">
                                <a href="/admin/locationdetails">back</a>
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