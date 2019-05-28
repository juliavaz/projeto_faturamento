<?php

function mainHeaderCliente($title = "Sistema de Faturamento"){
    ?>  
    <html>
    <head>
        <title> <?php echo $title ?> </title>
        <link rel="stylesheet" type="text/css" href="../assets/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/estilo-lista.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/menu-lateral.css">
        <? ini_set('default_charset','UTF-8'); ?>
    <body>
    <?php
}

function mainHeaderGrupos($title = "Sistema de Faturamento"){
    
    ini_set('default_charset','UTF-8'); ?>
    <html>
    <head>
        <title> <?php echo $title ?> </title>
        <link rel="stylesheet" type="text/css" href="../assets/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/estilo-lista.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/menu-lateral.css">
    </head>
    <body>
    <?php
}

function mainHeaderFatura($title = "Sistema de Faturamento"){
    ?>  
    <html>
    <head>
        <title> <?php echo $title ?> </title>
        <link rel="stylesheet" type="text/css" href="../assets/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/estilo-fatura.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/menu-lateral.css">
        <? ini_set('default_charset','UTF-8'); ?>
    </head>
    <body>
    <?php
}


function menu(){
    ?>
    <header>
        <div class="logo">
            <img src="../assets/img/profits.png">
        </div>
        <? ini_set('default_charset','UTF-8'); ?>        
        <nav class="menu">
            <ul>
                <li><a href="..\home\home.php">Home</a></li>
                <li><a href="..\fatura\form_fatura.php">Faturas</a></li>
                <li><a href="..\cliente\lista_clientes.php" >Clientes</a></li>
                <li><a href="..\grupos\lista_grupos.php">Grupos</a></li>
                <li><a href="..\cliente\form_cliente.php" >Cadastrar</a></li>
                <li><a href="..\cliente\sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <?php
}

function menuLateral(){
    ?>
        <!-- <div class="logo">
            <img src="..\includes\profits.png">
        </div> -->
        <nav class="menu">
            <ul>
                <li><a href="..\home\home.php">Home</a></li>
                <li><a href="..\fatura\form_fatura.php">Faturas</a></li>
                <li><a href="..\cliente\lista_clientes.php" >Clientes</a></li>
                <li><a href="..\grupos\lista_grupos.php">Grupos</a></li>
                <li><a href="..\cliente\form_cliente.php" >Cadastrar</a></li>
                <li><a href="..\cliente\sair.php">Sair</a></li>
            </ul>
        </nav>
    <?php
}


