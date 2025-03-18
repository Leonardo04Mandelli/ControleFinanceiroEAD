<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/UsuarioDAO.php';

$objdao = new UsuarioDAO();

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $ret = $objdao->GravarMeusDados($nome, $email, $telefone);
}

$dados = $objdao->CarregarMeusDados();

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
                        <h2>Meus Dados</h2>
                        <h5>Nesta página, você poderá alterar seus dados </h5>

                        <?php include_once '_msg.php'; ?>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="POST" action="meus_dados.php">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input class="form-control" placeholder="Digite seu nome..." name="nome" id="nome" value="<?= $dados[0]['nome_usuario'] ?>" >
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="email" class="form-control" placeholder="Digite seu email..." name="email" id="email" value="<?= $dados[0]['email_usuario'] ?>" >
                    </div>
                    <div class="form-group">
                        <label>Telefone:</label>
                        <input type="text" class="form-control" placeholder="Digite seu telefone..." name="telefone" id="telefone" value="<?= $dados[0]['telefone_usuario'] ?>" >
                    </div>
                    <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarMeusDados()">Gravar</button>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


</body>

</html>