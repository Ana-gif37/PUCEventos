
<?php
session_start();


$id = $_GET["id"];
$situacao = $_GET["situacao"];

//Inicio baixar a posição do produto em destaque
//Variavel guardar a ordem do produto a ser alterado
$ord_prod_org = 0;
//Guardar a ordem do produto antecessor a ser alterado
$contr_post_alt = 0;
if ($situacao == 1) {
    //Pesquisar o id dos produtos em destaque no nivel 1 página principal

    include '../../Classes/DAO/EventosDestaqueDAO.php';
    include '../../Classes/entidades/eventosDestaque.php';
    include '../../Classes/DAO/EventoDAO.php';
    include '../../Classes/entidades/evento.php';
    include '../../Classes/ConexaoBD/Conexao.class.php';


    $EventoDAO = new EventoDAO();
    $evento = new evento();

    $EventosDestaqueDAO = new EventosDestaqueDAO();
   
    $eventosDestaque = new eventosDestaque();

    $resultado_prod_dest = $EventosDestaqueDAO->exibirTodosEventosEmDestaque();
    $linhas_prod_dest = mysqli_num_rows($resultado_prod_dest);
   
    for ($i = 0; $i < mysqli_num_rows($resultado_prod_dest); $i++) {
        // $linhas_prod_dest = mysqli_fetch_array($resultado_prod_dest);
        // 
        //id do produto na tabela produto em destaque
        //$produto_id = $linhas_prod_dest['id'];		

        /* Encontrou o produto que deseja descer a 
          posição será colocado na variavel $contr_post_alt o valor 1,
          produto para subir posição recebe a ordem do anterior,
          o produto para ser rebaixado recebe a posição */
        if ($contr_post_alt == 1) {
            $produto_dest_id = $linhas_prod_dest['ID'];
            $produto_dest_ord_post = $linhas_prod_dest['ORDEM'];

            $EventosDestaqueDAO->alterar($ord_prod_org, $produto_dest_id);
            $EventosDestaqueDAO->alterar($produto_dest_ord_post, $id);
            $contr_post_alt = 0;
        }

        //alterar para 9999 o produto que deseja descer a posição
        if ($id === $linhas_prod_dest['ID']) {
            $EventosDestaqueDAO->alterar2($id);
            $ord_prod_org = $linhas_prod_dest['ORDEM'];
            $contr_post_alt = 1;
        }
    }
}
//Fim baixar a posição do produto em destaque
//Inicio subir a posição do produto em destaque
//Variavel guardar a ordem do produto a ser alterado
$ord_prod_org = 0;
//Guardar a ordem do produto antecessor a ser alterado
$contr_post_alt = 0;
if ($situacao == 2) {

    //Pesquisar o id dos produtos em destaque no nivel 1 página principal
    $resultado_prod_dest = $EventosDestaqueDAO->exibirTodosEventosEmDestaqueDesc();
    
    $linhas_prod_dest = mysqli_num_rows($resultado_prod_dest);
    while ($linhas_prod_dest = mysqli_fetch_array($resultado_prod_dest)) {
        //id do produto na tabela produto em destaque
        //$produto_id = $linhas_prod_dest['id'];		

        /* Encontrou o produto que deseja descer a 
          posição será colocado na variavel $contr_post_alt o valor 1,
          produto para subir posição recebe a ordem do anterior,
          o produto para ser rebaixado recebe a posição */
        if ($contr_post_alt == 1) {
            $produto_dest_id = $linhas_prod_dest['id'];
            $produto_dest_ord_post = $linhas_prod_dest['ordem'];
            $EventosDestaqueDAO->alterar($ord_prod_org, $produto_dest_id);
            $EventosDestaqueDAO->alterar($produto_dest_ord_post, $id);


            $contr_post_alt = 0;
        }

        //alterar para 9999 o produto que deseja descer a posição
        if ($id === $linhas_prod_dest['id']) {
            $EventosDestaqueDAO->alterar2($id);

            $ord_prod_org = $linhas_prod_dest['ordem'];
            $contr_post_alt = 1;
        }
    }
}
//Fim subir a posição do produto em destaque
//Apagar o produto da lista de destaque
if ($situacao == 3) {
    $query = "DELETE FROM destaques_produtos WHERE id=$id";
    $resultado = mysql_query($query);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
        if (($situacao == 1)or ( $situacao == 2)) {
            if (mysqli_affected_rows() != 0) {
                echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=28'>
					<script type=\"text/javascript\">
						alert(\"Ordem dos Produtos em destaque editado com Sucesso.\");
					</script>
				";
            } else {
                echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=28'>
					<script type=\"text/javascript\">
						alert(\"Ordem dos Produtos em destaque não foi editado com Sucesso.\");
					</script>
				";
            }
        }if ($situacao == 3) {
            if (mysql_affected_rows() != 0) {
                echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=22'>
					<script type=\"text/javascript\">
						alert(\"Produto retirado com sucesso do destaque.\");
					</script>
				";
            } else {
                echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=22'>
					<script type=\"text/javascript\">
						alert(\"Produto não foi retirado com sucesso do destaque.\");
					</script>
				";
            }
        }
        ?>
    </body>
</html>