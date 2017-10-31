@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard

                  <a onclick="addForm()"><button class="btn btn-primary btn-xs pull-right" id="read-data">Novo Contato</button></a>
                </div>
                <div class="panel-body">
                    <table id="contact-table" class="table table-bordered table-striped table-condensed ">
                        <thead>
                        <tr>
                            <th>ID </th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('form')

</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

    <script type="text/javascript">

     var table =  $('#contact-table').DataTable({
        processing:true,
        serverSide: true,
           ajax: "{{route('api.contact')}}",
           columns: [
               {data: 'id', name: 'id'},
               {data: 'name', name: 'name'},
               {data: 'email', name: 'email'},
               {data: 'action', name: 'action', orderable:false, searchable:true},
           ]
       });
        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('#modal-title').text('Adicionar');

        }
        
        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{url('home')}}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Editar');

                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                },
                error: function(){
                    alert("Erro ao atualizar");
                }
            });
        }


     $(function(){
         $('#modal-form form').validator().on('submit', function (e) {
             if (!e.isDefaultPrevented()){
                 var id = $('#id').val();
                 if (save_method == 'add') url = "{{ url('home') }}";
                 else url = "{{ url('home') . '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        data : $('#modal-form form').serialize(),
                        success : function($data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                        },
                        error : function(){
                            alert('Oops! Something Error!');
                        }
                    });
                    return false;
                }
            });
        })
    </script>
@endsection