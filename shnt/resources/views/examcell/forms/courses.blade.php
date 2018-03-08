@extends('layouts.dashboard')

@section('username', session()->get('username'))
@section('title', 'Courses')

@section('breadcrumb')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@yield('title')</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{route('examcell.forms.courses')}}"><i class="fa fa-newspaper-o"></i> Courses</a></li>
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
      <h3 class="box-title">Fill out the following form to add Subjects in Different Semesters</h3>
    </div>
    <div class="box-body">
      <!-- COURSE form starts -->
      <form action="" method="post" id="courseform">
        {{csrf_field()}}

        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="title" placeholder="TITLE" class="form-control">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="short"  placeholder="SHORT FORM FOR SUBJECT" class="form-control">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="code" placeholder="COURSE CODE" class="form-control">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-7">
            <select name="department" class="form-control">
              <option value="" disabled selected>SELECT DEPARTMENT</option>
              @foreach($department = \App\Department::all() as $department)
              <option value="{{strtoupper($department->dept)}}">{{strtoupper($department->department)}}</option>
              @endforeach
            </select> 
          </div>
        </div>
        <br>
        <!-- ADD SEMESTER CODE -->
        <div class="row form-group">
            <div class="col-sm-7">
            <select class="form-control" name="semester">
            <option value="" selected disabled>SELECT SEMESTER</option>
          </select>
            </div>
          </div>
        <!-- ADD SEMESTER CODE -->

        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="ia1" placeholder="INTERNAL ASSESSMENT 1" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="ia2" placeholder="INTERNAL ASSESSMENT 2" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="ese" placeholder="THEORY" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="tw" placeholder="TERMWORK" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="oral" placeholder="ORAL" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="pror" placeholder="PRACTICAL/ORAL (if applicable)" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="c_th" placeholder="CREDITS FOR THEORY" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="c_pt" placeholder="CREDITS FOR PRACTICAL & TERMWORK" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7 form-group">
            <input type="text" name="c_tut" placeholder="CREDITS FOR TUTORIAL" class="form-control">
          </div>
        </div>      

        <br>
        <div class="row form-group">
          <div class="col-sm-7">
            <input type="submit" name="submit" class="btn btn-primary btn-flat" value="CREATE COURSE">
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
<script>
  var departments = JSON.parse('{!!\App\Department::select(['dept','years'])->get()->toJson()!!}');
  
  $(document).ready(function() {
    $('#courseform [name=department]').change(function() {
      for(var i = 0; i < departments.length; i++) {
        if(departments[i].dept == $(this).val()) {
          $('#courseform [name=semester]').html("<option value='' disabled selected>SELECT SEMESTER</option>");
          for(var j = 1; j <= departments[i].years*2; j++) {
            $('#courseform [name=semester]').append("<option value="+j+">"+j+"</option>");
          }
        }
      }
    });

    $('#courseform').validate({
      rules: {
        title: 'required',
        short: 'required',
        code: 'required',
        department: 'required',
        semester: 'required',
        ia1: 'required',
        ia2: 'required',
        ese: 'required',
        c_th: 'required',
        c_pt: 'required',
        c_tut: 'required',
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