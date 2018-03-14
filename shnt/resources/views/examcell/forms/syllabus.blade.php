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
                <h4 class="header">SYLLABUS</h4>
                <div class="row">
                    <div class="col s12">
                        <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>SCHEME NAME</td>
                                    <td>DEPARTMENT</td>
                                    <td>SEMESTER</td>
                                    <td>WEF</td>
                                    <td></td>
                                </tr>
                            </thead>
                            @foreach($examination = \App\Examination::all() as $e)
                            <tr>
                                <td>{{$e->scheme}}</td>
                                <td>{{$e->department}}</td>
                                <td>{{$e->semester}}</td>
                                <td>{{$e->wef}}</td>
                                <td>
                                    <form action="" method="post">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <input type="hidden" name="id" value="{{$e->id}}">
                                        <button type="button" onclick="editScheme(this)" class="btn-floating waves-effect waves-light editbtn">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" onclick="deleteScheme(this)" class="btn-floating waves-effect red waves-light deletebtn">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<div class="fixed-action-btn">
<a id="schemeadd" class="btn-floating btn-large btn modal-trigger" href="#syllabusmodal">
    <i class="material-icons">add</i>
</a>
</div>
<!-- Modal Structure -->
<div id="syllabusmodal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4 class="header">SYLLABUS</h4>
        <form action="" method="post" id="syllabusform" onsubmit="syllabusSubmit(this, event)">
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
                <label for="wef">With Effect From</label>
            </div>
        </div>
        <div class="" id="subjectarea">
            <h4 class="header">ENTER SUBJECTS FOR THE SCHEME</h4>
            <div class="subject-card card-panel">
                <fieldset>
                <button type="button" onclick="removeSubjectPanel(this)" class="close-btn btn btn-floating red right"><i class="material-icons">close</i></button>
                <div class="row">
                    <div class="input-field col s4">
                        <input id="idcode" type="text" name="code[]">
                        <label for="code[]">CODE</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input id="idshort" type="text" name="short[]">
                        <label for="short[]">SHORT FORM</label>
                    </div>
                    <div class="input-field col s8">
                        <input id="idtitle" type="text" name="title[]">
                        <label for="title[]">TITLE</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="idia1" type="number" name="ia1[]">
                        <label for="ia1[]">UNIT TEST 1</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="idia2" type="number" name="ia2[]">
                        <label for="idia2">UNIT TEST 2</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="idtw" type="number" name="tw[]">
                        <label for="idtw">TERMWORK</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6" id="prordiv">
                        <input type="number" name="pror[]" id="pror">
                        <label for="oral">ENTER PRACTICAL/ORAL MARKS</label>
                    </div>
                    <div class="input-field col s6" id="oraldiv">
                        <input type="number" name="oral[]" id="oral">
                        <label for="oral">ENTER ORAL MARKS</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4" id="prordiv">
                        <input type="number" name="c_th[]" id="c_th">
                        <label for="c_th">ENTER THEORY CREDITS</label>
                    </div>
                    <div class="input-field col s4" id="prordiv">
                        <input type="number" name="c_pt[]" id="c_pt">
                        <label for="c_pt">ENTER PRACTICAL/ TERMWORK CREDITS</label>
                    </div>
                    <div class="input-field col s4" id="prordiv">
                        <input type="number" name="c_tut[]" id="c_tut">
                        <label for="c_tut">ENTER TUTORIAL CREDITS</label>
                    </div>
                </div>
                </fieldset>
            </div>
        </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="addSubjectPanel()" class="modal-action waves-effect waves-green btn">Add Subject</button>
        <span> </span>
        <button form="syllabusform" class="modal-action waves-effect waves-green btn">Add Syllabus</button>
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
<script type="text/javascript" src="/assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/assets/js/custom-script.js"></script>
<!--data-tables.js - Page Specific JS codes -->
<script type="text/javascript" src="/assets/js/scripts/data-tables.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="/assets/js/plugins.js"></script>
<script>
    function removeSubjectPanel(el) {
        if($('.subject-card').length == 1) return;

        $(el).closest('.subject-card')[0].remove();
    }

    function addSubjectPanel() {
        $('#subjectarea').append($('.subject-card')[0].outerHTML);
        Materialize.updateTextFields();
    }

    function syllabusSubmit(el, e) {
        e.preventDefault();
        console.log(e);
        console.log(el);
        console.log($(el).serialize());
    }

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


@section('css')
@parent
<style>
    #subjectarea .subject-card:first-child .close-btn { display: none; }
</style>
@endsection