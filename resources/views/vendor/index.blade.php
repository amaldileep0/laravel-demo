@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Vendors</h2>
  @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{ session()->get('success') }}  
    </div>
  @endif                                                                                   
  <div class="table-responsive">          
  	<a class="btn btn-info" href="{{ route('vendor.create') }}">{{ __('Create vendor') }}</a>
    <p> {{ __('Showing') }} {{$vendors->firstItem()}} {{ __('-') }} {{$vendors->lastItem()}} {{ __('of') }} {{$vendors->total()}} {{ __('items') }}</p>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Country</th>
        <th>State</th>
        <th>District</th>
        <th>City</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td><input type="text" id="download_grid_id" class="form-control" name="UserSubscriptionSearch[id]"></td>
        <td></td>
      </tr>
      @forelse ($vendors as $vendor)
        <tr>
          <td> {{ $vendor->id }} </td>
          <td> {{ $vendor->name }} </td>
          <td> {{ $vendor->gender }} </td>
          <td> {{ $vendor->phone }} </td>
          <td> {{ $vendor->address }} </td>
          <td> {{ $vendor->country->name }} </td>
          <td> {{ $vendor->state->name }} </td>
          <td> {{ $vendor->district->name }} </td>
          <td> {{ $vendor->city }} </td>
          <td> {{ $vendor->created_at }} </td>
          <td> {{ $vendor->updated_at }} </td>
          <td>  
              <a href="{{ route('vendor.show', $vendor->id) }}" class="btn btn-info">View</a>
              <a href="{{ route('vendor.edit', $vendor->id)}}" class="btn btn-primary">Update</a>
              <form action="{{ route('vendor.destroy', $vendor->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
              </form>
          </td>
        </tr>
      @empty
      <tr>
        <td colspan="12" class="text-center"> {{ __('No records found') }} </td>
      </tr>
      @endforelse
    </tbody>
  </table>
  {{ $vendors->links() }}
  </div>
</div>
@endsection