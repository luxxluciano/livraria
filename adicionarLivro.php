<?php
require 'conecta.inc.php';

if (
    isset($_POST['titulo']) && empty($_POST['titulo'] == false) &&
    isset($_POST['anopublica']) && empty($_POST['anopublica'] == false) &&
    isset($_POST['edicao']) && empty($_POST['edicao'] == false) &&
    isset($_POST['editora']) && empty($_POST['editora'] == false)

) {
    $fornecedor = addslashes($_POST['fornecedor']);
    $titulo = addslashes($_POST['titulo']);
    $anopublica = addslashes($_POST['anopublica']);
    $edicao = addslashes($_POST['edicao']);
    $editora = addslashes($_POST['editora']);

    $sql = "INSERT INTO livros SET fornecedores_idfornecedores='$fornecedor', titulo='$titulo', anopublica='$anopublica', edicao='$edicao', editora='$editora'";
    $pdo->query($sql);

    header("Location: livros.php");
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
                <th colspan="4" align="center">Cadastra Livro</th>
                <tr>
                    <td>
                        Fornecedor:
                    </td>
                    <td>
                        <select name="fornecedor" id="fornecedor" required>
                            <?php
                            require("conecta.inc.php");

                            $sql = "SELECT * FROM fornecedores ORDER BY nome";
                            $sql = $pdo->query($sql);
                            foreach($sql->fetchAll() as $linha) {

                                $IdFornecedor = $linha['idfornecedores'];
                                $NomeFornecedor = $linha['nome'];
                                print("<option value='$IdFornecedor'>$NomeFornecedor</option>");
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Título:
                    </td>
                    <td>
                        <input type="text" name="titulo" id="titulo" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Ano de Publicação:
                    </td>
                    <td>
                        <input type="text" name="anopublica" id="anopublica" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Edicão:
                    </td>
                    <td>
                        <input type="text" name="edicao" id="edicao" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Editora:
                    </td>
                    <td>
                        <input type="text" name="editora" id="editora" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="center">
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