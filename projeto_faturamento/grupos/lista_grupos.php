<?php
    session_start();
    include "../includes/funcoes.php";
    include "../includes/template.php";
    include_once "../includes/opera_banco.php";
    
    verifica();
    mainHeaderGrupos();
    menuLateral();
   
    $result = readAll('grupos');

if(isset($_POST['bt_pes_grupos'])){
    $palavra = $_POST['palavra'];
    $assunto = $_POST['assunto'];
    $result = readAll('grupos',['key' => $palavra, 'value' => $assunto]);
}

?>
 <center> 
    <a href="form_insert_grupo.php"><input type="submit" value="ADICIONAR GRUPO"></a>
    <form action="lista_grupos.php" method="post">   
        <label>Termo de pesquisa</label>
        <input name="palavra" size="40" />
        <select name="assunto">
            <option value="id">Código</option>
            <option value="nome">Nome da grupo</option>
            
        </select>
        <button type="submit" name="bt_pes_grupos" value="SEND">
            PESQUISAR
        </button>
    </form>
    <?php
  if (count($result) > 0) {
    ?>
    <div  class="listaClientes">    
        <table>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th colspan="3">OP</th>
            </tr>    
<?php
     foreach($result as $row) {
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nome'] ?></td>
            <td>
                <a href="ver_faturas.php?id=<?= $row['id'] ?>">Ver Faturas </a>
            </td>
            <td>
                <a href="form_update_grupo.php?id=<?= $row['id'] ?>"> Atualizar </a>
            </td>
            <td>
                <form action="delete_grupo.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                    <button name="delete_grupo">
                    Del
                    </button>
                </form>
            </td>
        </tr>

        <?php
    }
    echo "</table>";    
} else {
    echo "0 results";	
}
?>
</div>
</center>