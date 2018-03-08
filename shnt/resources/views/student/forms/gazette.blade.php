@extends('layouts.dashboard')

@section('title', 'Gazette')

@section('breadcrumb')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@yield('title')</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{route('student.forms.gazette')}}"><i class="fa fa-vcard-o"></i> Gazette</a></li>
    </ol>
</section>
@endsection

@section('content')
<!-- Main content 1 -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">View your marks and grades</h3>
    </div>
    <div class="box-body">
      <!-- COURSE form starts -->
      <!-- COURSE form ends -->
    </div>
  </div>
  <!-- /.box -->

</section>
<!-- Main Content 1 ends  -->

<script type="text/javascript">
  
</script>

@endsection 