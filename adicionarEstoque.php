<?php
require 'includes/conecta.inc.php';

if (
    isset($_POST['quant_total']) && is_numeric($_POST['quant_total'] ) &&
    isset($_POST['quant_recebida']) && is_numeric($_POST['quant_recebida'])

) {
    $livro = addslashes($_POST['livro']);
    $funcionario = addslashes($_POST['funcionario']);
    $quanttotal = addslashes($_POST['quant_total']);
    $quantrecebida = addslashes($_POST['quant_recebida']);
    $dataatualiza = addslashes($_POST['data_atualiza']);

    $sql = "INSERT INTO estoques SET livros_idlivros='$livro', funcionarios_idfuncionarios='$funcionario', quant_total='$quanttotal', quant_recebida='$quantrecebida', data_atualiza='$dataatualiza'";
    $pdo->query($sql);

    header("Location: estoques.php");
}
/*else{
//    echo "Preencha os campos corretamente!";
}*/

?>

<?php
include 'includes/header.inc.php';
?>


<form method="post">
    <table>
        <th colspan="5" align="center">Cadastra Estoque</th>
        <tr>
            <td>
                Livro:
            </td>
            <td>
                <select name="livro" id="livro" required>
                    
                    <?php
                    $sql = "SELECT * FROM livros ORDER BY titulo";
                    $sql = $pdo->query($sql);
                    foreach($sql->fetchAll() as $linha) {

                        $IdLivros = $linha['idlivros'];
                        $Titulo = $linha['titulo'];
                        print("<option value='$IdLivros'>$Titulo</option>");
                    }
                    ?>
            </td>
        </tr>
        
            <td>
                Funcionário:
            </td>
            <td>
                <select name="funcionario" id="funcionario" required>
                    
                    <?php
                    $sql = "SELECT * FROM funcionarios ORDER BY nome";
                    $sql = $pdo->query($sql);
                    foreach($sql->fetchAll() as $linha) {

                        $IdFuncionarios = $linha['idfuncionarios'];
                        $Nome = $linha['nome'];
                        print("<option value='$IdFuncionarios'>$Nome</option>");
                    }
                    ?>
            </td>
        </tr>
        <tr>
            <td>
                Quantidade Total:
            </td>
            <td>
                <input type="text" name="quant_total" id="quant_total" required>
            </td>
        </tr>
        <tr>
            <td>
                Quantidade Recebida:
            </td>
            <td>
                <input type="text" name="quant_recebida" id="quant_recebida" required>
            </td>
        </tr>
        <tr>
            <td>
                Data de Atualização:
            </td>
            <td>
                <input type="date" name="data_atualiza" id="data_atualiza" required>
            </td>
        </tr>

        <tr>
            <td colspan="5" align="center">
                <input type="submit" value="Cadastrar">
            </td>
        </tr>
    </table>

</form>

<?php
include 'includes/footer.inc.php';
?>