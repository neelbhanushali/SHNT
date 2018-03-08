@extends('layouts.dashboard')

@section('username', session()->get('username'))
@section('title', 'Dashboard')

@section('breadcrumb')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@yield('title')</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">Activations</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
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
</section
@endsection

@section('js')
@parent
<script src="/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('.data-table').DataTable();
});
</script>
@endsection

@section('css')
@parent
<link rel="stylesheet" href="/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection