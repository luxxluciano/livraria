<?php
require 'conecta.inc.php';

$idlivros = 0;

if (isset($_GET['idlivros']) && empty($_GET['idlivros'] == false)) {
    $idlivros = addslashes($_GET['idlivros']);
}

if (isset($_POST['titulo']) && empty($_POST['titulo'] == false)) {
    $titulo = addslashes($_POST['titulo']);
    $fornecedor = addslashes($_POST['fornecedor']);
    $anopublica = $_POST['anopublica'];
    $edicao = addslashes($_POST['edicao']);
    $editora = addslashes($_POST['editora']);


    $sql = "UPDATE livros SET titulo = '$titulo', fornecedores_idfornecedores = '$fornecedor', anopublica = '$anopublica', edicao = '$edicao', editora = '$editora' WHERE idlivros = '$idlivros'";
    $pdo->query($sql);

    header("Location: livros.php");
}

$sql = "SELECT * FROM livros WHERE idlivros = '$idlivros'";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    $dado = $sql->fetch();
} else {
    header("Location: livros.php");
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
            <a href="index.php">
                <h4>
                    <-home</h4> </a> </div> </div> <div class="menu">
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
                    <th colspan="2" align="center">Editar Livro</th>
                    <tr>
                        <td>
                            Título
                        </td>
                        <td>
                            <input type="text" name="titulo" id="titulo" value="<?php echo $dado['titulo']; ?>" required>
                        </td>
                    </tr>
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
                                foreach ($sql->fetchAll() as $linha) {

                                    $IdFornecedor = $linha['idfornecedores'];
                                    $NomeFornecedor = $linha['nome'];
                                    print("<option value='$IdFornecedor'>$NomeFornecedor</option>");
                                }
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ano Publicação:
                        </td>
                        <td>
                            <input type="date" name="anopublica" id="anopublica" value="<?php echo $dado['anopublica']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Edição
                        </td>
                        <td>
                            <input type="text" name="edicao" id="edicao" value="<?php echo $dado['edicao']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Editora
                        </td>
                        <td>
                            <input type="text" name="editora" id="editora" value="<?php echo $dado['editora']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
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