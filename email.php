<?php

$GetParam = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Nome = $GetParam['nome'];
$Email = $GetParam['email'];
$Mensagem = "https://danielaseolino.000webhostapp.com/capturaemail/arquivo/saudavel.pdf";

$Email_remetente = "daniela-seolino@educar.rs.gov.br";
$Email_destinatario = "{$Email}";
$Email_reply = "dseolino@gmail.com";

$Email_assunto = "Novo contato pelo site";
$Email_conteudo = "Nome = {$Nome} \n";
$Email_conteudo .="Email = {$Email} \n";
$Email_conteudo .="Mensagem = {$Mensagem} \n";
$HeaderArray = array("From: $Email_remetente",
    "Reply-To: $Email_reply",
    "Subect: $Email_assunto",
    "Return-Path: $Email_remetente",
    "MIME-Version: 1.0",
    "X-Priority: 3",
    "Content-Type: text/html; charset=UTF-8");
$Email_headers = implode("\n", $HeaderArray);
$dados = fopen("dados.txt", "a");
fwrite($dados, $Nome.$Email);
fclose($dados);

if(mail($Email_destinatario, $Email_assunto, $Email_conteudo, $Email_headers)){
    
    ?>
    
    <div class="trigger trigger-sucess">
        <p>SUCESSO: O arquivo foi enviado ao seu email com sucesso!</p>
    </div>
    <?php
} else{
    ?>
    <div class="trigger trigger-error">
        <p>FALHA: Tente novamente!</p>
    </div>
    <?php
}




?>