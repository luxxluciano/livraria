<?php
require 'conecta.inc.php';

if(isset($_GET['idestoques']) && empty($_GET['idestoques'] == false)){
    $idestoques = addslashes($_GET['idestoques']);

    $sql = "DELETE FROM estoques WHERE idestoques = '$idestoques'";
    $pdo->query($sql);

    header("Location: estoques.php");

}else{
    header("Location: estoques.php");
}



?>