<?php session_start(); 
    include '../includes/template.php';
    mainHeaderCliente();
    menu();
    include "../includes/opera_banco.php";
    include "../includes/menu-lateral.php";
?>


<div class="centro">
        <div class="titulo">
            <p>FORMULÁRIO DO CLIENTE</p>
        </div>
    <div class="formcliente">
        
        <form action="form_cliente.php" method="post">
            <center>

                <input placeholder="NOME" type="text" name="nome" id="nome"  size="67" />
                <br/>
                
                <input placeholder="CPF" type="text" name="cpf" id="cpf"  size="30" />  
        
                <input placeholder="ENDEREÇO" type="text" name="endereco" id="endereco" size="30"  />
                <br/>

                <input placeholder="RG" type="text" name="rg" id="rg"  size="30" />
            
                <input placeholder="ÓRGÃO EXPEDIDOR" type="text" name="rg_orgao" id="rg_orgao" size="30"  />
                <br/>
                
                <input placeholder="DATA NASCIMENTO" type="text" name="datanasc" id="datanasc"  size="30" />
                
                
                <input placeholder="NOME DA MÃE" type="text" name="filiacao_mae" id="filiacao_mae"  size="30" />
                
                <br/>
                <input placeholder="NOME DO PAI" type="text" name="filiacao_pai" id="filiacao_pai"  size="30" />
                

                <input placeholder="NACIONALIDADE" type="text" name="nacionalidade" id="nacionalidade" size="30"  />
                <br/>
                
                <input placeholder="NATURALIDADE" type="text" name="naturalidade" id="naturalidade" size="30"  />
            
                
                <input placeholder="E-MAIL" type="text" name="email" id="email"  size="30" />
                <br/>
                
                <input placeholder="TELEFONE 1" type="text" name="tel01" id="tel01"  size="30" />
                
                
                <input placeholder="TELEFONE 2" type="text" name="tel02" id="tel02"  size="30" />
                <br/>
                
                <input placeholder="CELULAR 1" type="text" name="cel01" id="cel01"  size="30" />
            
                
                <input placeholder="CELULAR 2" type="text" name="cel02" id="cel02" size="30"  />
                
                <br/> <br/>
                <input id="botao" type="submit" name="bot_insert_cliente" value="CADASTRAR">          
            </center>
        </form>   
    </div>      
</div>

</body>
</html>

<?php 
        
        include "../includes/funcoes.php";
        include "../includes/config.php";

        $campos["nome"] = "<center> Nome </br></center>";
        $campos["cpf"] = "<center> CPF </br></center>";
        $campos["rg"] = "<center> RG </br></center>";
        $campos["rg_orgao"] = "<center> Órgão Expedidor </br></center>";
        $campos["datanasc"] = "<center> Data Nascimento </br></center>";
        $campos["nacionalidade"] = "<center> Nacionalidade </br></center>";
        $campos["naturalidade"] = "<center> Naturalidade </br></br></center>";
        $msg_form_erro = "<center>Seguintes campos são obrigatórios : </br></center>";
        $error = false;
        
              
        if( isset($_POST['bot_insert_cliente']) ){
            
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
            }
            unset($_POST['bot_insert_cliente']);

            $data = insert('clientes',$_POST);
            alert($data);
           
 
        }