@extends('layouts.form')

@section('page', 'Login')

@section('content')
<div id="login-page" class="row">
  <div class="col s12 z-depth-4 card-panel">
    <form id="login-form" method="post" action="{{action('user@login')}}">
      <fieldset class="form-fieldset">
      {{--  {{csrf_field()}}  --}}
      <div class="row">
        <div class="input-field col s12 center">
          <h4>Login</h4>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">person_outline</i>
          <input name="username" id="username" type="text">
          <label for="username" class="center-align">Username</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-5">lock_outline</i>
          <input id="password" type="password" name="password">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 center">
          <button type="submit" class="btn waves-effect waves-light">Login</button>
        </div>
        <div class="input-field col s12">
          <p class="margin center medium-small sign-up"><a href="{{route('register')}}">Register</a> | <a href="{{route('forgotpassword')}}">Forgot Password</a></p>
        </div>
      </div>
      </fieldset>
    </form>
  </div>
</div>
@endsection

@section('js')
@parent
<script>
  $(document).ready(function() {
    $('#login-form').validate({
      rules: {
        username: 'required',
        password: 'required'
      }
    });

    $('#login-form').submit(function(e) {
      if(!$(this).valid()) return;

      e.preventDefault();
      var form = $(this);
      var formdata = $(form).serialize();
      $(form).loading();

      $.post(
        $(form).attr('action'),
        formdata,
        function(data) {
          data = JSON.parse(data);
          $('meta[name="csrf-token"]').attr('content', data._token);
          if(data.login) {
            swal({
              title: data.title,
              text: data.message,
              type: data.type
            }, function() {
              window.location.reload();
            });
          }
          else {
            swal(data.title, data.message, data.type);
            $(form).done();
            Materialize.updateTextFields();
          }
          
        }
      );
    });
  });
</script>
@endsection