<?php
require 'conecta.inc.php';

if (isset($_POST['nome']) && empty($_POST['nome'] == false)){
    $nome = addslashes($_POST['nome']);
    $data = addslashes($_POST['data']);

    $sql = "INSERT INTO funcionarios SET nome='$nome', datacontrata='$data'";
    $pdo->query($sql);

    header("Location: funcionarios.php");
}
/*else{
//    echo "Preencha os campos corretamente!";
}*/

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
        <th colspan="2" align="center">Cadastra Funcionário</th>
        <tr>
            <td>
                Nome:
            </td>
            <td>
                <input type="text" name="nome" id="nome" required>
            </td>
        </tr>
        <tr>
            <td>
                Data de Contratação:
            </td>
            <td>
                <input type="date" name="data" id="data" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Cadastrar">
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