<?php

    if(isset($_GET['ret'])){
        $ret = $_GET['ret'];
    }

    if (isset($ret)) {
        switch ($ret) {
            case 0:
                echo '<div class="alert alert-warning">Preencher Todos os Campos Obrigatórios!</div>';
                break;
            case 1:
                echo '<div class="alert alert-success">Operação Realizada com Sucesso!</div>';
                break;
            case -1:
                echo '<div class="alert alert-danger">ERROR: Falha ao Realizar Conexão com o Banco de Dados!</div>';
                break;
            case -2:
                echo '<div class="alert alert-warning">ERROR: A senha deve conter no mínimo 6 caracteres!</div>';
                break;
            case -3:
                echo '<div class="alert alert-warning">ERROR: Os campos SENHA e REPETIR SENHA devem ser os mesmos!</div>';
                break;
            case -4:
                echo '<div class"alert alert-danger"
                        O registro não poderá ser excluido, pois esta em uso!
                    </div>';
                break;
            case -5:
                echo '<div class="alert alert-warning">Já existe um cadastro com esse E-mail!</div>';
                break;   
            case -6:
                echo '<div class="alert alert-warning">Cadastro inexistente. Nenhum Usuário foi encontrado!</div>';
                break;    
        }
    }