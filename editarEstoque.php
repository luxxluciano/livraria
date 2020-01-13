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

<?php
include 'includes/header.inc.php';
?>


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

<?php
include 'includes/footer.inc.php';
?>