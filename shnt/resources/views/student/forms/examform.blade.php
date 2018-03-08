@extends('layouts.dashboard')

@section('title', 'Exam Form')

@section('breadcrumb')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@yield('title')</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{route('student.forms.examform')}}"><i class="fa fa-pencil-square-o"></i> Exam Form</a></li>
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
      <h3 class="box-title">Check and Apply For Upcoming Examination</h3>
    </div>
    <div class="box-body">
      @foreach($exams = \App\Examination::where('department', 'CO')->orderBy('semester')->get() as $exam)
        <form action="" method="post">
          {{csrf_field()}}
          <input type="hidden" name="examination_id" value="{{$exam->id}}">
          <input type="hidden" name="rollnumber" value="{{session()->get('username')}}">
          <div>{{$exam->title}}</div>
          @if(\App\Form::where('examination_id', $exam->id)->where('rollnumber', '13CO19')->first() != null)
          <span>APPLIED</span>
          @else
          <button>APPLY</button>
          @endif

        </form>
        <br>
      @endforeach
    </div>
  </div>
  <!-- /.box -->

</section>
<!-- Main Content 1 ends  -->

<script type="text/javascript">

</script>

@endsection 