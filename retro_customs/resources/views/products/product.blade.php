@extends('master-layout')

@section('title', 'Products')

@section('content')

<div class = "products-container">
  <div class = "products-header">
    <h1>Product Parts</h1>
    <div class = "products-sort-container">
      <div class = "sort-wrap">
        <label>Sort By</label>
        <form action = "/products/filter" class = "filter-form" method = "GET">
          {{-- @csrf --}}
          <select name = "part_category">
            <option value = "">All</option>
            @foreach($categories as $category)
            <option value = "{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
          </select>
          <input type = "submit" value = "Filter Result"/>
        </form>
      </div>
    </div>
  </div>
  <div class = "products-display">
    @foreach($parts as $part)
    <div class = "product-part">
      <div class = "product-part-image-container">
        <div class = "img-wrap">
          <img alt = "{{$part->part_name}}" src = "{{asset("$part->image")}}"/>
        </div>
      </div>
      <label>{{$part->part_name}}</label>
      <label>${{$part->price}} USD</label>
      <label>For {{$part->console->console_name}}</label>
    </div>
    @endforeach
  </div>
  {{$parts->links()}}
  
</div>

@stop