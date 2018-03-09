@extends('layouts.dashboard')
@section('page', 'Syllabus')

@section('css')
@parent
<link href="/assets/vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
@endsection

@section('breadcrumbs')
<li><a href="">HOME</a></li>
<li><a href="">CURRICULUM</a></li>
<li><a href="">SYLLABUS</a></li>
@endsection


@section('content')
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div id="table-datatables">
                <h4 class="header">SCHEME</h4>
                <h6 class="header">This table will show you all the syllabus available in the system.</h6> 
                <div class="row">
                    <div class="col s12">
                        <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>SCHEME NAME</td>
                                    <td>WITH EFFECT FROM</td>
                                </tr>
                            </thead>
                            @foreach($scheme = \App\Scheme::orderBy('wef','desc')->get() as $schemes)
                            <tr>
                                <td>{{$schemes->scheme}}</td>
                                <td>{{$schemes->wef}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header">SYLLABUS</h4>
            <div class="row">
                <div class="input-field col s6">
                    <select>
                    <option value="" disabled selected>Choose Scheme</option>
                    @foreach($schemes = \App\Scheme::all() as $s)
                        <option value="{{$s->scheme}}">{{$s->scheme}}</option>
                    @endforeach
                    </select>
                    <label>Select Scheme</label>
                </div>
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
                    <select name="semester">
                    <option value="" disabled selected>Choose Semester</option>
                    </select>
                    <label>Select Semester</label>
                </div>
                <div class="input-field col s6">
                    <input id="wef" name="wef" type="text">
                    <label for="wef">With Effet From</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@parent
<script type="text/javascript" src="/assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
<!--data-tables.js - Page Specific JS codes -->
<script type="text/javascript" src="/assets/js/scripts/data-tables.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="/assets/js/plugins.js"></script>
<script>
    $(document).ready(function(){
        $('select[name=department]').on('change',function() {
            var dept= $(this);
            var sem = $('select[name=semester]');
            $(dept).find('option').each(function(){
                if($(this).attr('value') == $(dept).val()) {
                    var year = $(this).data('year');
                    sem.html('<option disabled selected>Choose Semester</option>');
                    for(var i = 1; i <= year*2; i++)
                        // $(sem).append('<option value="'+i+'">'+i+'</option>');
                        sem.append("<option value="+i+">"+i+"</option>");
                }
            });
            $('select').material_select();
        });
    });
</script>
@endsection
