<?php
include 'includes/header.inc.php';
?>

</br>
<center> <table>
<th>Pesquisando Estoques</th>
</table </center>
</br>

<?php
$id=$_GET['id'];
require("conecta.inc.php");
$pesquisou=false;
if ($id==3)
{
	$funcionario = $_GET['funcionario'];
	if (empty($funcionario))
		print("Preencha um funcionário.");
	else
	{
		$sql= "Select * from estoques, livros, funcionarios where idfuncionarios = '$funcionario' and estoques.livros_idlivros=livros.idlivros and estoques.funcionarios_idfuncionarios=funcionarios.idfuncionarios";
        $sql = $pdo->query($sql);
        $pesquisou=true;
	}


}
elseif ($id==4)
{
	$titulo=$_GET['titulo'];
	if (empty($titulo))
		print("Preencha um título.");
	else
	{
		$sql= "Select * from estoques, livros, funcionarios where titulo LIKE '%$titulo%'and estoques.livros_idlivros=livros.idlivros and estoques.funcionarios_idfuncionarios=funcionarios.idfuncionarios";
        $sql = $pdo->query($sql);
        $pesquisou=true;
	}
}
else
	print("Informe um critério...");
if($pesquisou)
    if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $estoque){
			echo '<center> <table>';
			echo '<th>Título</th>';
			echo '<th>Funcionário</th>';
			echo '<th>ID Funcionário</th>';
            echo '<tr align="center">';
            echo '<td>'.$estoque['titulo'].'</td>';
			echo '<td>'.$estoque['nome'].'</td>';
			echo '<td>'.$estoque['idfuncionarios'].'</td>';
			echo '</tr>';

			echo '</table> </center>';
    }
}else{
    echo 'Nenhum registro encontrado!';
}

?>
</br>
<center> <p>
<button type="button"><a style="color:black" href="pesquisar.php">Nova pesquisa</a></button>
</center>
<?php
include 'includes/footer.inc.php';
?>