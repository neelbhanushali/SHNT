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
            <div>
                <h4 class="header">SYLLABUS</h4>
                <div class="row">
                    <div class="col s12">
                        <table class="datatable display" cellspacing="0">
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
                                        <button type="button" onclick="editSyllabus(this)" class="btn-floating waves-effect waves-light editbtn">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" onclick="deleteSyllabus(this)" class="btn-floating waves-effect red waves-light deletebtn">
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
<a id="syllabusadd" class="btn-floating btn-large btn modal-trigger" href="#syllabusmodal">
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
                <select name="scheme">
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

                <div class="row">
                    <div class="input-field col s6" id="prordiv">

                        <input type="number" name="pror[]" id="pror">
                        <label for="oral">PRACTICAL/ORAL MARKS</label>
                    </div>
                    <div class="input-field col s6" id="oraldiv">
                        <input type="number" name="oral[]" id="oral">
                        <label for="oral">ORAL MARKS</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4" id="prordiv">
                        <input type="number" name="c_th[]" id="c_th">
                        <label for="c_th">THEORY CREDITS</label>
                    </div>
                    <div class="input-field col s4" id="prordiv">
                        <input type="number" name="c_pt[]" id="c_pt">
                        <label for="c_pt">PRACTICAL/ TERMWORK CREDITS</label>
                    </div>
                    <div class="input-field col s4" id="prordiv">
                        <input type="number" name="c_tut[]" id="c_tut">
                        <label for="c_tut">TUTORIAL CREDITS</label>
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

<script>
    function editSyllabus(el) {
        var form = $(el).closest('form');
        var id = $(form).find('[name=id]').val();

        // getting data
        $.get(
            '/getsyllabus/'+id,
            function(data) {
                data = JSON.parse(data);
                
                $('#syllabusform').find('[name=scheme] option[value='+data[0].scheme+']').attr('selected', 'selected');
                $('#syllabusform').find('[name=department] option[value='+data[0].department+']').attr('selected', 'selected');
                updateSemester($('#syllabusform').find('[name=department]'));
                $('#syllabusform').find('[name=semester] option[value='+data[0].semester+']').attr('selected', 'selected');
                $('#syllabusform').find('[name=wef]').val(data[0].wef);

                $('#syllabusform .subject-card:last-child [name="code[]"]').val(data[0].code);
                $('#syllabusform .subject-card:last-child [name="short[]"]').val(data[0].short);
                $('#syllabusform .subject-card:last-child [name="title[]"]').val(data[0].title);
                $('#syllabusform .subject-card:last-child [name="ia1[]"]').val(data[0].ia1);
                $('#syllabusform .subject-card:last-child [name="ia2[]"]').val(data[0].ia2);
                $('#syllabusform .subject-card:last-child [name="tw[]"]').val(data[0].tw);
                $('#syllabusform .subject-card:last-child [name="pror[]"]').val(data[0].pror);
                $('#syllabusform .subject-card:last-child [name="oral[]"]').val(data[0].oral);
                $('#syllabusform .subject-card:last-child [name="c_th[]"]').val(data[0].c_th);
                $('#syllabusform .subject-card:last-child [name="c_pt[]"]').val(data[0].c_pt);
                $('#syllabusform .subject-card:last-child [name="c_tut[]"]').val(data[0].c_tut);

                for(var i = 1; i < data.length; i++) {
                    $('#syllabusform #subjectarea').append($('#syllabusform .subject-card:last-child')[0].outerHTML);

                    $('#syllabusform .subject-card:last-child [name="code[]"]').val(data[i].code);
                    $('#syllabusform .subject-card:last-child [name="short[]"]').val(data[i].short);
                    $('#syllabusform .subject-card:last-child [name="title[]"]').val(data[i].title);
                    $('#syllabusform .subject-card:last-child [name="ia1[]"]').val(data[i].ia1);
                    $('#syllabusform .subject-card:last-child [name="ia2[]"]').val(data[i].ia2);
                    $('#syllabusform .subject-card:last-child [name="tw[]"]').val(data[i].tw);
                    $('#syllabusform .subject-card:last-child [name="pror[]"]').val(data[i].pror);
                    $('#syllabusform .subject-card:last-child [name="oral[]"]').val(data[i].oral);
                    $('#syllabusform .subject-card:last-child [name="c_th[]"]').val(data[i].c_th);
                    $('#syllabusform .subject-card:last-child [name="c_pt[]"]').val(data[i].c_pt);
                    $('#syllabusform .subject-card:last-child [name="c_tut[]"]').val(data[i].c_tut);
                }

                $('select').material_select();
                Materialize.updateTextFields();
            }
        );
        
        // $('#syllabusform').find('input[name=scheme]').val($(el).closest('tr').find('td:nth-child(1)').html());
        // $('#syllabusform').find('input[name=wef]').val($(el).closest('tr').find('td:nth-child(2)').html());
        // $('#syllabusform').append('{{method_field("patch")}}');
        // $('#syllabusform').append('<input type="hidden" name="id" value="'+$(el).closest('tr').find('[name=id]').val()+'">');
        
        $('#syllabusmodal').find('h4').html('Update Syllabus');
        $('#syllabusmodal').find('button.modal-action').html('Update Syllabus');
        
        $('#syllabusmodal').modal('open');
        Materialize.updateTextFields();
    }

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

    function updateSemester(el) {
        var dept= $(el);
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
    }

    $(document).ready(function(){
        
        $('.modal').modal({
            complete: function() {
                $('#syllabusform')[0].reset();
                while($('#syllabusform #subjectarea').children('.subject-card').length != 1)
                    $('#syllabusform #subjectarea .subject-card:last-child')[0].remove();

                $('#syllabusform option[selected]').removeAttr('selected');
                $('#syllabusform option[disabled]').attr('selected', 'selected');
                $('select').material_select();
                Materialize.updateTextFields();
            }
        });

        $('select[name=department]').on('change', function() {
            updateSemester(this);
        });
    });
</script>
@endsection
