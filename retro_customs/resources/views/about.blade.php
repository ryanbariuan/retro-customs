@extends('master-layout')

@section('title', 'About Us')

@section('content')

<div class = "about-container">
  <div class = "about-header">
    <h1>About Us</h1>
  </div>
  <div class = "brand-logo">
    <div class = "logo-img-wrapper">
      <img src = "{{asset('assets/retrocustoms_mascot.png')}}"/>
    </div>
  </div>
  <div class = "about-content">
    <h2>Retro Customs</h2>
    <p>
      Is a sample project portfolio website made in Laravel 8. The website imitates an online
      store for customized ordering of its products offered. In this project the website focuses
      in selling retro handheld consoles for modding enthusiast. Once registered as a customer,
      Users can create a build order of a specific console then assign parts for customization.
      After order transaction is finished the admin can view all placed orders that the users made.  
      All images and fonts used are from the internet.
    </p>
    <h3>Features</h3>
    <ul>
      <li>Product items customization through the admin side.</li>
      <li>User registration, customization of user addresses.</li>
      <li>Simulates user product item ordering and customizations of parts included.</li>
      <li>Order HIstory will be populated upon successful ordering</li>
    </ul> 
  </div>
</div>

@stop