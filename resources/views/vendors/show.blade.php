@extends('template.masterLayout')
@section('content')
<h1>Vendor</h1>
<table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order</th>
      <th scope="col">Client</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
    <tr>
      <th scope="row">{{$order->id}}</th>
      <td>{{$order->name}}</td>
      <td>{{$order->client->name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection