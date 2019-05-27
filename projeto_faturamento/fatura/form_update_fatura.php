<?php
    session_start();
    include "../includes/funcoes.php";
    include '../includes/templates.php';
    include "../includes/conexao.php";
    include "../includes/opera_banco.php";    
    include "../includes/menu-lateral.php";
    
    verifica();
    mainHeaderFatura();        

    $id = $_GET['id'];
    $sql = "SELECT * FROM faturamentos WHERE id='$id'";
    $result = $conn->query($sql);
    $result->bindParam(' :id', $id);
    $result->execute();

    if ($result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>

<div id='form_update_fatura'>
    
    <form action="form_update_fatura.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id']; ?>"/>
        <label>TITULO:</label>
        <input type="text" name="titulo" id="titulo" value="<?= $row['titulo'] ?>"/>
        <br/>
        <label>DESCRIÇÃO:</label>
        <input type="text" name="descricao" id="descricao" value="<?= $row['descricao'] ?>"/>
        <br/>
        <label>DATA LANÇAMENTO:</label>
        <input type="date" name="data_lancamento" id="data_lancamento" value="<?= $row['data_lancamento'] ?>" />
        <br/>
        <label>HORA LANÇAMENTO:</label>
        <input type="time" name="hora_lancamento" id="hora_lancamento" value="<?= $row['hora_lancamento'] ?>" />
        <br/>
        <label>DATA PAGAMENTO:</label>
        <input type="date" name="data_pagamento" id="data_pagamento" value="<?= $row['data_pagamento'] ?>" />
        <br/>
        <label>HORA PAGAMENTO:</label>
        <input type="time" name="hora_pagamento" id="hora_pagamento" value="<?= $row['hora_pagamento'] ?>" />
        <br/>
        <label>DATA VENCIMENTO:</label>
        <input type="date" name="data_vencimento" id="data_vencimento" value="<?= $row['data_vencimento'] ?>" />
        <br/>
        <label>VALOR DA FATURA:</label>
        <input type="double" name="valor_fatura" id="valor_fatura" value="<?= $row['valor_fatura'] ?>" />
        <br/>
        <label>JUROS:</label>
        <input type="double" name="juros" id="juros" value="<?= $row['juros'] ?>" />
        <br/>
        <label>DESCONTO:</label>
        <input type="double" name="desconto" id="desconto" value="<?= $row['desconto'] ?>"/>
        <br/>   
        
        <button type="submit" name="bt_update_fatura" value="SEND">
            ALTERAR
        </button>
    </form>  
</div>

<?php 
            }

        }
        
        $campos["titulo"] = "Título</br>";
        $campos["descricao"] = "Descrição</br>";
        $campos["data_lancamento"] = "Data Lançamento </br>";
        $campos["hora_lancamento"] = "Hora Lançamento </br>";
        $campos["data_pagamento"] = "Data Pagamento</br>";
        $campos["hora_pagamento"] = "Hora Pagamento </br>";
        $campos["data_vencimento"] = "Data Vencimento </br>";
        $campos["valor_fatura"] = "Valor Fatura </br>";
        $campos["juros"] = "Juros </br>";
        $campos["desconto"] = "Desconto </br>";
        $msg_form_erro = "Seguintes campos são obrigatórios</br>";
        $error = false;
        
              
        if( isset($_POST['bt_update_fatura']) ){
            unset($_POST['bt_update_fatura']);
            foreach($campos as $key => $value){
                if( empty($_POST[$key]) )
                {
                    $msg_form_erro .=  $value;
                    $error = true;
                }
            }
            
            if($count_form_erro > 0){
                echo $msg_form_erro;
            }else{
                $id = $_POST['id'];
                $data = update($id, 'faturamentos', $_POST);
                alert($data);
            }
 
        }
?>