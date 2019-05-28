<?php
    include "../includes/opera_banco.php";
    include "../includes/funcoes.php";

   $id = $_POST['id'];

  delete('grupos',$id);
  header("Location: lista_grupos.php");

  



