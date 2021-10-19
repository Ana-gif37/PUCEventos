<?php
$idEventos = $_GET['id'];
?>



<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h2>Postar Materiais</h2>
    </div>
    <div class="row espaco">
        <div class="pull-right">
            <a href='index.php?link=20&id=<?php echo $idEventos ?>'><button type='button' class='btn btn-sm btn-info'>Listar e Gerenciar Materiais Postados</button></a>				
        </div>
        <br><br><br>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Palestrante/ProcessaCadastroPostarMateriais.php" enctype="multipart/form-data">
                <table class="table">
                    <div class = "col-md-12">
                        <table class = "table">
                            <td>

                                <br>
                                <div class="form-group">
                                    <label for="arquivo" class="col-sm-4 control-label">Selecione um arquivo para enviar:</label>
                                    <div class="col-sm-8">
                                        <input name="arquivo" type="file"/>	
                                    </div>
                                </div>

                            </td>
                            <td> 
                                <input type="hidden" name="id" value="<?php echo $idEventos; ?>">

                                <div class="form-group">
                                    <br>
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" name="gravar" value="gravar" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
                            </td>
                            </form>
                    </div>
                    </div>
                    </div> <!-- /container -->

