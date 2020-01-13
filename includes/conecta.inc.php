<?php

 //function conecta_bd()
// {
/*     
$link=mysqli_connect("localhost","root","","agenda");
 if ($link)
 return($link);
 return(FALSE);
*/ 
$dsn = "mysql:dbname=livraria;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
    echo "Conexão Falhou: ".$e->getMessage();
}

//}

?>
