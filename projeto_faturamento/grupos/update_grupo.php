<?php
    include "../includes/opera_banco.php";
    include "../includes/funcoes.php";
    include "../includes/config.php";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    unset($_POST['bt_up_categoria']);
    $data = update($id,'grupos',$_POST);
    alert($data);
    header("Location: lista_grupos.php");
