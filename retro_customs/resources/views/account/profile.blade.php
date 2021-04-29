@extends('master-layout')

@section('title', 'My Account')

@section('content')

  {{-- @include('account.profile-layout'); --}}

  <div class = "profile-container">

    @if($user->role->role == "admin")
      @include('subview.profile-admin')
      <script src="{{ asset('js/admin-profile-script.js') }}"></script>
    @else
      @include('subview.profile-user')
    @endif
    
  </div>
  
@stop

