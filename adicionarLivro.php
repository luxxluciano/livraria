<?php
require 'includes/conecta.inc.php';

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

<?php
include 'includes/header.inc.php';
?>


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

<?php
include 'includes/footer.inc.php';
?>