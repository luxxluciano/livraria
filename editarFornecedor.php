<?php
require 'conecta.inc.php';

$idfornecedores=0;

if(isset($_GET['idfornecedores']) && empty($_GET['idfornecedores'] == false)){
    $idfornecedores = addslashes($_GET['idfornecedores']);
}    

if(isset($_POST['nome']) && empty($_POST['nome'] == false)){
    $nome = addslashes($_POST['nome']);
    $endereco = addslashes($_POST['endereco']);
    $cidade = addslashes($_POST['cidade']);
    $telefone = addslashes($_POST['telefone']);

    $sql = "UPDATE fornecedores SET nome = '$nome', endereco = '$endereco', cidade = '$cidade', telefone = '$telefone'  WHERE idfornecedores = '$idfornecedores'";
    $pdo->query($sql);

    header("Location: fornecedores.php");
}

$sql = "SELECT * FROM fornecedores WHERE idfornecedores = '$idfornecedores'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0){
        $dado = $sql->fetch();
}else{
    header("Location: fornecedores.php");
}

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
                <a href="funcionarios.php">
                    <li> funcionários </li>
                </a>
                <a href="livros.php">
                    <li>livros</li>
                </a>
                <a href="fornecedores.php">
                    <li>fornecedores</li>
                </a>
                <a href="estoques.php">
                    <li>estoques</li>
                </a>
                <a href="pesquisar.php">
                    <li>pesquisar</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="conteudo">


<form method="post">
    <table>
        <th colspan="4" align="center">Editar Fornecedor</th>
        <tr>
            <td>
                Nome:
            </td>
            <td>
                <input type="text" name="nome" id="nome" value="<?php echo $dado['nome']; ?>" required>
            </td>
        </tr>
        <tr>
            <td>
                Endereço:
            </td>
            <td>
                <input type="text" name="endereco" id="endereco" value="<?php echo $dado['endereco']; ?>" required>
            </td>
        </tr>
        <tr>
            <td>
                Cidade:
            </td>
            <td>
                <input type="text" name="cidade" id="cidade" value="<?php echo $dado['cidade']; ?>" required>
            </td>
        </tr>
        <tr>
            <td>
                Telefone:
            </td>
            <td>
                <input type="text" name="telefone" id="telefone" value="<?php echo $dado['telefone']; ?>" required>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <input type="submit" value="Alterar">
            </td>
        </tr>
    </table>

</form>

</div>



    <footer class="footer">

        Desenvolvido por Luciano Martins Fagundes. Faculdade SENAC Porto Alegre. 2019-2019.
    </footer>
</body>

</html>