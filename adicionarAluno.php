<?php
require 'conecta.inc.php';

if(isset($_POST['nome']) && empty($_POST['nome'] == false) && 
    isset($_POST['curso']) && empty($_POST['curso'] == false)){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $curso = addslashes($_POST['curso']);
    
    $sql = "INSERT INTO alunos SET nome='$nome', email='$email', curso='$curso'";
    $pdo->query($sql); 

    header("Location: index.php");
}
/*else{
//    echo "Preencha os campos corretamente!";
}*/

?>

<form method="post">
<table>
<th colspan="2" align="center">Cadastra Aluno</th>
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
Email:
</td>
<td>
<input type="email" name="email" id="email" required>
</td>
</tr>
<tr>
<td>
Curso:
</td>
<td>
<input type="text" name="curso" id="curso" required>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" value="Cadastrar">
</td>
</tr>
</table>

</form>