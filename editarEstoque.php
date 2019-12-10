<?php
require 'conecta.inc.php';

$idlivros = 0;

if (isset($_GET['idestoques']) && empty($_GET['idestoques'] == false)) {
    $idestoques = addslashes($_GET['idestoques']);
}

if (isset($_POST['livro']) && empty($_POST['livro'] == false)) {
    $livro = addslashes($_POST['livro']);
    $funcionario = addslashes($_POST['funcionario']);
    $quant_total = $_POST['quant_total'];
    $quant_recebida = addslashes($_POST['quant_recebida']);
    $data_atualiza = addslashes($_POST['data_atualiza']);


    $sql = "UPDATE estoques SET livros_idlivros = '$livro', funcionarios_idfuncionarios = '$funcionario', quant_total = '$quant_total', quant_recebida = '$quant_recebida', data_atualiza = '$data_atualiza' WHERE idestoques = '$idestoques'";
    $pdo->query($sql);

    header("Location: estoques.php");
}

$sql = "SELECT * FROM estoques WHERE idestoques = '$idestoques'";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    $dado = $sql->fetch();
} else {
    header("Location: estoques.php");
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
                        Livro:
                    </td>
                    <td>
                        <select name="livro" id="livro" required>
                            <?php
                            require("conecta.inc.php");

                            $sql = "SELECT * FROM livros ORDER BY titulo";
                            $sql = $pdo->query($sql);
                            foreach($sql->fetchAll() as $linha) {

                                $IdLivros = $linha['idlivros'];
                                $Titulo = $linha['titulo'];
                                print("<option value='$IdLivros'>$Titulo</option>");
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Funcionário:
                    </td>
                    <td>
                        <select name="funcionario" id="funcionario" required>
                            <?php
                            require("conecta.inc.php");

                            $sql = "SELECT * FROM funcionarios ORDER BY nome";
                            $sql = $pdo->query($sql);
                            foreach($sql->fetchAll() as $linha) {

                                $IdFuncionarios = $linha['idfuncionarios'];
                                $Nome = $linha['nome'];
                                print("<option value='$IdFuncionarios'>$Nome</option>");
                            }
                            ?>
                    </td>
                </tr>
                    <tr>
                        <td>
                            Quantidade total:
                        </td>
                        <td>
                            <input type="text" name="quant_total" id="quant_total" value="<?php echo $dado['quant_total']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Quantidade Recebida:
                        </td>
                        <td>
                            <input type="text" name="quant_recebida" id="quant_recebida" value="<?php echo $dado['quant_recebida']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Data Atualização:
                        </td>
                        <td>
                            <input type="date" name="data_atualiza" id="data_atualiza" value="<?php echo $dado['data_atualiza']; ?>" required>
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