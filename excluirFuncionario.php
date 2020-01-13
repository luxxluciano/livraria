<?php
require 'includes/conecta.inc.php';

if(isset($_GET['idfuncionarios']) && empty($_GET['idfuncionarios'] == false)){
    $idfuncionarios = addslashes($_GET['idfuncionarios']);

    $sql = "SELECT * FROM funcionarios, estoques WHERE funcionarios.idfuncionarios and estoques.funcionarios_idfuncionarios = '$idfuncionarios'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0){
?>

<?php
include 'includes/header.inc.php';
?>

<br>
<hr>
            <center> <?php echo "Não é possível excluir funcionário: '$idfuncionarios'"; ?> </center>
    <hr>

<?php
include 'includes/footer.inc.php';
?>
           
<?php
    }else{

        $sql = "DELETE FROM funcionarios WHERE idfuncionarios = '$idfuncionarios'";
        $pdo->query($sql);
        header("Location: funcionarios.php");
    }
}else{
    header("Location: funcionarios.php");
}

?>

