
<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/EmpresaDAO.php';

$dao = new EmpresaDAO();
$empresas = $dao->ConsultarEmpresa();

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
                        <?php include_once '_msg.php'; ?>
                        <h2>Consultar Empresa</h2>
                        <h5>Consulte todas suas empresas aqui </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>Empresas  cadastradas. Caso dejesa alterar, clique no botão</span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nome da Empresa</th>
                                                <th>Telefone</th>
                                                <th>Endereço</th> 
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($i=0; $i<count($empresas) ; $i++){ ?>

                                            <tr class="odd gradeX">
                                                <td><?= $empresas[$i]['nome_empresa'] ?></td>
                                                <td><?= $empresas[$i]['telefone_empresa'] ?></td>
                                                <td><?= $empresas[$i]['endereco_empresa'] ?></td>
                                                <td>
                                                    <a href="alterar_empresa.php?cod=<?= $empresas[$i]['id_empresa'] ?>" class="btn btn-warning btn-sm">Alterar</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


</body>

</html>