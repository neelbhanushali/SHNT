@extends('layouts.form')

@section('title', 'Reset Password')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="/assets/index2.html">SHNT<b>ExamCell</b></a>
  </div>

  <div class="register-box-body">
    

    <h3 class="register-box-msg">Reset Password</h3>
    @if(session('messagetype') != 'danger')
    <form id="resetpasswordform" action="" method="post">
      {{csrf_field()}}
      <input type="hidden" name="username" value="{{session('username')}}">
      <input type="hidden" name="token" value="{{session('token')}}">
      <div class="form-group has-feedback">
        <input autofocus autocapitalize="off" type="password" id="password" name="password" class="form-control" placeholder="Password">
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="repeatpassword" class="form-control" placeholder="Repeat Password">
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    @endif
    @if(session()->has('message'))
    <div class="alert alert-{{session()->pull('messagetype')}} alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-{{session()->pull('icon')}}"></i> {{session()->pull('message')}}</h4>
    </div>
    @endif
    <a href="{{route('register')}}" class="text-center">Register</a> &middot;
    <a href="{{route('login')}}" class="text-center">Log In</a> &middot;
    <a href="{{route('forgotpassword')}}" class="text-center">Forgot Password</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection

@section('js')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
  $('#resetpasswordform').validate({
    rules: {
      password: 'required',
      repeatpassword: {
        required: true,
        equalTo: '#password'
      }
    },
    errorElement: "em",
    errorPlacement: function ( error, element ) {
      // Add the `help-block` class to the error element
      error.addClass( "help-block" );

      if ( element.prop( "type" ) === "checkbox" ) {
        error.insertAfter( element.parent( "label" ) );
      } else {
        error.insertAfter( element );
      }
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
    }
  });
});
</script>
@endsection