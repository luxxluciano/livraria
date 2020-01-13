<?php
require 'conecta.inc.php';

if (isset($_POST['nome']) && empty($_POST['nome'] == false)&&
    isset($_POST['endereco']) && empty($_POST['endereco'] == false)&&
    isset($_POST['cidade']) && empty($_POST['cidade'] == false)&&
    isset($_POST['telefone']) && empty($_POST['telefone'] == false)

){
    $nome = addslashes($_POST['nome']);
    $endereco = addslashes($_POST['endereco']);
    $cidade = addslashes($_POST['cidade']);
    $telefone = addslashes($_POST['telefone']);

    $sql = "INSERT INTO fornecedores SET nome='$nome', endereco='$endereco', cidade='$cidade', telefone='$telefone'";
    $pdo->query($sql);

    header("Location: fornecedores.php");
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
        <th colspan="4" align="center">Cadastra Fornecedor</th>
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
                Endereço:
            </td>
            <td>
                <input type="text" name="endereco" id="endereco" required>
            </td>
        </tr>
        <tr>
            <td>
                Cidade:
            </td>
            <td>
                <input type="text" name="cidade" id="cidade" required>
            </td>
        </tr>
        <tr>
            <td>
                Telefone:
            </td>
            <td>
                <input type="text" name="telefone" id="telefone" required>
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