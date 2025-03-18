<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/EmpresaDAO.php';

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $objdao = new EmpresaDAO();
    $ret = $objdao->CadastrarEmpresa($nome, $telefone, $endereco);
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
                        <h2>Nova Empresa</h2>
                        <h5>Cadastre uma Nova Empresa Aqui </h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_empresa.php" method="POST">
                    <div class="form-group">
                        <label>Nome da Empresa*</label>
                        <input class="form-control" placeholder="Digite o nome da empresa..." name="nome" id="nomeEmpresa" value="<?= isset($nome) ? $nome : '' ?>" >
                    </div>
                    <div class="form-group">
                        <label>Telefone da Empresa</label>
                        <input type="number" class="form-control" placeholder="Digite o telefone da empresa..." name="telefone" value="<?= isset($telefone) ? $telefone : '' ?>" >
                    </div>
                    <div class="form-group">
                        <label>Endereço da Empresa</label>
                        <input class="form-control" placeholder="Digite o endereço da empresa..." name="endereco" value="<?= isset($endereco) ? $endereco : '' ?>" >
                    </div>
                    <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarEmpresa()" >Gravar</button>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>