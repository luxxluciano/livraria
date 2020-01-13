<?php
require 'conecta.inc.php';

$idfuncionarios=0;

if(isset($_GET['idfuncionarios']) && empty($_GET['idfuncionarios'] == false)){
    $idfuncionarios = addslashes($_GET['idfuncionarios']);
}    

if(isset($_POST['nome']) && empty($_POST['nome'] == false)){
    $nome = addslashes($_POST['nome']);
    $data = $_POST['datacontrata'];

    $sql = "UPDATE funcionarios SET nome = '$nome', datacontrata = '$data' WHERE idfuncionarios = '$idfuncionarios'";
    $pdo->query($sql);

    header("Location: funcionarios.php");
}

$sql = "SELECT * FROM funcionarios WHERE idfuncionarios = '$idfuncionarios'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0){
        $dado = $sql->fetch();
}else{
    header("Location: funcionarios.php");
}

?>

<?php
include 'includes/header.inc.php';
?>


<form method="post">
    <table>
        <th colspan="2" align="center">Editar Funcionário</th>
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
                Data de Contratação:
            </td>
            <td>
                <input type="date" name="data" id="data" value="<?php echo $dado['datacontrata']; ?>" required>
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