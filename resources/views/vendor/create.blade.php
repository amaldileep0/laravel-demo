@extends('layouts.app') 
@section('content')
<div class="container">
    <h2>{{__('Create Vendor')}}</h2>
    <form method="post" action="{{route('vendor.store')}}">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" autocomplete="name" value="{{ old('name') }}" autofocus name="name"> @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="gender">{{ __('Gender') }}</label>
            <div class="form-control @error('gender') is-invalid @enderror">
                <label class="radio-inline">
                    <input type="radio" name="gender" value="male" {{old('gender') == 'male' ? 'checked' : '' }}>Male</label>
                <label class="radio-inline">
                    <input type="radio" name="gender" value="female" {{old('gender') == 'female' ? 'checked' : '' }}>Female</label>
            </div>
             @error('gender')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="phone">{{ __('Phone') }}</label>
            <input type="text" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Phone Number" name="phone">
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
                    <option value="{{ $key }}">{{ $country }}</option>
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
                <option selected="selected" value="">Choose Country</option>
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
            </select>
            @error('district')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="city">{{ __('City') }}</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" value="{{ old('city') }}" placeholder="Enter City" name="city">
            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <textarea class="form-control @error('address') is-invalid @enderror" rows="5" name="address" id="address">{{ old('address') }}</textarea>
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