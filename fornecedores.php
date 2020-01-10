<?php
require 'conecta.inc.php';
?>

<?php
include 'includes/header.inc.php';
?>

<a href="adicionarFornecedor.php">Cadastrar Novo Fornecedor</a>
<center><table border="1" width="80%">
<tr>
<th colspan="6" align="center">Fornecedores Cadastrados</th>
</tr>
<tr>
<th>Código</th>
<th>Nome</th>
<th>Endereço</th>
<th>Cidade</th>
<th>Telefone</th>
<th>Ações</th>
</tr>
<?php
$sql = "SELECT * FROM fornecedores";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $fornecedor){
        echo '<tr align="center">';
        echo '<td>'.$fornecedor['idfornecedores'].'</td>';
        echo '<td>'.$fornecedor['nome'].'</td>';
        echo '<td>'.$fornecedor['endereco'].'</td>';
        echo '<td>'.$fornecedor['cidade'].'</td>';
        echo '<td>'.$fornecedor['telefone'].'</td>';
        echo '<td><a href="editarFornecedor.php?idfornecedores='.$fornecedor['idfornecedores'].'">Editar</a> - <a href="excluirFornecedor.php?idfornecedores='.$fornecedor['idfornecedores'].'">Excluir</a></td>'; 
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