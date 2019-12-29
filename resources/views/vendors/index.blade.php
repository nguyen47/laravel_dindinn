@extends('template.masterLayout')
@section('content')
<h1>Vendor</h1>
<table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($vendors as $vendor)
    <tr>
      <th scope="row">{{$vendor->id}}</th>
      <td>{{$vendor->name}}</td>
      <td><a href="{{route('vendors.show', $vendor->id)}}">View Order</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection