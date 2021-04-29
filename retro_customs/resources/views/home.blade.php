@extends('master-layout')

@section('title', 'Home Page')

@section('content')


<div class = "home-container">
  <div class = "home-container-wrap">
    <div class = "intro-container">
      <div class = "intro-info">
        <h1>
          Bring back the nostalgia!
        </h1>
        <div class = "brand-logo">
          <div class = "logo-img-wrapper">
            <img src = "{{asset('assets/retrocustoms_mascot.png')}}"/>
          </div>
        </div>
        <p>
          Vintage handheld consoles are a thing of the past but some still
          remembers how awesome it is to travel back in time and relive
          your childhood handheld gaming experience. Retro Customs makes your
          retro console dreams come true by offering retro modding services
          to this modern day age of gaming. We restore and recreate your childhood
          gaming memories with our customized designed for the console parts and
          as well as modifications. Whether you like backlighting your handheld or
          installing customized battery packs, Modernizing your retro console is what Retro Customs
          specializes for.
        </p>
      </div>
      <div class = "intro-image">
        <img alt ="intro-image" src = "https://www.gameinformer.com/sites/default/files/styles/thumbnail/public/2021/02/04/8e8db638/gba-sp-mod-website-thumbnail.jpg"/>
      </div>
    </div>
    <div class = "checkout-container">
      <a href = "/consoles">Checkout our Consoles <i class="fa fa-angle-right"></i></a>
    </div>
    <div class = "checkout-container">
      <a href = "/products">Checkout our Product Parts <i class="fa fa-angle-right"></i></a>
    </div>
  </div>
  
</div>

@stop