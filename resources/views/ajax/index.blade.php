@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                    <button class="btn btn-primary btn-xs pull-right" id="read-data">Carregar dados </button>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Endereço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        |<tbody id="info-body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $("#read-data").on('click', function () {

            $.get("{{URL::to('estudantes/read')}}", function(data){

                $('#info-body').empty()
                $.each(data, function (i, value) {
                    var tr =$("<tr/>");
                        tr.append($("<td/>", {
                            text : value.id
                        }))
                            .append($("<td/>", {
                            text: value.name
                        })).append($("<td/>", {
                            text: value.email
                        })).append($("<td/>", {
                            text: value.endereco
                        })).append($("<td/>", {
                            html: "<a href=''><i class='icon ion-plus-circled'></i></a><a href=''> <i class='icon ion-edit'></i></a><a href=''> <i class='icon ion-close-circled'></i></a>"
                        }));

                    $('#info-body').append(tr);

                });
            });
        })
    </script>
@endsection