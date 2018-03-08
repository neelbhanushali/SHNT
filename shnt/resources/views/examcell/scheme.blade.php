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

        <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                        <h3 class="box-title">Schemes</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="data-table table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Username</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Type</th>
                                        <th>Username</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                @foreach($users = \App\User::all() as $u)
                                @if($u->type != 'admin')
                                <tbody>
                                    <tr>
                                        <td>{{$u->type}}</td>
                                        <td>{{$u->username}}</td>
                                        <td>
                                            <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                            @if($u->active)
                                            <button class="btn btn-primary"><i class="fa fa-check"></i></button>
                                            @else
                                            <button class="btn btn-danger"><i class="fa fa-ban"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                                @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

</section>
<!-- Main Content 1 ends  -->
@endsection

@section('js')
@parent
<script src="/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('.data-table').DataTable();
});
</script>
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

@section('css')
@parent
<link rel="stylesheet" href="/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection