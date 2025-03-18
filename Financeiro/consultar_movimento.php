<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/MovimentoDAO.php';

$data_inicial = '';
$data_final = '';
$tipo_movimento = '';

if (isset($_POST['btnPesquisar'])) {
    $tipo_movimento = $_POST['tipomovimento'];
    $data_inicial = $_POST['datainicial'];
    $data_final = $_POST['datafinal'];

    $dao = new MovimentoDAO();
    $movimento = $dao->filtrarMovimento($tipo_movimento, $data_inicial, $data_final);
}else if(isset($_POST['btnExcluir'])){
    $idMovimento = $_POST['idMovimento']; 
    $idConta = $_POST['idConta'];
    $tipo = $_POST['tipo']; 
    $valor = $_POST['valor'];
    $dao = new MovimentoDAO();
    $ret = $dao->ExcluirMovimento($idMovimento, $idConta, $valor, $tipo);
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
                        <?php include_once '_msg.php'; ?>
                        <h2>Consultar Movimento</h2>
                        <h5>Consulte todos os movimentos em um determinado período </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form method="POST" action="consultar_movimento.php">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo do Movimento</label>
                            <select class="form-control" name="tipomovimento">
                                <option value="0" <?= $tipo_movimento == '0' ? 'selected' : '' ?>>Todos</option>
                                <option value="1" <?= $tipo_movimento == '1' ? 'selected' : '' ?>>Entrada</option>
                                <option value="2" <?= $tipo_movimento == '2' ? 'selected' : '' ?>>Saída</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Inicial</label>
                            <input type="date" class="form-control" id="data_inicial" name="datainicial" value="<?= $data_inicial ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Final</label>
                            <input type="date" class="form-control" id="data_final" name="datafinal" value="<?= $data_final ?>">
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" onclick="return ValidarConsultaMovimento()" name="btnPesquisar">Pesquisar</button>
                    </div>
                </form>
                <hr>

                <?php if (isset($movimento)) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span>Resultado Encontrado</span>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Tipo</th>
                                                    <th>Categoria</th>
                                                    <th>Empresa</th>
                                                    <th>Conta</th>
                                                    <th>Valor</th>
                                                    <th>Observação</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $total = 0;
                                                for ($i = 0; $i < count($movimento); $i++) {
                                                    if ($movimento[$i]['tipo_movimento'] == 1) {
                                                        $total = $total + $movimento[$i]['valor_movimento'];
                                                    } else {
                                                        $total = $total - $movimento[$i]['valor_movimento'];
                                                    }
                                                ?>
                                                    <tr class="odd gradeX">
                                                        <td><?= $movimento[$i]['data_movimento'] ?></td>
                                                        <td><?= $movimento[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?></td>
                                                        <td><?= $movimento[$i]['nome_categoria'] ?></td>
                                                        <td><?= $movimento[$i]['nome_empresa'] ?></td>
                                                        <td><?= $movimento[$i]['banco_conta'] ?> / Agência: <?= $movimento[$i]['agencia_conta'] ?> / Número: <?= $movimento[$i]['numero_conta'] ?></td>
                                                        <td>R$ <?= $movimento[$i]['valor_movimento'] ?></td>
                                                        <td><?= $movimento[$i]['obs_movimento'] ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExcluir<?= $i ?>">Excluir</a>
                                                            <form action="consultar_movimento.php" method="POST">
                                                                <input type="hidden" name="idMovimento" value="<?= $movimento[$i]['id_movimento'] ?>">
                                                                <input type="hidden" name="idConta" value="<?= $movimento[$i]['id_conta'] ?>">
                                                                <input type="hidden" name="tipo" value="<?= $movimento[$i]['tipo_movimento'] ?>">
                                                                <input type="hidden" name="valor" value="<?= $movimento[$i]['valor_movimento'] ?>">
                                                                <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                <h4 class="modal-title" id="myModalLabel">Confirmação de Exclusão</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <b>Deseja excluir o movimento: </b><br><br>
                                                                                <b>Data do movimento: </b><?= $movimento[$i]['data_movimento'] ?><br>
                                                                                <b>Tipo do movimento: </b><?= $movimento[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?><br>
                                                                                <b>Categoria: </b><?= $movimento[$i]['nome_categoria'] ?><br>
                                                                                <b>Empresa: </b><?= $movimento[$i]['nome_empresa'] ?><br>
                                                                                <b>Conta: </b><?= $movimento[$i]['banco_conta'] ?> / <b>Agência: </b><?= $movimento[$i]['agencia_conta'] ?> / <b>Número: </b><?= $movimento[$i]['numero_conta'] ?><br>
                                                                                <b>Valor: </b><?= $movimento[$i]['valor_movimento'] ?> ?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                                                                <button type="submit" class="btn btn-primary" name="btnExcluir">Sim</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <center>
                                            <label style="color: <?= $total < 0 ? 'red' : 'green' ?>">TOTAL: R$ <?= number_format($total, 2, ',', '.') ?></label>
                                        </center>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                <?php } ?>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


</body>

</html>