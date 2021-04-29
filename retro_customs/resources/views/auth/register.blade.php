@extends('master-layout')

@section('title', 'Sign Up Page')

@section('content')
  <div class = "register-container">
    <h1>Sign up</h1>
    <div class = "register-form-container">
     <form action = "/register" method = "POST" class = "register-form" name="registrationForm">
       @csrf
      <span></span>
      <label>Name</label>
      <input id="formName" type ="text" name = "name" placeholder="Ex: Juan Dela Cruz"/>
      <label>Email</label>
      <input id ="formEmail" type ="email" name = "email" placeholder="user@email.com"/>
      <label>Password</label>
      <input id = "formPassword" type ="password" name = "password" placeholder="Input Password"/>
      <label>Confirm Password</label>
      <input id = "formConfirmPassword" type ="password" name = "password" placeholder="Retype Password"/>
      <button>Sign Up</button>
     </form>
    </div>
    <p>
      Have an account? <a href = "/login">Sign In</a>
    </p>
  </div>
  <script src="{{ asset('js/register-script.js') }}"></script>
@stop

