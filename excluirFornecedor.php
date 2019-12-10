<?php
require 'conecta.inc.php';

if(isset($_GET['idfornecedores']) && empty($_GET['idfornecedores'] == false)){
    $idfornecedores = addslashes($_GET['idfornecedores']);

    $sql = "SELECT * FROM fornecedores, livros WHERE fornecedores.idfornecedores and livros.fornecedores_idfornecedores = '$idfornecedores'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0){
        ?>
        <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="topo">

        <div class="topoint">
           <h1> Livraria Classe A </h1>
           <a href="index.php"><h4><-home</h4></a>
        </div>
    </div>

<div class="menu">
    <div class="menuint">
        <ul>
            <a href="funcionarios.php"> <li> funcionários </li> </a> 
            <a href="livros.php"> <li>livros</li> </a>
            <a href="fornecedores.php"> <li>fornecedores</li> </a>
            <a href="estoques.php"> <li>estoques</li> </a>
            <a href="pesquisar.php"> <li>pesquisar</li> </a>
        </ul>
    </div>
</div>

<div class="conteudo">
    <br>
<hr>
            <center> <?php echo "Não é possível excluir fornecedor: '$idfornecedores'"; ?> </center>
    <hr>
            </div>

<footer class="footer">

Desenvolvido por Luciano Martins Fagundes. Faculdade SENAC Porto Alegre. 2019-2019.
</footer>
</body>
</html>
           
           <?php
    }else{

        $sql = "DELETE FROM fornecedores WHERE idfornecedores = '$idfornecedores'";
        $pdo->query($sql);
        header("Location: fornecedores.php");
    }
}else{
    header("Location: fornecedores.php");
}

?>

