<?php
require 'includes/conecta.inc.php';

if(isset($_GET['idfornecedores']) && empty($_GET['idfornecedores'] == false)){
    $idfornecedores = addslashes($_GET['idfornecedores']);

    $sql = "SELECT * FROM fornecedores, livros WHERE fornecedores.idfornecedores and livros.fornecedores_idfornecedores = '$idfornecedores'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0){
?>

<?php
include 'includes/header.inc.php';
?>

<br>
<hr>
            <center> <?php echo "Não é possível excluir fornecedor: '$idfornecedores'"; ?> </center>
    <hr>

<?php
include 'includes/footer.inc.php';
?>
           
<?php
    }else{

        $sql = "DELETE FROM fornecedores WHERE idfornecedores = '$idfornecedores'";
        $pdo->query($sql);
        header("Location: fornecedores.php");
    }
}else{
    header("Location: fornecedores.php");
}

?>

