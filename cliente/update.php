<?php
    session_start();
    include "../includes/funcoes.php";
    include '../includes/template.php';
    include "../includes/conexao.php";
    include "../includes/opera_banco.php";
    include "../includes/menu-lateral.php";

    verifica();
    mainHeaderCliente();
    menuLateral();
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id = :id ";
    $result = $conn->prepare($sql);
    $result->bindParam(':id', $id);
    $result->execute();
    
    if ($result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {

?>


<div id='form_cliente'>
    
    <form  method="post">
        <input type="hidden" name="id" class="input-sm" value="<?= $row['id']; ?>"/>
        <label>CPF:</label><br>
        <input type="text" name="cpf" class="input-sm" value="<?= $row['cpf'] ?>"/>
        <br/>
        <label>Nome:</label><br>
        <input type="text" name="nome" class="input-sm" value="<?= $row['nome'] ?>"/>
        <br/>
        <label>Endereço:</label><br>
        <input type="text" name="endereco" class="input-sm" value="<?= $row['endereco'] ?>" />
        <br/>
        <label>RG:</label><br>
        <input type="text" name="rg" class="input-sm" value="<?= $row['rg'] ?>" />
        <br/>
        <label>Órgão RG:</label><br>
        <input type="text" name="rg_orgao" class="input-sm" value="<?= $row['rg_orgao'] ?>" />
        <br/>
        <label>Data de Nascimento:</label><br>
        <input type="text" name="datanasc" class="input-sm" value="<?= $row['datanasc'] ?>" />
        <br/>
        <label>Nome da Mãe:</label><br>
        <input type="text" name="filiacao_mae" class="input-sm" value="<?= $row['filiacao_mae'] ?>" />
        <br/>
        <label>Nome do Pai:</label><br>
        <input type="text" name="filiacao_pai" class="input-sm" value="<?= $row['filiacao_pai'] ?>" />
        <br/>
        <label>Nacionalidade:</label><br>
        <input type="text" name="nacionalidade" class="input-sm" value="<?= $row['nacionalidade'] ?>" />
        <br/>
        <label>Naturalidade:</label><br>
        <input type="text" name="naturalidade" class="input-sm" value="<?= $row['naturalidade'] ?>"/>
        <br/>
        <label>E-mail:</label><br>
        <input type="text" name="email" class="input-sm" value="<?= $row['email'] ?>" />
        <br/>
        <label>Telefone 1:</label><br>
        <input type="text" name="tel01" class="input-sm" value="<?= $row['tel01'] ?>" />
        <br/>
        <label>Telefone 2:</label><br>
        <input type="text" name="tel02" class="input-sm" value="<?= $row['tel02'] ?>"/>
        <br/>
        <label>Celular 1:</label><br>
        <input type="text" name="cel01" class="input-sm" value="<?= $row['cel01'] ?>"/>
        <br/>
        <label>Celular 2:</label><br>
        <input type="text" name="cel02" class="input-sm" value="<?= $row['cel02'] ?>" />
        <br/>        
        
        <button type="submit" name="bt_update_cliente" value="SEND">
            ALTERAR
        </button>
    </form>   
</div>

<?php 
            }

        }
        
        $campos["nome"] = "Nome</br>";
        $campos["cpf"] = "CPF</br>";
        $campos["rg"] = "RG </br>";
        $campos["rg_orgao"] = "Órgão do RG </br>";
        $campos["datanasc"] = "Data de Nascimento</br>";
        $campos["nacionalidade"] = "Nacionalidade </br>";
        $campos["naturalidade"] = "Naturalidade </br>";
        $msg_form_erro = "Seguintes campos são obrigatórios</br>";
        $error = false;
        
              
        if( isset($_POST['bt_update_cliente']) ){
            unset($_POST['bt_update_cliente']); //unset zera a variável especificada
            foreach($campos as $key => $value){
                if( empty($_POST[$key]) )
                {
                    $msg_form_erro .=  $value;
                    $error = true;
                }
            }
            
            if($error){
                echo $msg_form_erro;
            }else{
                $id = $_POST['id'];
                $data = update($id,'clientes',$_POST);
                alert($data);
                
            }
 
        }
?>