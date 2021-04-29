@extends('master-layout')

@section('title', 'Login Page')

@section('content')
  <div class = "login-container">
    @if(session()->has('info'))
    <div class ="form-info-msg-container">
      <small>{{ session()->get('info') }}</small>
    </div>
    @endif
    <h1>Sign In</h1>
    <div class = "login-form-container">
     <form action = "/login" method = "POST" class = "login-form" name="loginForm">
       @csrf
      <span></span>
      <label>Email</label>
      <input id ="formEmail" type ="email" name = "email" placeholder="user@email.com"/>
      <label>Password</label>
      <input id = "formPassword" type ="password" name = "password" placeholder="Your Password"/>
      <button>Login</button>
     </form>
    </div>
    <p>
      New Customer? <a href = "/register">Create an account</a>
    </p>
  </div>
  <script src="{{ asset('js/login-script.js') }}"></script>
@stop

