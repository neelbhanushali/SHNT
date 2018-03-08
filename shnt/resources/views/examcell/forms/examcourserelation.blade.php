@extends('layouts.dashboard')

@section('username', session()->get('username'))
@section('title', 'Exam-Courses')

@section('breadcrumb')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@yield('title')</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{route('examcell.forms.examcourserelation')}}">Exam <i class="fa fa-arrows-h"></i>Courses</a></li>
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
      <h3 class="box-title">Add courses to examinations</h3>
    </div>
    <div class="box-body">
      <!-- COURSE form starts -->
      <form action="" method="post" id="examcourseform">
        {{csrf_field()}}

        <div class="row">
          <div class="col-sm-7">
            <select name="examination_id" class="form-control select2">
              <option value="" disabled selected>SELECT EXAMINATION</option>
              @foreach($exams = \App\Examination::all() as $exam)
              <option value="{{strtoupper($exam->id)}}">{{strtoupper($exam->title)}}</option>
              @endforeach
            </select> 
          </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-7">
              <select name="course_id" class="form-control select2">
                <option value="" disabled selected>SELECT COURSE</option>
                @foreach($courses = \App\Course::all() as $course)
                <option value="{{strtoupper($course->id)}}">{{strtoupper($course->title)}}</option>
                @endforeach
              </select> 
            </div>
          </div>
          <br>
          <div class="row">
              <div class="col-sm-7 form-group">
                <label>Start</label>
                <input type="datetime-local" class="form-control" name="start">
              </div>
            </div>

            <div class="row">
                <div class="col-sm-7 form-group">
                  <label>End</label>
                  <input type="datetime-local" class="form-control" name="end">
                </div>
              </div>

        <div class="row form-group">
          <div class="col-sm-7">
            <input type="submit" name="submit" class="btn btn-primary btn-flat" value="RELATE COURSE WITH EXAMINATION">
          </div>
        </div>
      </form>
      <!-- COURSE form ends -->
    </div>
  </div>
  <!-- /.box -->

</section>
<!-- Main Content 1 ends  -->

<script type="text/javascript">
  
</script>

@endsection

@section('js')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
    $('#examcourseform').validate({
      rules: {
        examination_id: 'required',
        course_id: 'required'
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

@section('css')
@parent
<link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
@endsection