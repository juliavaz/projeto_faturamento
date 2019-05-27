<?php
           
    session_start();
    include "../includes/funcoes.php";
    include "../includes/template.php";
    include_once "../includes/opera_banco.php";

    verifica();
    mainHeaderGrupos();
    menuLateral();
    ?>
<center>
<br/>
<div id="form_cad_categorias">
    <h3>CADASTRO DE GRUPOS</h3>
    <form action="form_insert_grupo.php" method="post">
        <label>NOME:</label>
        <input type="text" name="nome"/>
        <br/>
        <button type="submit" name="bt_grupo" value="SEND">
        CADASTRAR
        </button>
    </form>
</div>

<?php     

       include_once "../includes/conexao.php";
       if( isset($_POST['bt_grupo']) ){
            if( empty($_POST['nome']) ) {
                echo "Campo nome é obrigatorio";
            }else{
                unset($_POST['bt_grupo']);
                print_r($_POST);
                
                $data = insert('grupos',$_POST);
                alert($data);

            }
        }
       