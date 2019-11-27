@extends('layouts.app') 
@section('content')
<div class="container">
    <h2>{{__('Update : '. ucwords($vendor->name))}}</h2>
    <form method="post" action="{{route('vendor.update', $vendor->id)}}">
        @method('PATCH') 
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  autocomplete="name" value="{{ $vendor->name }}" name="name"> @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="country">{{ __('Gender') }}</label>
            <div class="@error('gender') is-invalid @enderror">
                <label class="radio-inline">
                    <input type="radio" name="gender" value="male" {{ ($vendor->gender == "male") ? "checked" : "" }} >Male</label>
                <label class="radio-inline">
                    <input type="radio" name="gender" value="female" {{ ($vendor->gender == "female") ? "checked" : "" }}>Female</label>
            </div>
            @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="phone">{{ __('Phone') }}</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ $vendor->phone }}" name="phone">
             @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="country">{{ __('Country') }}</label>
            <select class="form-control @error('country') is-invalid @enderror" name="country" id="country">
                <option selected="selected" value="">Choose Country</option>
                @foreach ($countries as $key => $country)
                    <option value="{{ $key }}" {{ ($vendor->country->id == $key) ? "selected" : "" }}>{{ $country }}</option>
                @endforeach
            </select>
            @error('country')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="state">{{ __('State') }}</label>
            <select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
                <option selected="selected" value="">Choose State</option>
                @foreach ($states as $key => $state)
                    <option value="{{ $key }}" {{ ($vendor->state->id == $key) ? "selected" : "" }}>{{ $state }}</option>
                @endforeach
            </select>
            @error('state')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="district">{{ __('District') }}</label>
            <select class="form-control @error('district') is-invalid @enderror" name="district" id="district">
                <option selected="selected" value="">Choose District</option>
                @foreach ($districts as $key => $district)
                    <option value="{{ $key }}" {{ ($vendor->district->id == $key) ? "selected" : "" }} >{{ $district }}</option>
                @endforeach
            </select>
            @error('district')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="city">{{ __('City') }}</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{$vendor->city}}" id="city" name="city">
            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <textarea class="form-control @error('address') is-invalid @enderror" rows="5" name="address" id="address">{{$vendor->address}}</textarea>
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </form>
</div>
@endsection

@section('pagescript')
<script src="{{ asset('js/vendor.js') }}"></script>
@stop