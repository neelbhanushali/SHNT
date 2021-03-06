@extends('layouts.dashboard')
@section('page', 'Schemes')

@section('css')
@parent
<link href="/assets/vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
@endsection

@section('breadcrumbs')
<li><a href="">HOME</a></li>
<li><a href="">CURRICULUM</a></li>
<li><a href="">SCHEMES</a></li>
@endsection


@section('content')
<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div id="table-datatables">
                <h4 class="header">SCHEMES</h4>
                <h6 class="header">This table will show you all the schemes available in the system.</h6> 
                <div class="row">
                    <div class="col s12">
                        <table class="datatable display" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SCHEME NAME</th>
                                    <th>WITH EFFECT FROM</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($scheme = \App\Scheme::orderBy('wef','desc')->get() as $schemes)
                            <tr>
                                <td>{{$schemes->scheme}}</td>
                                <td>{{$schemes->wef}}</td>
                                <td>
                                    <form class="schemeactionform" action="{{action('examcell@updatescheme')}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <input type="hidden" name="id" value="{{$schemes->id}}">
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
<a id="schemeadd" class="btn-floating btn-large btn modal-trigger" href="#schememodal">
    <i class="material-icons">add</i>
</a>
</div>
<!-- Modal Structure -->
<div id="schememodal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Add Scheme</h4>
        <div class="row">
            <form method="post" action="{{action('examcell@addscheme')}}" id="schemeform" class="col s12">
                <fieldset class="form-fieldset">
                {{csrf_field()}}
                <div class="row">
                <div class="input-field col s12">
                    <input id="scheme" name="scheme" type="text">
                    <label for="scheme">Scheme</label>
                </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                    <input id="wef" name="wef" type="number">
                    <label for="wef">WEF</label>
                </div>
                </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button form="schemeform" class="modal-action waves-effect waves-green btn">Add Scheme</a>
    </div>
</div>
@endsection

@section('js')
@parent

<script>
    function editScheme(el) {
        $(el).closest('form').find('input[name=_method]').val('patch');
        
        $('#schemeform').find('input[name=scheme]').val($(el).closest('tr').find('td:nth-child(1)').html());
        $('#schemeform').find('input[name=wef]').val($(el).closest('tr').find('td:nth-child(2)').html());
        $('#schemeform').append('{{method_field("patch")}}');
        $('#schemeform').append('<input type="hidden" name="id" value="'+$(el).closest('tr').find('[name=id]').val()+'">');
        $('#schememodal').find('h4').html('Update Scheme');
        $('#schememodal').find('button.modal-action').html('Update Scheme');
        
        $('#schememodal').modal('open');
        Materialize.updateTextFields();
    }

    function deleteScheme(el) {
        var form = $(el).closest('form');
        $.post(
                '{{action("examcell@deletescheme")}}',
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
                        for(var i = 0; i < data.schemes.length; i++) {
                            $('table.datatable tbody').append(`
                                <tr>
                                    <td>${data.schemes[i].scheme}</td>
                                    <td>${data.schemes[i].wef}</td>
                                    <td>
                                        <form class="schemeactionform" method="post">
                                            <input type="hidden" name="_token" value="${data._token}">
                                            <input type="hidden" name="_method" value="patch">
                                            <input type="hidden" name="id" value="${data.schemes[i].id}">
                                            <button type="button" onclick="editScheme(this)" class="btn-floating waves-effect waves-light editbtn">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" onclick="deleteScheme(this)" class="btn-floating waves-effect red waves-light deletebtn">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>`);
                        }
                        
                        var datatable = $('.datatable').DataTable();
                        datatable.column('1').order('desc').draw();
                    });
                }
            );
    }

    $(document).ready(function() {
        datatable.column('1').order('desc').draw();

        var validator = $('#schemeform').validate({
            rules: {
                scheme: {
                    required: true,
                    remote: {
                        url: '{{route('validator')}}',
                        type: 'post',
                        async: false,
                        data: {
                            scheme: function() {
                                return $('#schemeform [name=scheme]').val();
                            }
                        }
                    }
                },
                wef: {
                    required: true,
                    digits: true
                }
            },
            messages: {
                scheme: {
                    remote: $.validator.format("<b><i>{0}</i></b> is already exists.")
                }
            }
        });

        $('#schemeform').on('submit', function(e) {
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
                        $('#schememodal').modal('close');
                        Materialize.updateTextFields();
                        $('.datatable').DataTable().destroy();
                        $('table.datatable tbody').empty();
                        for(var i = 0; i < data.schemes.length; i++) {
                            $('table.datatable tbody').append(`
                                <tr>
                                    <td>${data.schemes[i].scheme}</td>
                                    <td>${data.schemes[i].wef}</td>
                                    <td>
                                        <form class="schemeactionform" method="post">
                                            <input type="hidden" name="_token" value="${data._token}">
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="id" value="${data.schemes[i].id}">
                                            <button type="button" onclick="editScheme(this)" class="btn-floating waves-effect waves-light editbtn">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" onclick="deleteScheme(this)" class="btn-floating waves-effect red waves-light deletebtn">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>`);
                        }
                        
                        var datatable = $('.datatable').DataTable();
                        datatable.column('1').order('desc').draw();
                    });
                }
            );
        });

        

        $('.modal').modal({
            complete: function() {
                $('#schemeform').find('input[name=scheme]').val('');
                $('#schemeform').find('input[name=wef]').val('');
                Materialize.updateTextFields();
                $('#schememodal').find('h4').html('Add Scheme');
                $('#schememodal').find('button.modal-action').html('Add Scheme');

                $('#schemeform [name=_method]').remove();
                $('#schemeform [name=id]').remove();

                validator.resetForm();
            }
        });
    });

    
</script>
@endsection
