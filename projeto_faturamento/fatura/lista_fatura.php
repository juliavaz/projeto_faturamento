<?php 
    session_start();

    include "../includes/funcoes.php";
    include "../includes/opera_banco.php";
    include '../includes/template.php';
    verifica();
    mainHeaderFatura();
    menuLateral();



    $result = readAll('faturamentos');

    if( isset($_POST['bt_pes_fatura'])){
        $opcao = $_POST['opcao'];
        $palavra = $_POST['palavra'];
        $result = readAll('faturamentos',['key' => $opcao, 'value' => $palavra]);
    }

    
?>
    <lista>LISTAGEM DE FATURA</lista>
    <form action="lista_fatura.php" method="post">
        <label><strong>Fatura</strong></label>
        <input type="text" name="palavra" id="input-sm"/>
        <label>
        <strong>Opções</strong>
            <select name="opcao">
                <option value="titulo">Titulo</option>                
                <option value="descricao">Descrição</option>
                <option value="data_lancamento">Data Lançamento</option>
                <option value="hora_lancamento">Hora Lançamento</option>
                <option value="data_pagamento">Data Pagamento</option>
                <option value="hora_pagamento">Hora Pagamento</option>
                <option value="data_vencimento">Data Vencimento</option>
                <option value="valor_fatura">Valor Fatura</option>
                <option value="juros">Juros</option>
                <option value="desconto">Desconto</option>
            </select>
        </label>
        <button id="pesquisar" type="submit" name="bt_pes_fatura" value="SEND">
            PESQUISAR
        </button>
    </form>
    <br><br>
<?php
    if (count($result) > 0) {
        
        ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Data Lançamento</th>
            <th>Hora Lançamento</th>
            <th>Data Pagamento</th>
            <th>Hora Pagamento</th>
            <th>Valor Fatura</th>
            <th>Juros</th>
            <th>Desconto</th>
            <th colspan="11">Ações</th>
        </tr>
<?php
     foreach($result as $row){
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['titulo'] ?></td>
            <td><?= $row['data_lancamento'] ?></td>
            <td><?= $row['hora_lancamento'] ?></td>
            <td><?= $row['data_pagamento'] ?></td>
            <td><?= $row['hora_pagamento'] ?></td>
            <td><?= $row['valor_fatura'] ?></td>
            <td><?= $row['juros'] ?></td>
            <td><?= $row['desconto'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['id']?>">
                    Alterar
                </a>
            </td>
            <td>
                <form action="delete_fatura.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id']?>">
                    <button  id="excluir" name="delete_fatura" value="SEND">
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