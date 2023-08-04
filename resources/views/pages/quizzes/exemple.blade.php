@extends('layouts.layouts')
@section('content')
  
<div class="wrapper bg-white rounded">
  <div class="content">
      <a href="#"><span class="fa fa-angle-left pr-2"></span>Back</a>
      <p class="text-muted">Multiple Choice Question</p>
      <p class="text-justify h5 pb-2 font-weight-bold">What did mean ugly?</p>
          <div class="options py-3">
          <label class="rounded p-2 option">
              His boxing gloves
              <input type="radio" name="radio">
              <span class="crossmark"></span>
            </label>
            <label class="rounded p-2 option">
              A parachute
              <input type="radio" name="radio">
              <span class="checkmark"></span>
            </label>
            <label class="rounded p-2 option">
              Nothing
              <input type="radio" name="radio">
              <span class="crossmark"></span>
            </label>
            <label class="rounded p-2 option">
              A world little belt
              <input type="radio" name="radio">
              <span class="crossmark"></span>
            </label>
      </div>

    </div>
    <input type="submit" value="Next" class="mx-sm-0 mx-1">
  </div>
  @endsection