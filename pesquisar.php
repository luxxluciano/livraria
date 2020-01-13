<?php
require 'includes/conecta.inc.php';
?>

<?php
include 'includes/header.inc.php';
?>
<center>
    <table border="0" bordercolor="blue">
        <th>Pesquisar Livros</th>
        <tr>
            <td align='center'>
                <br />
                    <form action="pesqLivros.php" method="get">
                    Título: <input type="text" name="titulo">
                    <input type="hidden" name="id" value="2">
                    &nbsp;&nbsp;<input type="submit" value="Pesquisar Título">
                </form>
                <br />
                <hr>
                <br />
                
                    <form action="pesqLivros.php" method="get">
                    Fornecedor: <select name="fornecedor" id="fornecedor" required>
                    
                    <?php
                    $sql = "SELECT * FROM fornecedores ORDER BY nome";
                    $sql = $pdo->query($sql);
                    foreach ($sql->fetchAll() as $linha) {

                        $IdFornecedor = $linha['idfornecedores'];
                        $NomeFornecedor = $linha['nome'];
                        print("<option value='$IdFornecedor'>$NomeFornecedor</option>");
                    }
                    ?>
                    
                    <input type="hidden" name="id" value="1">
                    &nbsp;&nbsp;<input type="submit" value="Pesquisar Fornecedor">
                </form>
                <br />
            </td>		
        </tr>
        <th>Pesquisar Estoques</th>
        <tr>
            <td align='center'>
                <br />

                <form action="pesqEstoque.php" method="get">
                Funcionário: <select name="funcionario" id="funcionario" required>
                
                <?php
                $sql = "SELECT * FROM funcionarios ORDER BY nome";
                $sql = $pdo->query($sql);
                foreach($sql->fetchAll() as $linha) {

                    $IdFuncionarios = $linha['idfuncionarios'];
                    $Nome = $linha['nome'];
                    print("<option value='$IdFuncionarios'>$Nome</option>");
                }
                ?>
                    <input type="hidden" name="id" value="3">
                    &nbsp;&nbsp;<input type="submit" value="Pesquisar Funcionário">
                </form>
                <br />
                <hr>
                <br />
                <form action="pesqEstoque.php" method="get">
                    Título: <input type="text" name="titulo">
                    <input type="hidden" name="id" value="4">
                    &nbsp;&nbsp;<input type="submit" value="Pesquisar Título">
                </form>
                <br />
            </td>
        </tr>
    </table>
</center>


<?php
include 'includes/footer.inc.php';
?>