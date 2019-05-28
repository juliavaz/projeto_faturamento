<?php
    include '../includes/opera_banco.php';
    include '../includes/template.php';

    $result = readById('faturamentos','id_grupo',$_GET['id']);

    mainHeaderCliente();
    menuLateral();

    ?>
    <div class="listaClientes">
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Data Lançamento</th>
                    <th>Valor Fatura</th>
                    <th>Juros</th>
                    <th>Descontos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(count($result) > 0){
                    foreach($result as $row){
                ?>
                <tr>
                    <td><?php echo $row['titulo'] ?></td>
                    <td><?php echo $row['descricao'] ?></td>
                    <td><?php echo $row['data_lancamento'] ?></td>
                    <td>R$<?php echo $row['valor_fatura'] ?></td>
                    <td><?php echo $row['juros'] ?>%</td>
                    <td>R$<?php echo $row['desconto'] ?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>