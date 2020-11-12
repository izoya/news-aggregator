@extends('layouts.main')

@section('content')

{{-- Title --}}
<x-title title="We’re always here to hear form you"></x-title>

<div class="row mt-5">

  {{-- Contacts --}}
  <div class="col-md-5 contact-widget-section2 fadeInUp animated animated" data-wow-delay=".5s"
       style="visibility: visible;-webkit-animation-delay: .5s; -moz-animation-delay: .5s; animation-delay: .5s;">
    <h2 class="subtitle">Find Us</h2>
    <div class="find-widget">
      <a href="#"><i class="material-icons mdi mdi-home"></i> @include('includes.address')</a>
    </div>
    <div class="find-widget">
      <a href="#"><i class="material-icons mdi mdi-email"></i> @include('includes.email')</a>
    </div>
    <div class="find-widget">
      <a href="#"><i class="material-icons mdi mdi-phone mr-3"></i> @include('includes.phone')</a>
    </div>
  </div>

  {{-- Contact Form --}}
  <div class="col-md-6 fadeInUp animated animated" data-wow-delay=".5s" style="visibility: visible;
              -webkit-animation-delay: .5s; -moz-animation-delay: .5s; animation-delay: .5s;">
    <h2 class="subtitle">Contact Form</h2>
    <form class="shake" role="form" method="post" id="userForm" name="contact-form"
          data-toggle="validator" novalidate="true">
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
        <label class="control-label" for="msgSubject">Subject</label>
        <input class="form-control" id="subject" type="text" name="subject" required=""
               data-error="Please enter your message subject" value="{{ old('subject') }}">
        <div class="help-block with-errors"></div>
      </div>

      <div class="form-group label-floating is-empty">
        <label for="message" class="control-label">Message</label>
        <textarea class="form-control" rows="3" id="message" name="message" required=""
                  data-error="Write your message">{{ old('message') }}"</textarea>
        <div class="help-block with-errors"></div>
      </div>

      <div class="form-submit mt-4 pt-1">
        <div id="msgSubmit" class="text-center hidden"></div>
        <button class="btn btn-common disabled" type="submit" id="form-submit" style="pointer-events: all; cursor: pointer;"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>

        <div class="clearfix"></div>
      </div>
    </form>
  </div>

</div>

@endsection

@push('js')
<script lang="javascript">

function getFormAction() {
  return "{{ route('feedback.store') }}"
}

</script>
@endpush
