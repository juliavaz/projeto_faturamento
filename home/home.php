<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Faturamento</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="../assets/css/estilo-home.css">
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="../assets/img/profits.png">
            </div>
            <div class="botoes">
                <a href="..\home\home.php"> <button id="botao_menu" type="submit" name="botao_menu" value="SEND">Home</button></a>
                <a href="..\fatura\form_fatura.php"> <button id="botao_fatura" type="submit" name="botao_fatura" value="SEND" >Fatura</button></a>
                <a href="..\cliente\lista_clientes.php"> <button id="botao_clientes" type="submit" name="botao_clientes" value="SEND" >Clientes</button></a>
                <br/>  <br/>
                <a href="..\cliente\form_cliente.php"> <button id="botao_lista_clientes" type="submit" name="botao_lista_clientes" value="SEND">Cadastrar</button></a>
                <a href="..\grupos\lista_grupos.php"> <button id="botao_grupos" type="submit" name="botao_grupos" value="SEND"> Grupos</button></a>
                <a href="..\cliente\sair.php"> <button id="botao_sair" type="submit" name="botao_sair" value="SEND">Sair</button></a>
            </div>
        </header>
    </body>
</html>

<?php 

        include "../includes/opera_banco.php";
        include "../includes/funcoes.php";
        include "../includes/config.php";