<?php
session_start();
include "../includes/opera_banco.php";
include "../includes/config.php";
include "../includes/funcoes.php";

if(!isset($_POST['id'])){
    die("Nenhum ID informado!");
}


$data = delete("faturamentos",$_POST['id']);

alert($data);

header("Location: lista_fatura.php");

