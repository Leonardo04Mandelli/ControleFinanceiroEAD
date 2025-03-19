function ValidarMeusDados() {
    var nome = document.getElementById("nome").value;
    var email = $("#email").val();

    if (nome.trim() == '') {
        alert("Preencher o campo NOME!");
        $("#nome").focus();
        return false;
    }
    if (email.trim() == '') {
        alert("Preencher o campo EMAIL!");
        $("#email").focus();
        return false;
    }


}

function ValidarCategoria() {
    if ($("#nomeCategoria").val().trim() == '') {
        alert("Preencher o campo NOME DA CATEGORIA!");
        $("#nomeCategoria").focus();
        return false;
    }
}

function ValidarEmpresa() {
    if ($("#nomeEmpresa").val().trim() == '') {
        alert("Preencher o campo NOME DA EMPRESA! (Obrigatório)");
        $("#nomeEmpresa").focus();
        return false;
    }
}

function ValidarConta() {
    if ($("#nomeConta").val().trim() == '') {
        alert("Preencher o campo NOME DA CONTA! (Obrigatório)");
        $("#nomeConta").focus();
        return false;
    }
    if ($("#agencia").val().trim() == '') {
        alert("Preencher o campo AGÊNCIA! (Obrigatório)");
        $("#agencia").focus();
        return false;
    }
    if ($("#numeroConta").val().trim() == '') {
        alert("Preencher o campo NUMERO DA CONTA! (Obrigatório)");
        $("#numeroConta").focus();
        return false;
    }
    if ($("#saldo").val().trim() == '') {
        alert("Preencher o campo SALDO! (Obrigatório)");
        $("#saldo").focus();
        return false;
    }
}

function ValidarMovimento() {
    if ($("#tipo").val() == '') {
        alert("Selecione o TIPO DO MOVIMENTO! (Obrigatório)");
        $("#tipo").focus();
        return false;
    }
    if($("#data").val() == ''){
        alert("Selecione a DATA DO MOVIMENTO! (Obrigatório)");
        $("#data").focus();
        return false;
    }
    if($("#valor").val().trim() == ''){
        alert("Preencher o campo VALOR DO MOVIMENTO! (Obrigatório)");
        $("#valor").focus();
        return false;
    }
    if($("#categoria").val() == ''){
        alert("Selecione a CATEGORIA DO MOVIMENTO! (Obrigatório)");
        $("#categoria").focus();
        return false;
    }
    if($("#empresa").val() == ''){
        alert("Selecione a EMPRESA DO MOVIMENTO! (Obrigatório)");
        $("#empresa").focus();
        return false;
    }
    if($("#conta").val() == ''){
        alert("Selecione a CONTA DO MOVIMENTO! (Obrigatório)");
        $("#conta").focus();
        return false;
    }
}

function ValidarConsultaMoviment0(){
    if($("#data_inicial").val().trim() == ''){
        alert("Selecione a DATA INICIAL DO MOVIMENTO! (Obrigatório)");
        $("#data_inicial").focus();
        return false;
    }
    if($("#data_final").val().trim() == ''){
        alert("Selecione a DATA FINAL DO MOVIMENTO! (Obrigatório)");
        $("#data_final").focus();
        return false;
    }
}

function ValidarCadastro(){
    if($("#nomeUsuario").val().trim() == ''){
        alert("Preencha o campo NOME! (Obrigatório)");
        $("#nomeUsuario").focus();
        return false;
    }
    if($("#email").val().trim() == ''){
        alert("Preencha o campo EMAIL! (Obrigatório)");
        $("#email").focus();
        return false;
    }
    if($("#telefone").val().trim() == ''){
        alert("Preencha o campo TELEFONE! (Obrigatório)");
        $("#telefone").focus();
        return false;
    }
    if($("#senha").val().trim() == ''){
        alert("Preencha o campo SENHA! (Obrigatório)");
        $("#senha").focus();
        return false;
    }
    if($("#senha").val().trim().length < 6){
        alert("A senha deve conter no mínimo 6 caracteres!");
        $("#senha").focus();
        return false;
    }
    if($("#repSenha").val().trim() == ''){
        alert("Preencha o campo REPETIR SENHA! (Obrigatório)");
        $("#repSenha").focus();
        return false;
    }
    if($("#senha").val().trim() != $("#repSenha").val().trim()){
        alert("Os campos SENHA e REPETIR SENHA não conferem! (Devem ser iguais)");
        $("#repSenha").focus();
        return false;
    }
}

function ValidarLogin(){
    if($("#email").val().trim() == ''){
        alert("Preencha o campo EMAIL! (Obrigatório)");
        $("#email").focus();
        return false;
    }
    if($("#senha").val().trim() == ''){
        alert("Preencha o campo SENHA! (Obrigatório)");
        $("#senha").focus();
        return false;
    }
}