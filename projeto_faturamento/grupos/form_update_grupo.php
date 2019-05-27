<?php
  session_start();
  include "../includes/funcoes.php";
  include "../includes/opera_banco.php";
  include "../includes/template.php";
  include "../includes/config.php";
  verifica();
  mainHeaderCliente();
  menuLateral();


    $result = readById('grupos','id',$_GET['id']);
    if (count($result) > 0) {
     ?>
       <div style="width:60%;margin: 0 auto;">
       <br/>
       <h3>ALTERA GRUPO</h3>
       <form action='update_grupo.php' method='post'>
       <?php
        foreach($result as $row) {
          ?>
          <h3>NOME</h3>
          <input type="hidden" name="id" value='<?= $row['id']?>' />
          <input type="text" name="nome" value='<?= $row['nome']?>' />
          <p>&nbsp;</p>
          <button type="submit" name="bt_up_categoria">
               ALTERA GRUPO
          </button>  
          <?php
    }
    ?>
   </form>
   <?php
} else {
    echo "0 results";	
}
?>
</div>