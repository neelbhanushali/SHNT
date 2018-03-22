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
<div class="row">
  <div class="col s12 m12 l12">
    <div class="card-panel">
      <h4 class="header">ATKT PAPERS</h4>
      
    </div>
  </div>
</div>
@endsection 