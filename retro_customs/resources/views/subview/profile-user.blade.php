<div class = "welcome-msg-container">
  <p>Welcome to RetroCustoms {{$user->name}}</p>
</div>
<h1>My Profile Account</h1>
<div class = "user-profile-container">
  <div class = "order-history-container">
    <h2>Order History</h2>
    @if($userBuildOrders->count() > 0)
    <div class = "order-history">
      @foreach($userBuildOrders as $userBuild_order)
        <a class = "buildOrder buildOrder-{{$userBuild_order->id}}">
          <div class = "ordered-details">
            <label>Build Order ID: <span>{{$userBuild_order->id}}</span></label>
            <label>Ordered Time: <span>{{$userBuild_order->created_at}}</span></label> 
            <label>Ordered Status: <span class="status">{{$userBuild_order->order_status}}</span></label>
            <label>Base Price: $<span>{{$userBuild_order->console->price}}</span> USD</label>  
            <label>Extra Cost: $<span>{{$userBuild_order->total_price - $userBuild_order->console->price}}</span> USD</label>  
            <label>Order Total: $<span>{{$userBuild_order->total_price}}</span> USD</label>  
          </div>
          <div class = "ordered-item-details">
            <div class = "ordered-console-container">
              <div class = "img-wrapper">
                <img 
                  alt = "{{$userBuild_order->console->console_name}}" 
                  src = "{{$userBuild_order->console->image}}"
                />
              </div>
              <p>
                {{$userBuild_order->console->console_name}}
              </p>
            </div>
          </div>

          <div class = "ordered-parts-container">
            @foreach($partBuildOrders as $partBuild_order)
              @if($partBuild_order->build_order_id == $userBuild_order->id)
                <div class = "part-details">
                  <div class = "img-wrapper">
                    <img
                      alt = "{{$partBuild_order->part->part_name}}"
                      src = "{{$partBuild_order->part->image}}"
                    />
                  </div>
                  <p>
                    {{$partBuild_order->part->part_name}}
                  </p>
                  <p>
                    ${{$partBuild_order->part->price}} USD
                  </p>
                </div>
              @endif
            @endforeach
          </div>

        </a>
      @endforeach
    </div>
    @else
    <p>You haven't placed any orders yet.</p>
    @endif
  </div>
  <div class = "account-details-container">
    <h2>Account Details</h2>

    @if($addresses->count() > 0)
      @if($defAddress)
      <div class = "default-address-container">
        <p>
          <span class = "firstName-{{$defAddress->id}}">{{$defAddress->first_name}}</span> <span class = "lastName-{{$defAddress->id}}">{{$defAddress->last_name}}</span>
        </p>
        <p>
          <span class = "address-{{$defAddress->id}}">{{$defAddress->address}}</span>
        </p>
        <p>
          <span class = "postalCode-{{$defAddress->id}}">{{$defAddress->postal_code}}</span> <span class = "province-{{$defAddress->id}}">{{$defAddress->province}}</span> <span class = "city-{{$defAddress->id}}">{{$defAddress->city}}</span>
        </p>
        <p>
          <span class = "country-{{$defAddress->id}}">{{$defAddress->country}}</span> <span class = "phone-{{$defAddress->id}}">{{$defAddress->phone_number}}</span>
        </p>
      </div>
      @else
      <div class = "default-address-container">
        <p>No default address set</p>
      </div>
      @endif
    @endif
    <a href = "/profile/{{$user->id}}/addresses">View Addresses({{$addresses->count()}})</a>
  </div>
</div>

