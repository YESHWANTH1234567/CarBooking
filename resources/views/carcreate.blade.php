@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>carcreate</title>
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
                    <div class="card-header">{{ __('Car Create new') }}</div>  
                        <div class="card-body">
                            <form action="{{route('carstore')}}" enctype="multipart/form-data"  method="POST" class="well form-horizontal">
                                @csrf
                                <input type="hidden" name="created_by" value="{{Auth::user()->first_name}}">
                                <input type="hidden" name="updated_by" value="{{Auth::user()->first_name}}">
                                <div class="form-group row">
                                    <label for="car_name" class="col-md-4 col-form-label text-md-right">{{ __('Car name') }}</label>
                                    <div class="col-md-6"><input id="car_name" type="text" class="form-control @error('car_name') is-invalid @enderror" name="car_name" value="{{old('car_name')}}" >
                                        @error('car_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="driver_id" class="col-md-4 col-form-label text-md-right">{{ __('Driver Id') }}</label>
                                    <div class="col-md-6"><input id="driver_id" type="text" class="form-control @error('driver_id') is-invalid @enderror" name="driver_id" value="{{old('driver_id')}}" >
                                        @error('driver_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="car_number" class="col-md-4 col-form-label text-md-right">{{ __('Car Number') }}</label>
                                    <div class="col-md-6"><input id="car_number" type="text" class="form-control @error('car_number') is-invalid @enderror" name="car_number" value="{{old('car_number')}}" >
                                        @error('car_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="car_seats" class="col-md-4 col-form-label text-md-right">{{ __('Car Seats') }}</label>
                                    <div class="col-md-6"><select name="car_seats" id="car_seats" value="{{old('car_seats')}}">
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="6">7</option>
                                        <option value="6">12</option>
                                    </select>
                                        {{-- <input id="car_seats" type="text" class="form-control @error('car_seats') is-invalid @enderror" name="car_seats" value="{{old('car_seats')}}" required autocomplete="car_seats"> --}}
                                        @error('car_seats')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="car_baggage" class="col-md-4 col-form-label text-md-right">{{ __('Car Baggage') }}</label>
                                    <div class="col-md-6"><select name="car_baggage" id="car_baggage" value="{{old('car_baggage')}}">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                        {{-- <input id="car_baggage" type="text" class="form-control @error('car_baggage') is-invalid @enderror" name="car_baggage" value="{{old('car_baggage')}}" required autocomplete="car_baggage"> --}}
                                        @error('car_baggage')
                                            <span class="invalid-feedback" role= "alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="car_gear" class="col-md-4 col-form-label text-md-right">{{ __('Car Gear') }}</label>
                                    <div class="col-md-6"><input type="radio" for="car_gear" id="car_gear" name="car_gear" value="A"><span  id="car_gear">Automatic</span><br>
                                    <input type="radio" for="car_gear" id="car_gear" name="car_gear" value="M"  >
                                    <span  id="car_gear">Manuall</span>
                                        {{-- <input id="car_gear" type="text" class="form-control @error('car_gear') is-invalid @enderror" name="car_gear" value="{{old('car_gear')}}" required autocomplete="car_gear"> --}}
                                        @error('car_gear')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="car_price_per_km" class="col-md-4 col-form-label text-md-right">{{ __('Car price per KM') }}</label>
                                    <div class="col-md-6"><input id="car_price_per_km" type="text" class="form-control @error('car_price_per_km') is-invalid @enderror" name="car_price_per_km" value="{{old('car_price_per_km')}}" >
                                        @error('car_price_per_km')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <label for="car_image" class="col-md-4 col-form-label text-md-right">{{ __('Car image') }}</label>
                                    <div class="col-md-6"><input id="car_image" type="file" class="form-control @error('car_image') is-invalid @enderror" name="car_image"  value="" >
                                        @error('car_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><br>
                                <input type="submit">
                            </form><a href="/admin/cardetails">back</a>
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
@endsection
