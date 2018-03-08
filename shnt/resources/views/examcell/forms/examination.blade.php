@extends('layouts.dashboard')

@section('username', session()->get('username'))
@section('title', 'Curriculum')

@section('breadcrumb')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@yield('title')</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{route('examcell.forms.examination')}}"><i class="fa fa-book"></i> Examination</a></li>
    </ol>
</section>
@endsection

@section('content')
<!-- Main content 1 -->
<section class="content">

  <!-- Default box -->
  <div class="box box-primary">
      @if(session()->has('message'))
      <div class="alert alert-{{session()->pull('messagetype')}} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-{{session()->pull('icon')}}"></i> {{session()->pull('message')}}</h4>
      </div>
      @endif
    <div class="box-header with-border">
      <h3 class="box-title">Fill out the following form to setup curricullum for different Departments</h3>
    </div>
    <div class="box-body">
      <!-- examination form starts -->
      <form id="examinationform" action="" method="post">
        {{csrf_field()}}
        <div class="row form-group">
        <div class="col-sm-7">
          
        <select class="form-control" name="department">
          <option value="" selected disabled>SELECT DEPARTMENT</option>
          @foreach($departments = \App\Department::all() as $department)
          <option value="{{strtoupper($department->dept)}}">{{strtoupper($department->department)}}</option>
          @endforeach
        </select>
        </div>  
        </div>

        <div class="row form-group">
          <div class="col-sm-7">
          <select class="form-control" name="semester">
          <option value="" selected disabled>SELECT SEMESTER</option>
        </select>
          </div>
        </div>

        <div class="row form-group">
        <div class="col-sm-7">
        <select class="form-control" name="half">
          <option value="" selected disabled>SELECT HALF</option>
          <option value="first half">FIRST HALF</option>
          <option value="second half">SECOND HALF</option>
        </select>
        </div>
        </div>

      

        <div class="row form-group">
          <div class="col-sm-7">
            <input type="text" name="title" placeholder="TITLE" class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-7">
            <input type="text" name="year" placeholder="ACADEMIC YEAR" class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-7">
            <input type="submit" name="submit" class="btn btn-primary btn-flat" value="CREATE EXAMINATION">
          </div>
        </div>
      </form>
      <!-- examination form ends -->
    </div>
  </div>
  <!-- /.box -->

</section>
<!-- Main Content 1 ends  -->
@endsection

@section('js')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
  var departments = JSON.parse('{!!\App\Department::select(['dept','years'])->get()->toJson()!!}');
  $(document).ready(function() {
    $('#examinationform [name=department]').change(function() {
      for(var i = 0; i < departments.length; i++) {
        if(departments[i].dept == $(this).val()) {
          $('#examinationform [name=semester]').html("<option value='' disabled selected>SELECT SEMESTER</option>");
          for(var j = 1; j <= departments[i].years*2; j++) {
            $('#examinationform [name=semester]').append("<option value="+j+">"+j+"</option>");
          }
        }
      }
    });

    $('#examinationform').validate({
      rules: {
        department: 'required',
        semester: 'required',
        half: 'required',
        title: 'required',
        year: 'required',
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