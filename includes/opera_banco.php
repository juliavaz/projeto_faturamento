<?php


function delete($table, $id){
    include "../includes/conexao.php";

    $sql = "DELETE FROM " . $table . " WHERE id = :id";
    try{

        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();

        return "Registro excluído com sucesso !!!";

    }catch(PDOException $e){
        return "Error: " . $sql . "<br>" . $e->getMessage();
    }
    
}

function update($id, $table, $params){
    include "../includes/conexao.php";

        // Gera os parametros de filtragem para o PDO
        // Ex: :email, :senha etc
        $pdo_params = '';
        unset($params['id']);
        foreach($params as $key => $value){
            $pdo_params .= $key . " = :" . $key . ",";
        }
        
        //Remove último caractere (,)
        $pdo_params = substr($pdo_params,0,-1);
        
        $query = "UPDATE " . $table . " SET $pdo_params WHERE id = :id";
        
        try{
            //Função do PDO que prepara a query para a filtragem
            $sql = $conn->prepare($query);
            $sql->bindParam(":id",$id);

            //Para cada parametro passado no POST, é feita a filtragem com o binParam
            //do PDO, sendo assim o código mais seguro contra injeção de SQL
            foreach($params as $key => &$value){
                $sql->bindParam(':' . $key,$value);
            }

            // IF da execução da SQL
            $sql->execute();
            return "Dado atualizado com sucesso!";
            
        }catch(PDOException $e){
            return "Error: " . $sql . "<br>" . $e->getMessage();
        }
        
}

function insert($table,$params){
    //Chama a conexão
    include "../includes/conexao.php";
    try{
        $pdo_params = '';
        // Pega as chaves do array passado ($_POST sempre)
        $keys  = implode(",",array_keys($params));


        // Gera os parametros de filtragem para o PDO
        // Ex: :email, :senha etc
        foreach($params as $key => $value){
            $pdo_params .= ":" . $key . ",";
        }
        //Remove último caractere (,)
        $pdo_params = substr($pdo_params,0,-1);
        
        // Monta a Query baseada nos parametros da função
        $query = "INSERT INTO " . $table . " (".$keys.") VALUES (" . $pdo_params . ")";

        //Função do PDO que prepara a query para a filtragem
        $sql = $conn->prepare($query);

        //Para cada parametro passado no POST, é feita a filtragem com o binParam
        //do PDO, sendo assim o código mais seguro contra injeção de SQL
        foreach($params as $key => &$value){
            $sql->bindParam(':' . $key,$value);
        }
        
    
        // IF da execução da SQL
        if($sql->execute()){
            return "Dado inserido com sucesso!";
        }else{
            return "Houve um problema ao inserir este dado!";
        }
    }catch(PDOException $e){
        return "Problema no Banco: " .  $e->getMessage();
    }
}

function readAll($table, array $params = null){
    //Chama a conexão
    include "../includes/conexao.php";
    $sql = "";
    try{
        if(isset($params)){
            $sql = "SELECT * FROM " . $table . " WHERE ".$params['key']." LIKE :value";
            $value = "%" . $params['value'] . "%";
            $result = $conn->prepare($sql);
            // $result->bindParam(':key', );
            $result->bindParam(':value', $value);
        }else{
            $sql = "SELECT * FROM " . $table;
            $result = $conn->prepare($sql);
        }
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);

    }catch(PDOException $e){
        echo $e->getMessage();
    }

}

function readById($table, $column, $value){
    include "../includes/conexao.php";
    try{
        $sql = "SELECT * FROM " . $table . " WHERE " . $column . " = :value";
        $result = $conn->prepare($sql);
        $result->bindParam(':value', $value);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}