<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/CategoriaDAO.php';

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];

    $objdao = new CategoriaDAO();
    $ret = $objdao->CadastrarCategoria($nome);
}

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Nova Categoria</h2>
                        <h5>Aqui você poderá cadastrar todas as suas categorias </h5>
                        <?php include_once '_msg.php'; ?>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="POST" action="nova_categoria.php">
                    <div class="form-group">
                        <label>Nome Categoria:</label>
                        <input class="form-control" placeholder="Digite o nome da categoria. Exemplo: conta de luz" name="nome" id="nomeCategoria" value="<?= isset($nome) ? $nome : '' ?>" >
                    </div>
                    <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarCategoria()" >Gravar</button>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>