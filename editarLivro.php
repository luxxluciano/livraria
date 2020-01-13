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

<?php
include 'includes/header.inc.php';
?>


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

<?php
include 'includes/footer.inc.php';
?>