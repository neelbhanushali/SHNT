@extends('layouts.dashboard')

@section('page', 'Profile')

@section('breadcrumbs')
<li><a href="{{route('dashboard')}}">HOME</a></li>
<li><a href="{{route('profile')}}">PROFILE</a></li>
@endsection

@section('content')
<div class="row">
<div class="col s12">
    <div class="card-panel">
      <h4 class="header2">Personal Details</h4>
      <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <span>Name: </span>
                    <span>{{$user->firstname}} {{$user->middlename}} {{$user->lastname}} {{$user->mothername}}</span>
                </div>
                <div class="col s12">
                    <span>Email: </span>
                    <span>{{$user->email}}</span>
                </div>
            </div>
            <div class="row">
                @if(empty($user->firstname))
                <div class="input-field col s3">
                    <input value="{{$user->firstname}}" id="firstname" name="firstname" type="text" class="validate">
                    <label for="firstname">First Name</label>
                </div>
                @endif
                @if(empty($user->middlename))
                <div class="input-field col s3">
                  <input value="{{$user->middlename}}" id="middlename" name="middlename" type="text" class="validate">
                  <label for="middlename">Middle Name</label>
                </div>
                @endif
                @if(empty($user->lastname))
                <div class="input-field col s3">
                  <input value="{{$user->lastname}}" id="lastname" name="lastname" type="text" class="validate">
                  <label for="lastname">Last Name</label>
                </div>
                @endif
                @if(empty($user->mother))
                <div class="input-field col s3">
                  <input value="{{$user->mothername}}" id="mothername" name="mothername" type="text" class="validate">
                  <label for="mothername">Mother's Name</label>
                </div>
                @endif
            </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">email</i>
              <input id="email4" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">lock_outline</i>
              <input id="password5" type="password" class="validate">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">question_answer</i>
              <textarea id="message4" class="materialize-textarea validate" length="120"></textarea>
              <label for="message">Message</label>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection

@section('css')
@parent
<link rel="stylesheet" href="/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection

@section('js')
@parent
<script src="/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            autoclose: true, 
            format: 'yyyy/mm/dd',
            ignoreReadonly: true,
            allowInputToggle: true
        });
    });
</script>
@endsection