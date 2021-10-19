



<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h2>Cadastrar Unidades</h2>
    </div>
    <div class="row espaco">
        <div class="pull-right">
            <a href='index.php?link=18'><button type='button' class='btn btn-sm btn-info'>Listar e Gerenciar Unidades</button></a>				
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Administrador/ProcessaCadastroUnidades.php">
<br><br>
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" placeholder=""required="required"  maxlength="50">
                    </div>
                </div>


              

                <div class="form-group">
                    <br>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="gravar" value="gravar" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /container -->

