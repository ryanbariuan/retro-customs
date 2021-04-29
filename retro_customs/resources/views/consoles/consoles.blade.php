@extends('master-layout')

@section('title', 'Consoles')

@section('content')

<div class = "consoles-header">
  <h1>Custom Consoles</h1>
</div>
<div class = "product-consoles-container">
  @foreach($consoles as $console)
  <a href = "/consoles/{{$console->id}}/build_order" data-consoleID = "{{$console->id}}" class = "product-card">
    <div class = "product-img-container">
      <img alt = "{{$console->console_name}}" src = "{{$console->image}}"/>
    </div>
    <div class = "product-info-container">
      <p>
        Build to Order {{$console->console_name}}
      </p>
    </div>
    <div class = "product-price-container">
      <p>
        ${{$console->price}} USD
      </p>
    </div>
  </a>
  @endforeach
</div>

@stop