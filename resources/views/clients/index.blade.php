@extends('template.masterLayout')
@section('content')
<h1>Client</h1>
<form action="{{route('orders.sendOrder')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlSelect1">User</label>
    <select class="form-control" name="client_id">
      @foreach ($clients as $client)
      <option value="{{$client->id}}">{{$client->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Vendor</label>
    <select class="form-control" name="vendor_id">
      @foreach ($vendors as $vendor)
      <option value="{{$vendor->id}}">{{$vendor->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Order</label>
    <textarea class="form-control" name="name" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Send</button>
</form>
@endsection