<?php session_start(); 
    include '../includes/template.php';
    include "../includes/funcoes.php";
    include "../includes/opera_banco.php";

    verifica();
    mainHeaderFatura();
    menuLateral();

    $clientes = readAll('clientes');
    $grupos = readAll('grupos');

    ini_set('default_charset','UTF-8');


?>


<div class="centro">
    <div class="titulo"> 
        <br/>FORMULÁRIO FATURA<br/> <br/> 
    </div>

    <div class="formfatura">
        
        <form action="form_fatura.php" method="post">

            <select name="id_cliente">
                <?php
                    if(count($clientes) > 0){
                        foreach($clientes as $cliente){
                            echo "<option value='".$cliente['id']."'> " . $cliente['nome'] . "</option>";
                        }
                    }else{
                        echo "<option> Não existe nenhum </option>";
                    }
                ?>
            </select>

            <select name="id_grupo">
                <?php
                    if(count($grupos) > 0){
                        foreach($grupos as $grupo){
                            echo "<option value='".$grupo['id']."'> " . $grupo['nome'] . "</option>";
                        }
                    }else{
                        echo "<option> Não existe nenhum </option>";
                    }
                ?>
            </select>

            <input placeholder="TITULO" type="text" name="titulo" id="titulo"  size="100" />  

            <input placeholder="DESCRIÇÃO" type="text" name="descricao" id="descricao"  size="100" />
            <br/>

            <input placeholder="VALOR DA FATURA" type="double" name="valor_fatura" id="valor_fatura" size="100"  />
            <br/>

            <input placeholder="JUROS" type="double" name="juros" id="juros" size="100"  />
            <br/>

            <input placeholder="DESCONTO" type="double" name="desconto" id="desconto"  size="100" />
            <br/>
            <br/>
            ||&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Lançamento &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  || &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            Data: <input placeholder="DATA LANÇAMENTO" type="date" name="data_lancamento" id="data_lancamento"  size="30">

            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            Hora: <input placeholder="HORA LANÇAMENTO" type="time" name="hora_lancamento" id="hora_lancamento" size="30"  />
            <br/>

            ||&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pagamento &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  || &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            Data: <input placeholder="DATA PAGAMENTO" type="date" name="data_pagamento" id="data_pagamento"  size="30" />

            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            Hora:  <input placeholder="HORA PAGAMENTO" type="time" name="hora_pagamento" id="hora_pagamento"  size="30" />
            <br/>

           

            <input id="botao" type="submit" name="bot_insert_fatura" value="CADASTRAR">          
        </form>   
    </div>      
</div>

</body>
</html>

<?php 

    $campos["data_lancamento"] = " Data Lançamento </br>";
    $campos["hora_lancamento"] = " Hora Lançamento </br>";
    $campos["valor_fatura"] = " Valor Fatura </br>";
    $campos["titulo"] = " Título </br>";
    $msg_form_erro = "<br/><br/><br/><br/><br/><br/><br/><br/><br/>
    Seguintes campos são obrigatórios : </br>";
    $error = false;

            
    if( isset($_POST['bot_insert_fatura']) ){
        
        foreach($campos as $key => $value){
            if( empty($_POST[$key]) )
            {
                $msg_form_erro .=  $value;
                $error = true;
            }
        }
        
        if($error){
            echo $msg_form_erro;
            return false;
        }else{
            unset($_POST['bot_insert_fatura']);
            
            $data = insert('faturamentos', $_POST);
            alert($data);
            
        }

    }