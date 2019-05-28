<?php 
    session_start();
    
    include "../includes/funcoes.php";
    include '../includes/template.php';
    include "../includes/opera_banco.php";

    verifica();

    mainHeaderCliente();
    menuLateral();

    $result = readAll('clientes');
    

    if( isset($_POST['bt_pes_cliente'])){
        $opcao = $_POST['opcao'];
        $palavra = $_POST['palavra'];
        $result = readAll('clientes',['key' => $opcao, 'value' => $palavra]);
    }
    
    if (count($result) > 0) {
       
?>
<div class="listaClientes">
    <lista>LISTAGEM DE CLIENTES</lista>
    <form action="lista_clientes.php" method="post">
        <label><strong>Termo</strong></label>
        <input type="text" name="palavra" id="input-sm" />
        <label>
        <strong>Opções</strong>
            <select name="opcao">
                <option value="nome">Nome</option>
                <option value="cpf">CPF</option>
            </select>
        </label>
        <button id="pesquisar" type="submit" name="bt_pes_cliente" value="SEND">
            PESQUISAR
        </button>
    </form>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Data de nascimento</th>
            <th colspan="2">Ações</th>
        </tr>
<?php
     foreach($result as $key => $row) {
        
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nome'] ?></td>
            <td><?= $row['cpf'] ?></td>
            <td><?= $row['rg'] ?></td>
            <td><?= $row['datanasc'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['id']?>">
                Alterar
                 </a>
            </td>
            <td>
                <form action="delete_cliente.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id']?>">
                    <button  id="excluir" name="delete_cliente" value="SEND">
                    Excluir
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