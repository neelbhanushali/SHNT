@extends('layouts.dashboard')
@section('page', 'Add Internal Marks')

@section('css')
@parent
<link href="/assets/vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
@endsection

@section('breadcrumbs')
<li><a href="{{route('dashboard')}}">HOME</a></li>
<li><a href="">Add Internal Marks</a></li>
<li><a href="{{url()->current()}}">{{$course->short}}</a></li>
@endsection


@section('content')
<input type="file" id="csv" name="csv" style="display: none" accept=".csv" />
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div>
                <h4 class="header">Add Internal Marks</h4>
                <div class="row">
                    <div class="col s12">
                        <table id="internalmarks" class="datatable display" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>Roll Number</td>
                                    <td>IA1</td>
                                    <td>IA2</td>
                                    <td>TW</td>
                                </tr>
                            </thead>
                            @foreach($students as $s)
                            <tr>
                                <td>{{$s->rollnumber}}</td>
                                <td>
                                    <div class="input-field col s12">
                                        <input data-no-change form="{{$s->rollnumber}}_{{$s->exam_form_id}}" placeholder="ia1" id="ia1" name="ia1" type="text" value="{{$s->ia1}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-field col s12">
                                        <input form="{{$s->rollnumber}}_{{$s->exam_form_id}}" placeholder="ia2" id="ia2" name="ia2" type="text" value="{{$s->ia2}}">
                                    </div>   
                                </td>
                                <td>
                                    <div class="input-field col s12">
                                        <form id="{{$s->rollnumber}}_{{$s->exam_form_id}}" action="" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="rollnumber" value="{{$s->rollnumber}}">
                                            <input type="hidden" name="exam_form_id" value="{{$s->exam_form_id}}">
                                            <input type="hidden" name="course_id" value="{{$course->id}}">
                                            <input placeholder="tw" id="tw" name="tw" type="text" value="{{$s->tw}}">
                                        </form>
                                    </div>    
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
        {{csrf_field()}}
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
        <button type="button" onclick="addSubjectPanel()" class="waves-effect waves-green btn">Add Subject</button>
        <span> </span>
        <button form="syllabusform" class="modal-action waves-effect waves-green btn">Add Syllabus</button>
    </div>
</div>
@endsection

@section('js')
@parent

<script src="/assets/js/jquery.csv.min.js"></script>


<script>
    function editSyllabus(el) {
        var form = $(el).closest('form');

        $('#syllabusform').prepend('{{method_field("patch")}}');
        
        var id = $(form).find('[name=id]').val();

        // getting data
        $.get(
            '/getsyllabus/'+id,
            function(data) {
                data = JSON.parse(data);
                
                $('#syllabusform').prepend('<input type="hidden" name="id" value="'+data[0].examination_id+'">');
                $('#syllabusform').find('[name=scheme] option[value='+data[0].scheme+']').attr('selected', 'selected');
                $('#syllabusform').find('[name=department] option[value='+data[0].department+']').attr('selected', 'selected');
                updateSemester($('#syllabusform').find('[name=department]'));
                $('#syllabusform').find('[name=semester] option[value='+data[0].semester+']').attr('selected', 'selected');
                $('#syllabusform').find('[name=wef]').val(data[0].wef);

                $('#syllabusform .subject-card:last-child fieldset').prepend('<input type="hidden" name="course_id[]" value="'+data[0].id+'">');
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
                    
                    $('#syllabusform .subject-card:last-child [name="course_id[]"]').val(data[i].id);
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
        
        $('#syllabusmodal').find('h4').html('Update Syllabus');
        $('#syllabusmodal').find('button.modal-action').html('Update Syllabus');
        
        $('#syllabusmodal').modal('open');
        Materialize.updateTextFields();
    }

        function deleteSyllabus(el) {
        var form = $(el).closest('form');
        $.post(
                '{{action("examcell@deletesyllabus")}}',
                $(form).serialize(),
                function(data) {
                    data = JSON.parse(data);
                    $('meta[name="csrf-token"]').attr('content', data._token);
                    swal({
                    title: data.title,
                    text: data.message,
                    type: data.type
                    }, function() {
                        $(form).done();
                        $('.datatable').DataTable().destroy();
                        $('table.datatable tbody').empty();
                        for(var i = 0; i < data.syllabus.length; i++) {
                            $('table.datatable tbody').append(`
                                <tr>
                                    <td>${data.syllabus[i].scheme}</td>
                                    <td>${data.syllabus[i].department}</td>
                                    <td>${data.syllabus[i].semester}</td>
                                    <td>${data.syllabus[i].wef}</td>
                                    <td>
                                        <form action="" method="post">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <input type="hidden" name="id" value="${data.syllabus[i].id}">
                                            <button type="button" onclick="editSyllabus(this)" class="btn-floating waves-effect waves-light editbtn">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" onclick="deleteSyllabus(this)" class="btn-floating waves-effect red waves-light deletebtn">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            `);
                        }
                        
                        var datatable = $('.datatable').DataTable();
                    });
                }
            );
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

    function isAPIAvailable() {
      // Check for the various File API support.
      if (window.File && window.FileReader && window.FileList && window.Blob) {
        // Great success! All the File APIs are supported.
        return true;
      } else {
        // source: File API availability - http://caniuse.com/#feat=fileapi
        // source: <output> availability - http://html5doctor.com/the-output-element/
        document.writeln('The HTML5 APIs used in this form are only available in the following browsers:<br />');
        // 6.0 File API & 13.0 <output>
        document.writeln(' - Google Chrome: 13.0 or later<br />');
        // 3.6 File API & 6.0 <output>
        document.writeln(' - Mozilla Firefox: 6.0 or later<br />');
        // 10.0 File API & 10.0 <output>
        document.writeln(' - Internet Explorer: Not supported (partial support expected in 10.0)<br />');
        // ? File API & 5.1 <output>
        document.writeln(' - Safari: Not supported<br />');
        // ? File API & 9.2 <output>
        document.writeln(' - Opera: Not supported');
        return false;
      }
    }

    function handleFileSelect(evt) {
      var files = evt.target.files; // FileList object
      var file = files[0];
        
      var reader = new FileReader();
      reader.readAsText(file);
      reader.onload = function(event){
        var csv = event.target.result;
        var data = $.csv.toObjects(csv);
        
        for(var i = 0; i < data.length; i++) {
            var selector = '[name=rollnumber][value='+data[i]['Roll Number']+']';
            $(selector).closest('tr').find('[name=ia1]').val(data[i]['IA1']);
            $(selector).closest('tr').find('[name=ia2]').val(data[i]['IA2']);
            $(selector).closest('tr').find('[name=tw]').val(data[i]['TW']);
        }
      };
      reader.onerror = function(){ alert('Unable to read ' + file.fileName); };
    }

    $(document).ready(function(){
        if(isAPIAvailable()) {
            $('#csv').bind('change', handleFileSelect);
        }

        // $('.datatable').DataTable().destroy();
        datatable.destroy();
        $('.datatable').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              {
                  text: 'Import CSV',
                  action: function ( e, dt, node, config ) {
                      $('#csv').click();
                  }
              },
              {
                  extend: 'csv',
                  text: 'Export CSV',
                  filename: 'INTERNAL_ASSESSMENT_{{$course->short}}',
              },
              {
                    text: 'Update Marks',
                    action: function() {
                        $('#internalmarks form').each(function() {
                            $.post(
                                $(this).attr('action'),
                                $(this).serialize(),
                                function(data) {
                                    data = JSON.parse(data);
                                    $('meta[name="csrf-token"]').attr('content', data._token);
                                    swal({
                                    title: data.title,
                                    text: data.message,
                                    type: data.type
                                    }, function() {
                                        Materialize.updateTextFields();
                                    });
                                }
                            );
                        });
                    }
                }
              
          ]
      } );

        
        $('.modal').modal({
            complete: function() {
                $('#syllabusform')[0].reset();
                $('#syllabusform [name=id]').remove();
                $('#syllabusform [name="course_id[]"]').remove();
                $('#syllabusform [name=_method]').remove();
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

        $('#syllabusform').validate({
            rules: {
                scheme: 'required',
                department: 'required',
                semester: 'required',
                wef: 'required',
                "code[]": 'required',
                "short[]": 'required',
                "title[]": 'required'
            }
        });

        $('#syllabusform').on('submit', function(e) {
            if(!$(this).valid()) return;

            e.preventDefault();
            var form = $(this);
            var formdata = $(form).serialize();
            $(form).loading();

            $.post(
                $(form).attr('action'),
                formdata,
                function(data) {
                    data = JSON.parse(data);
                    $('meta[name="csrf-token"]').attr('content', data._token);
                    swal({
                    title: data.title,
                    text: data.message,
                    type: data.type
                    }, function() {
                        $(form).done();
                        $('#syllabusmodal').modal('close');
                        Materialize.updateTextFields();
                        $('.datatable').DataTable().destroy();
                        $('table.datatable tbody').empty();
                        for(var i = 0; i < data.syllabus.length; i++) {
                            $('table.datatable tbody').append(`
                                <tr>
                                    <td>${data.syllabus[i].scheme}</td>
                                    <td>${data.syllabus[i].department}</td>
                                    <td>${data.syllabus[i].semester}</td>
                                    <td>${data.syllabus[i].wef}</td>
                                    <td>
                                        <form action="" method="post">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <input type="hidden" name="id" value="${data.syllabus[i].id}">
                                            <button type="button" onclick="editSyllabus(this)" class="btn-floating waves-effect waves-light editbtn">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" onclick="deleteSyllabus(this)" class="btn-floating waves-effect red waves-light deletebtn">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            `);
                        }
                        
                        var datatable = $('.datatable').DataTable();
                    });
                }
            );
        });
    });
</script>
@endsection