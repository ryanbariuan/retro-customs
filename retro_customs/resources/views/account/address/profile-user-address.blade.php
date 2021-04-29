@extends('master-layout')

@section('title', 'My Addreses')

@section('content')

  <div class = "profile-container">
    <div class = "welcome-msg-container">
      <p data-userID = "{{$user->id}}">Welcome to RetroCustoms {{$user->name}}</p>
    </div>
    <h1>My Profile Account</h1>
    @if($errors->any())
    <div class ="form-error-msg-container">
      <small>Address Form Invalid!, see error messages on the form for info.</small>
    </div>
    @endif
    @if(session()->has('warning'))
    <div class ="form-error-msg-container">
      <small>{{ session()->get('warning') }}</small>
    </div>
    @elseif(session()->has('success'))
    <div class ="form-success-msg-container">
      <small>{{ session()->get('success') }}</small>
    </div>  
    @endif


    <div class = "user-profile-container">
      <div class = "address-form-container">
        <h2>Add a New Address</h2>
        <form class = "new-address-form" action="/profile/{{$user->id}}/addresses" method = "POST">
          @csrf
          <div class = "group-form-container">
            <div class = "form-container">
              <label>First Name</label>
              <input type = "text" name="firstname" value="{{old('firstname')}}" />
              @error('firstname')
              <span class = "errorSpanMsg"><small>{{$message}}</small></span>
              @enderror
            </div>
            <div class = "form-container">
              <label>Last Name</label>
              <input type = "text" name="lastname" value="{{old('lastname')}}" />
              @error('lastname')
              <span class = "errorSpanMsg"><small>{{$message}}</small></span>
              @enderror
            </div>
          </div>
          <div class = "form-container">
            <label>Address</label>
            <input type = "text" name="address" value="{{old('address')}}" />
            @error('address')
            <span class = "errorSpanMsg"><small>{{$message}}</small></span>
            @enderror
          </div>
          <div class = "group-form-container">
            <div class = "form-container">
              <label>City</label>
              <input type = "text" name="city" value="{{old('city')}}" />
              @error('city')
              <span class = "errorSpanMsg"><small>{{$message}}</small></span>
              @enderror
            </div>
            <div class = "form-container">
              <label>Country</label>
              <input type = "text" name="country" value="{{old('country')}}" />
              @error('country')
              <span class = "errorSpanMsg"><small>{{$message}}</small></span>
              @enderror
            </div>
          </div>
          <div class = "form-container">
            <label>Province</label>
            <input type = "text" name="province" value="{{old('province')}}" />
            @error('province')
            <span class = "errorSpanMsg"><small>{{$message}}</small></span>
            @enderror
          </div>
          <div class = "group-form-container">
            <div class = "form-container">
              <label>Postal/ZIP Code</label>
              <input type = "text" name="postal_code" value="{{old('postal_code')}}" />
              @error('postal_code')
              <span class = "errorSpanMsg"><small>{{$message}}</small></span>
              @enderror
            </div>
            <div class = "form-container">
              <label>Phone</label>
              <input type = "text" name="phone" value="{{old('phone')}}" />
              @error('phone')
              <span class = "errorSpanMsg"><small>{{$message}}</small></span>
              @enderror
            </div>
          </div>
          <div id = "form-checkbox">
            <input id = "defaultAddress" type = "checkbox" name="isCheckedDefault" value = "true" />
            <label for="defaultAddress">Set as default address</label>
          </div>
          <div id = "form-action-btn-container">
            <button>Add Address</button>
          </div>
          <div id = "hide-form-address-container">
            <a class = "cancel-address-form-link">Cancel</a>
          </div>
        </form>
      </div>

      <div class = "user-addresses-container">
        <h2>Your Addresses</h2>
        @foreach($addresses as $address)
        <div data-addressID = "{{$address->id}}" class = "address-container-{{$address->id}} address-container">
          @if($address->status == "true")
          <h3>Default</h3>
          {{-- @else
          <h3></h3> --}}
          @endif
          <p>
            <span class = "firstName-{{$address->id}}">{{$address->first_name}}</span> <span class = "lastName-{{$address->id}}">{{$address->last_name}}</span>
          </p>
          <p>
            <span class = "address-{{$address->id}}">{{$address->address}}</span>
          </p>
          <p>
            <span class = "postalCode-{{$address->id}}">{{$address->postal_code}}</span> <span class = "province-{{$address->id}}">{{$address->province}}</span> <span class = "city-{{$address->id}}">{{$address->city}}</span>
          </p>
          <p>
            <span class = "country-{{$address->id}}">{{$address->country}}</span> <span class = "phone-{{$address->id}}">{{$address->phone_number}}</span>
          </p>
          <p class = "manage-address-container">
            <a class ="editLink" data-addressID = "{{$address->id}}">Edit</a>
            <a class = "deleteLink" data-addressID = "{{$address->id}}">Delete</a>
          </p>
          <div class = "editAddressContainer-{{$address->id}} editAddressContainer">
            <h2>Edit Address</h2>
            <form class = "edit-address-form" method = "POST">
              @csrf
              @method('PUT')
              <div class = "group-form-container">
                <div class = "form-container">
                  <label>First Name</label>
                  <input type = "text" name="firstname" value="{{old('firstname')}}" />
                  @error('firstname')
                  <span class = "errorSpanMsg"><small>{{$message}}</small></span>
                  @enderror
                </div>
                <div class = "form-container">
                  <label>Last Name</label>
                  <input type = "text" name="lastname" value="{{old('lastname')}}" />
                  @error('lastname')
                  <span class = "errorSpanMsg"><small>{{$message}}</small></span>
                  @enderror
                </div>
              </div>
              <div class = "form-container">
                <label>Address</label>
                <input type = "text" name="address" value="{{old('address')}}" />
                @error('address')
                <span class = "errorSpanMsg"><small>{{$message}}</small></span>
                @enderror
              </div>
              <div class = "group-form-container">
                <div class = "form-container">
                  <label>City</label>
                  <input type = "text" name="city" value="{{old('city')}}" />
                  @error('city')
                  <span class = "errorSpanMsg"><small>{{$message}}</small></span>
                  @enderror
                </div>
                <div class = "form-container">
                  <label>Country</label>
                  <input type = "text" name="country" value="{{old('country')}}" />
                  @error('country')
                  <span class = "errorSpanMsg"><small>{{$message}}</small></span>
                  @enderror
                </div>
              </div>
              <div class = "form-container">
                <label>Province</label>
                <input type = "text" name="province" value="{{old('province')}}" />
                @error('province')
                <span class = "errorSpanMsg"><small>{{$message}}</small></span>
                @enderror
              </div>
              <div class = "group-form-container">
                <div class = "form-container">
                  <label>Postal/ZIP Code</label>
                  <input type = "text" name="postal_code" value="{{old('postal_code')}}" />
                  @error('postal_code')
                  <span class = "errorSpanMsg"><small>{{$message}}</small></span>
                  @enderror
                </div>
                <div class = "form-container">
                  <label>Phone</label>
                  <input type = "text" name="phone" value="{{old('phone')}}" />
                  @error('phone')
                  <span class = "errorSpanMsg"><small>{{$message}}</small></span>
                  @enderror
                </div>
              </div>
              <div id = "form-checkbox">
                <input id = "defaultAddress" type = "checkbox" name="isCheckedDefault" value = "true" />
                <label for="defaultAddress">Set as default address</label>
                {{-- <span class = "errorSpanMsg"><small>You Must atleast have one default address checked!</small></span> --}}
              </div>
              <div id = "form-action-btn-container">
                <button>Save Changes</button>
              </div>
              <div id = "hide-form-address-container">
                <a class = "cancel-address-form-link cancel-edit-{{$address->id}}">Cancel</a>
              </div>
            </form>
          </div>
        </div>
        @endforeach
      </div>

      <div class = "show-add-address-btn-container">
        <button>Add a new address</button>
      </div>

      <div class = "backto-user-profile-container">
        <a href = "/profile"><i class="fa fa-angle-left"></i> Return to profile account details</a>
      </div>
    </div>

    <div class = "delete-address-modal-container">
      <div class = "modal-content">
        <h3>Are you sure you want to delete this address?</h3>
        <button class = "btn-close"><i class="fa fa-close"></i></button>
        <form class = "address-form" method = "POST">
          @csrf
          @method('DELETE')
          <button>Delete</button>
        </form>
      </div>
    </div>
    
  </div>
  <script src="{{ asset('js/user-profile-script.js') }}"></script>
@stop

