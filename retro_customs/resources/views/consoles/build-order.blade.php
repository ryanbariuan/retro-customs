@extends('master-layout')

@section('title', 'Build to Order')

@section('content')

<div class = "build-order-container">
  <div class = "build-order-container-wrapper">
    <div class = "welcome-msg-container">
      <p>Welcome to RetroCustoms {{$user->name}}</p>
    </div>
    
    <div class = "console-details-container">
      <div class = "console-img-container">
        <div class = "img-wrapper">
          <img src ="{{asset("$console->image")}}" alt ="{{$console->console_name}}"/>
        </div>
      </div>
      <div class = "build-order-header">
        <h1>
          Build to Order {{$console->console_name}}
        </h1>
        <p>
          Base Price: $<span id = "base-price">{{$console->price}}</span> USD
        </p>
        <div class = "extra-order-container">
          <h4>Extra Parts Cart</h4>
          <div class = "extra-button-container">
            <div class = "img-wrapper">
              <img alt = "parts ordered" src = ""/>
            </div>
            <div class = "part-name">
              Buttons
            </div>
            <div class = "part-price">
              $<span>0.00</span> USD
            </div>
          </div>
          <div class = "extra-lens-container">
            <div class = "img-wrapper">
              <img alt = "parts ordered" src = ""/>
            </div>
            <div class = "part-name">
              Lens
            </div>
            <div class = "part-price">
              $<span>0.00</span> USD
            </div>
          </div>
          <div class = "extra-screen-container">
            <div class = "img-wrapper">
              <img alt = "parts ordered" src = ""/>
            </div>
            <div class = "part-name">
              Screen
            </div>
            <div class = "part-price">
              $<span>0.00</span> USD
            </div>
          </div>
          <div class = "extra-shell-container">
            <div class = "img-wrapper">
              <img alt = "parts ordered" src = ""/>
            </div>
            <div class = "part-name">
              Shell
            </div>
            <div class = "part-price">
              $<span>0.00</span> USD
            </div>
          </div>
          <div class = "extra-battery-container">
            <div class = "img-wrapper">
              <img alt = "parts ordered" src = ""/>
            </div>
            <div class = "part-name">
              Battery
            </div>
            <div class = "part-price">
              $<span>0.00</span> USD
            </div>
          </div>
        </div>
        <p>
          Extra Total: $<span id = "extra-price">0</span> USD
        </p>  
      </div>
      <div class = "build-order-desc">
        <div class = "description">
          <h4>Description</h4>
          <p>
            {{$console->description}}
          </p>
        </div>
      </div>
    </div>
  
    <div class = "build-order-form-container">
      <form class = "build-order-form" method = "POST">
        <h1>Customization Form</h1>
        @csrf
        <label>Buttons</label>
        <select class="buttons" name = "parts[]">
          <option
            data-buttonPrice = 0
            data-buttonImg = "{{asset("$console->image")}}"
            data-buttonDesc = ""
            class = "buttonID-0"
            value = 0>
            Default
          </option>
          @foreach($buttons as $button)
            <option 
            data-buttonPrice = "{{$button->price}}"
            data-buttonImg = "{{asset("$button->image")}}"
            data-buttonDesc = "{{$button->description}}"
            class =  "buttonID-{{$button->id}}"
            value = "{{$button->id}}">
              {{$button->part_name}} - ${{$button->price}}USD
            </option>
          @endforeach
        </select>
        <label>Lenses</label>
        <select class="lenses" name = "parts[]">
          <option
            data-lensPrice = 0
            data-lensImg = "{{asset("$console->image")}}"
            data-lensDesc = ""
            class = "lensID-0"
            value = 0>
            Default
          </option>
          @foreach($lenses as $lens)
            <option
            data-lensPrice = "{{$lens->price}}"
            data-lensImg = "{{asset("$lens->image")}}"
            data-lensDesc = "{{$lens->description}}"
            class =  "lensID-{{$lens->id}}" 
            value = "{{$lens->id}}">
              {{$lens->part_name}} - ${{$lens->price}}USD
            </option>
          @endforeach
        </select>
        <label>Screens</label>
        <select class="screens" name = "parts[]">
          <option
            data-screenPrice = 0
            data-screenImg = "{{asset("$console->image")}}"
            data-screenDesc = ""
            class = "screenID-0"
            value = 0>
            Default
          </option>
          @foreach($screens as $screen)
            <option
            data-screenPrice = "{{$screen->price}}"
            data-screenImg = "{{asset("$screen->image")}}"
            data-screenDesc = "{{$screen->description}}"
            class =  "screenID-{{$screen->id}}"  
            value = "{{$screen->id}}">
              {{$screen->part_name}} - ${{$screen->price}}USD
            </option>
          @endforeach
        </select>
        <label>Shells</label>
        <select class="shells" name = "parts[]">
          <option
            data-shellPrice = 0
            data-shellImg = "{{asset("$console->image")}}"
            data-shellDesc = ""
            class = "shellID-0"
            value = 0>
            Default
          </option>
          @foreach($shells as $shell)
            <option 
            data-shellPrice = "{{$shell->price}}"
            data-shellImg = "{{asset("$shell->image")}}"
            data-shellDesc = "{{$shell->description}}"
            class =  "shellID-{{$shell->id}}"  
            value = "{{$shell->id}}">
              {{$shell->part_name}} - ${{$shell->price}}USD
            </option>
          @endforeach
        </select>
        <label>Batteries</label>
        <select class="batteries" name = "parts[]">
          <option
          data-batteryPrice = 0
          data-batteryImg = "{{asset("$console->image")}}"
          data-batteryDesc = ""
          class = "batteryID-0"
          value = 0>
          Default
          </option>
          @foreach($batteries as $battery)
            <option
            data-batteryPrice = "{{$battery->price}}"
            data-batteryImg = "{{asset("$battery->image")}}"
            data-batteryDesc = "{{$battery->description}}"
            class =  "batteryID-{{$battery->id}}"   
            value = "{{$battery->id}}">
              {{$battery->part_name}} - ${{$battery->price}}USD
            </option>
          @endforeach
        </select>
        <input name="extraPriceTotal" value = 0 class = "totalPrice" type = "hidden" />
        <button>Create Order</button>
      </form>
    </div>
  </div>

</div>
<script src="{{ asset('js/build-to-order-script.js') }}"></script>
@stop