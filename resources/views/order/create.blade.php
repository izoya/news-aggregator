@extends('layouts.main')

@section('content')
  {{-- Contact Form --}}
  <div class="col-md-6 fadeInUp animated animated" data-wow-delay=".5s" style="visibility: visible;
              -webkit-animation-delay: .5s; -moz-animation-delay: .5s; animation-delay: .5s;">

    <x-title title="Data extraction request"></x-title>

    <form class="shake" role="form" method="post" id="userForm" name="order-form"
          data-toggle="validator" novalidate="true" action="/order">
      @csrf
      <div class="form-group label-floating is-empty">
        <label class="control-label" for="name">Name</label>
        <input class="form-control" id="name" type="text" name="name" required=""
               data-error="Please enter your name" value="{{ old('name') }}">
        <div class="help-block with-errors"></div>
      </div>

      <div class="form-group label-floating is-empty">
        <label class="control-label" for="email">Email</label>
        <input class="form-control" id="email" type="email" name="email" required=""
               data-error="Please enter your Email" value="{{ old('email') }}">
        <div class="help-block with-errors"></div>
      </div>

      <div class="form-group label-floating is-empty">
        <label class="control-label" for="phone">Phone number</label>
        <input class="form-control" id="phone" type="tel" name="phone" required=""
               data-error="Please enter your phone number"  value="{{ old('phone') }}">
        <div class="help-block with-errors"></div>
      </div>

      <div class="form-group label-floating is-empty">
        <label for="request" class="control-label">Request</label>
        <textarea class="form-control" rows="3" id="request" name="request" required=""
                  data-error="Describe the data you are seeking for.">{{ old('request') }}</textarea>
        <div class="help-block with-errors"></div>
      </div>

      <div class="form-submit mt-4 pt-1">
        <div id="msgSubmit" class="text-center hidden"></div>
        <button class="btn btn-common disabled" type="submit" id="form-submit"
                style="pointer-events: all; cursor: pointer;">
          <i class="material-icons mdi mdi-file-send"></i> Send Request
        </button>

        <div class="clearfix"></div>
      </div>
    </form>
  </div>
@endsection
