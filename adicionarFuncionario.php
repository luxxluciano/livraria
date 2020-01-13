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

<?php
include 'includes/header.inc.php';
?>


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

<?php
include 'includes/footer.inc.php';
?>