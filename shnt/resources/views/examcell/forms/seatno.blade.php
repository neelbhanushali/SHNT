@extends('layouts.dashboard')
@section('username', session()->get('username'))
@section('page', 'Seat Number')

@section('css')
@parent
<link href="/assets/vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
@endsection

@section('breadcrumbs')
<li><a href="">HOME</a></li>
<li><a href="">CURRICULUM</a></li>
<li><a href="">SEAT NUMBER</a></li>
@endsection


@section('content')
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div id="table-datatables">
                <h4 class="header">Generate Seat Number</h4>
                <div class="row">
                    <form class="col s12">
                        <div class="input-field col s6">
                            <select name="department">
                            <option value="" disabled selected>Choose Department</option>
                                @foreach($departments = \App\Department::all() as $dept)
                                    <option data-year="{{$dept->years}}" value="{{$dept->dept}}">{{$dept->department}}</option>
                                @endforeach
                            </select>
                            <label>Select Department</label>
                        </div>  
                        <div class="input-field col s6">
                            <select name="Scheme">
                            <option value="" disabled selected>Choose Scheme</option>
                                @foreach($schemes = \App\Scheme::all() as $scheme)
                                    <option value="{{$scheme->scheme}}">{{$scheme->scheme}}</option>
                                @endforeach
                            </select>
                            <label>Select Scheme</label>
                        </div>  
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Get Seat Number List
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</div>

<div class="card-panel">
    <div id="table-datatables">
        <h4 class="header">Seat Number List</h4>
        <div class="row">
            <div class="col s12">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                <thead>
                <tr>
                    <th>Sr Numbers</th>
                    <th>Names</th>
                    <th>Seat Numbers</th>
                    <th>Sign</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Haris Shaikh</td>
                    <td>COC8001</td>
                    <td>Sign</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Sohail Khan</td>
                    <td>COC8002</td>
                    <td>Sign</td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@parent
<script type="text/javascript" src="/assets/vendors/jquery-3.2.1.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="/assets/js/plugins.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="/assets/js/custom-script.js"></script>
<script type="text/javascript" src="/assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
<!--data-tables.js - Page Specific JS codes -->
<script type="text/javascript" src="/assets/js/scripts/data-tables.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="/assets/js/plugins.js"></script>
@endsection
