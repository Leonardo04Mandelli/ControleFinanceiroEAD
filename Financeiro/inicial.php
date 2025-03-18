<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include_once '_head.php'; ?>

<body>
    <div id="wrapper">
        <?php
            include_once '_topo.php';
            include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Sistema Intranet de Controle Financeiro.</h2>
                        <h5>Seja bem vindo(a) <strong><?= UtilDAO::NomeLogado(); ?></strong>, todos os Módulos de trabalho você pode acessar no MENU lateral.</h5>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>
</body>
</html>