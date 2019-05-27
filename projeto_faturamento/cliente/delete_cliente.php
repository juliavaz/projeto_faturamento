<?php
    session_start();
    include "../includes/opera_banco.php";
    include "../includes/funcoes.php";
    
    if(!isset($_POST['id'])){
        die("Nenhum ID informado!");
    }
    $data = delete('clientes',$_POST['id']);
    alert($data);

    header("Location: lista_clientes.php");

