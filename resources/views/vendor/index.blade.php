@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Vendors</h2>                                                                                    
  <div class="table-responsive">          
  	<a class="btn btn-info" href="{{ route('vendor.create') }}">{{ __('Create vendor') }}</a>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>City</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
@endsection