<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class UsuarioDAO extends Conexao
{

    public function ValidarLogin($email, $senha){
        if($email == '' || $senha == ''){
            return 0;
        }else if(strlen($senha) < 6){
            return -2;
        }else{
            $conexao = parent::retornarConexao();
            $comando_sql = 'SELECT id_usuario, 
                            nome_usuario 
                            FROM tb_usuario 
                            WHERE email_usuario = ? 
                            AND senha_usuario = ?';

            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            
            $sql->bindValue(1, $email);
            $sql->bindValue(2, $senha);

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $user = $sql->FetchAll();

            if(count($user) == 0){
                return -6;
            }else {
                $cod = $user[0]['id_usuario'];
                $nome = $user[0]['nome_usuario'];

                UtilDAO::CriarSessao($cod, $nome);

                header('location: inicio.php');
                exit;
            }
        }
    }

    public function ValidarEmailDuplicadoCadastrar($email){
        if(trim($email) == ''){
            return 0;
        }
        
        $conexao = parent::retornarConexao();
        $comando_sql = 'select count(email_usuario) as contar
                        from tb_usuario where email_usuario = ?';
        
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $email);
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();
        $contar = $sql->fetchAll();

        return $contar[0]['contar'];
    }

    public function ValidarEmailDuplicadoCadastrarAlteracao($email){
        if(trim($email) == ''){
            return 0;
        }
        
        $conexao = parent::retornarConexao();
        $comando_sql = 'select count(email_usuario) as contar
                        from tb_usuario where email_usuario = ? and id_usuario != ?';
        
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $email);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();
        $contar = $sql->fetchAll();

        return $contar[0]['contar'];
    }

    public function CriarCadastro($nome, $email, $telefone, $senha, $repSenha){
        if($nome == '' || $email == '' || $telefone == '' || $senha == '' || $repSenha == ''){
            return 0;
        }else if(strlen($senha) < 6){
            return -2;
        }else if($senha != $repSenha){
            return -3;
        }else{
            if($this->ValidarEmailDuplicadoCadastrar($email) != 0){
                return -5;
            }

            $conexao = parent::retornarConexao();
            $comando_sql = 'INSERT INTO tb_usuario
                            (nome_usuario, email_usuario, telefone_usuario, senha_usuario, data_cadastro)
                            VALUES (?,?,?,?,?)';

            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
            
            $sql->bindValue(1, $nome);
            $sql->bindValue(2, $email);
            $sql->bindValue(3, $telefone);
            $sql->bindValue(4, $senha);
            $sql->bindValue(5, date('Y-m-d'));

            try{
                $sql->execute();

                return 1;
            }catch(Exception $ex){
                echo $ex->getMessage();
                return -1;
            }
        }
    }

    public function CarregarMeusDados()
    {

        $conexao = parent::retornarConexao();

        $comando_sql = 'select nome_usuario,
                                email_usuario,
                                telefone_usuario
                            from tb_usuario
                            where id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function GravarMeusDados($nome, $email, $telefone)
    {
        if(trim($nome) == '' || trim($email) == '' || trim($telefone) == ''){
            return 0;
        }
        if($this->ValidarEmailDuplicadoCadastrarAlteracao($email) != 0){
            return -5;
        }
        else{
            $conexao = parent::retornarConexao();
            $comando_sql = 'update tb_usuario
                                set nome_usuario = ?,
                                    email_usuario = ?,
                                    telefone_usuario = ?
                             where id_usuario = ?';
                             
             $sql = new PDOStatement();
             $sql = $conexao->prepare($comando_sql);
             
             $sql->bindValue(1, $nome);
             $sql->bindValue(2, $email);
             $sql->bindValue(3, $telefone);
             $sql->bindValue(4, UtilDAO::CodigoLogado());

             try{
                $sql->execute();

                return 1;
             }catch(Exception $ex){
                echo $ex->getMessage();
                return -1;
             }
        }

    }

    public function CadastrarMeusDados($nome, $email, $telefone, $senha, $repSenha)
    {
        if (trim($nome) == '' || trim($email) == '' || trim($telefone) == '' || trim($senha) == '' || trim($repSenha) == '') {
            return 0;
        }
        if (strlen($senha) < 6) {
            return -2;
        }
        if (trim($repSenha) != trim($senha)) {
            return -3;
        } else {
        }
    }
}
