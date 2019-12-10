<?php
require 'conecta.inc.php';

if(isset($_GET['idlivros']) && empty($_GET['idlivros'] == false)){
    $idlivros = addslashes($_GET['idlivros']);

    $sql = "DELETE FROM livros WHERE idlivros = '$idlivros'";
    $pdo->query($sql);

    header("Location: livros.php");

}else{
    header("Location: livros.php");
}



?>