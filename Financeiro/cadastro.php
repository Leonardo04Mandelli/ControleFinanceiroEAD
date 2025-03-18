<?php
require_once '../DAO/UsuarioDAO.php';

if(isset($_POST['btnCadastro'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $repSenha = $_POST['repSenha'];

    $objdao = new UsuarioDAO();
    $ret = $objdao->CriarCadastro($nome, $email, $telefone, $senha, $repSenha);
}

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';
?>

<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2>Controle Financeiro : Cadastro</h2>

                <h5>( Faça seu cadastro )</h5>
                <br />
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Insira os seus dados! </strong>
                        <?php include_once '_msg.php' ?>
                    </div>
                    <div class="panel-body">
                        <br />
                        <form method="POST" action="cadastro.php">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                <input type="text" class="form-control" placeholder="Seu nome" name="nome" id="nomeUsuario" value="<?= isset($nome) ? $nome : '' ?>" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" placeholder="Seu e-mail" name="email" id="email" value="<?= isset($email) ? $email : '' ?>" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa-solid fa-phone"></i></span>
                                <input type="text" class="form-control" placeholder="Seu telefone" name="telefone" id="telefone" value="<?= isset($telefone) ? $telefone : '' ?>" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Crie sua senha (mínimo 6 caracteres)" name="senha" id="senha" value="<?= isset($senha) ? $senha : '' ?>" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Repita a senha criada" name="repSenha" id="repSenha" value="<?= isset($repSenha) ? $repSenha : '' ?>" />
                            </div>

                            <button class="btn btn-success " name="btnCadastro" onclick="return ValidarCadastro()">Finalizar cadastro</button>
                        </form>
                        <hr />
                        <span>Possui cadastro ?</span> <a href="index.php">Clique aqui</a>
                    </div>

                </div>
            </div>


        </div>
    </div>



</body>

</html>