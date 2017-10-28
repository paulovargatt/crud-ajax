@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                    <button class="btn btn-primary btn-xs pull-right" id="read-data">Novo Contato</button>
                </div>
                <div class="panel-body">
                    <table id="contact-table" class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>ID </th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>#</th>

                        </tr>
                        </thead>
                        |<tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
    <script type="text/javascript">

       $('#contact-table').DataTable({
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
    </script>
@endsection