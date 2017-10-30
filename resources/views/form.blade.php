<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="post" class="form-horizontal" data-toggle="validator">
                        {{csrf_field()}} {{method_field('POST')}}
                        <input type="hidden" id="id" name="id">
                    <div class="text-center" style="width: 80%;margin: 0 auto">
                        <div class="form-group">
                            <label for="exampleInputEmail1" >Nome</label>
                            <input type="text" class="form-control " id="name" name="name" placeholder="Nome">
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" id="email" name="email" class="form-control"  placeholder="E-mail"><br>
                            <span class="help-block with-errors"></span>
                            <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>