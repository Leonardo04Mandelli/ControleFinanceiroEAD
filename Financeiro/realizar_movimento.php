<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/MovimentoDAO.php';
require_once '../DAO/CategoriaDAO.php';
require_once '../DAO/EmpresaDAO.php';
require_once '../DAO/ContaDAO.php';

$dao_categoria = new CategoriaDAO();
$dao_empresa = new EmpresaDAO();
$dao_conta = new ContaDAO();

if(isset($_POST['btnGravar'])){
    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $categoria = $_POST['categoria'];
    $empresa = $_POST['empresa'];
    $conta = $_POST['conta'];
    $obs = $_POST['obs'];

    $objdao = new MovimentoDAO();
    $ret = $objdao->RealizarMovimento($tipo, $data, $valor, $categoria, $empresa, $conta, $obs);
}

$categorias = $dao_categoria->ConsultarCategoria();
$empresas = $dao_empresa->ConsultarEmpresa();
$contas = $dao_conta->ConsultarConta();



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
                        <h2>Realizar Movimento</h2>
                        <h5>Aqui você poderá realizar seus movimentos de entrada ou saída </h5>
                        <?php include_once '_msg.php'; ?>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form method="POST" action="realizar_movimento.php">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tipo do Movimento</label>
                            <select class="form-control" name="tipo" id="tipo" value="<?= isset($tipo) ? $tipo : '' ?>" >
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saída</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Data</label>
                            <input type="date" class="form-control" name="data" id="data" value="<?= isset($data) ? $data : '' ?>" >
                        </div>
                        <div class="form-group">
                            <label>Valor</label>
                            <input class="form-control" placeholder="Digite o valor do movimento..." name="valor" id="valor" value="<?= isset($valor) ? $valor : '' ?>" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="categoria" id="categoria">
                                <option value="">Selecione</option>
                                <?php foreach($categorias as $item){ ?>
                                    <option value="<?= $item['id_categoria'] ?>">
                                        <?= $item['nome_categoria'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Empresa</label>
                            <select class="form-control" name="empresa" id="empresa">
                                <option value="">Selecione</option>
                                <?php foreach($empresas as $item){ ?>
                                    <option value="<?= $item['id_empresa'] ?>">
                                        <?= $item['nome_empresa'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Conta</label>
                            <select class="form-control" name="conta" id="conta">
                                <option value="">Selecione</option>
                                <?php foreach($contas as $item){ ?>
                                    <option value="<?= $item['id_conta'] ?>">
                                        <?= 'Banco: ' . $item['banco_conta'] . ' / Agência: ' . $item['agencia_conta'] . ' / Número: ' . $item['numero_conta'] . ' / Saldo: ' . $item['saldo_conta'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observação (Opcional)</label>
                            <textarea class="form-control" rows="3" name="obs" id="obs"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarMovimento()">Gravar</button>
                    </div>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>