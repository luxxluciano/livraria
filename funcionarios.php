<?php
require 'conecta.inc.php';
?>

<?php
include 'includes/header.inc.php';
?>

<a href="adicionarFuncionario.php">Cadastrar Novo Funcionário</a>
<center><table border="1" width="80%">
<tr>
<th colspan="4" align="center">Funcionários Cadastrados</th>
</tr>
<tr>
<th>Código</th>
<th>Nome</th>
<th>Data de Contratação</th>
<th>Ações</th>
</tr>
<?php
$sql = "SELECT * FROM funcionarios";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $funcionario){
        echo '<tr align="center">';
        echo '<td>'.$funcionario['idfuncionarios'].'</td>';
        echo '<td>'.$funcionario['nome'].'</td>';
        echo '<td>'.$funcionario['datacontrata'].'</td>';
        echo '<td><a href="editarFuncionario.php?idfuncionarios='.$funcionario['idfuncionarios'].'">Editar</a> - <a href="excluirFuncionario.php?idfuncionarios='.$funcionario['idfuncionarios'].'">Excluir</a></td>'; 
        echo '</tr>';
    }
}else{
    echo 'Nenhum registro encontrado!';
}
?>

</table></center>

<?php
include 'includes/footer.inc.php';
?>