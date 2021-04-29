@extends('master-layout')

@section('title', 'Build Orders')

@section('content')

<div class = "orders-container">
  <h1>Order Records</h1>

  <div class = "order-records-container">
    <table>
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Console ID</th>
          <th>User ID</th>
          <th>Total</th>
          <th>Create Date</th>
          <th>Update Date</th>
          <th>Status</th>
          {{-- <th>Manage</th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach($build_orders as $build_record)
        <tr>
          <td>{{$build_record->id}}</td>
          <td>{{$build_record->console_id}}</td>
          <td>{{$build_record->user_id}}</td>
          <td>${{$build_record->total_price}} USD</td>
          <td>{{$build_record->created_at}}</td>
          <td>{{$build_record->updated_at}}</td>
          <td>
            {{$build_record->order_status}}
            {{-- <select>
              <option>{{$build_record->order_status}}</option>
            </select> --}}
          </td>
          {{-- <td><button>Save</button></td> --}}
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@stop