@if(session()->get('type') == 'admin')
<script>
window.location.href = "{{route('dashboard')}}";
</script>
@endif

@extends('layouts.dashboard')

@section('username', $user->username)
@section('title', 'Profile')

@section('breadcrumb')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@yield('title')</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{route('profile')}}"><i class="fa fa-user"></i> Profile</a></li>
    </ol>
</section>
@endsection

@section('content')
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Personal Details</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form">
            <div class="box-body">
            <div class="form-group">
                <input type="text" name="mname" class="form-control" placeholder="Middle Name">
            </div>
            <div class="form-group">
                <input type="text" name="lname" class="form-control" placeholder="Last Name">
            </div>
            <div class="check-box">
                <label>Gender: </label>
                <label>
                    <input type="radio" name="gender" name="m">
                    <span>Male</span>
                </label>
                <label>
                    <input type="radio" name="gender" name="f">
                    <span>Female</span>
                </label>
            </div>
            <div class="form-group">
                <label>DOB</label>
                <input class="form-control datepicker" type="text" name="dob" placeholder="DOB" readonly>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="address" placeholder="Address"></textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image">
            </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
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