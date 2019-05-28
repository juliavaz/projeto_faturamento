<?php 
	session_start();
	require("../includes/template.php");
	if (isset($_POST['email']) && !empty($_POST['email'])) {
		$email=addslashes($_POST['email']);
		$senha=addslashes($_POST['senha']);
		
		require('../includes/conexao.php');
		try{
			

			$sql = $conn->prepare("SELECT * FROM users WHERE email = :email AND senha = :password");
			$sql->bindParam(":email",$email);
			$sql->bindParam(":password",$senha);
			$sql->execute();
			if($sql->rowCount() > 0){
				$dado = $sql->fetch();
				$_SESSION['id'] = $dado['id'];
				$_SESSION['tipo']=$dado['tipo'];
				header("Location: ../home/home.php");
			}else{
				?>
            <script>
                alert("E-mail ou senha incorreta.");
            </script>
        <?php

			}
		}catch(PDOException $e){
			echo "Falhou:".$e->getMessage();
		}
	}
	mainHeaderCliente();
 ?>

		<div class="body">
			<div class="centro">
			<div class="centrointerior">
				<div class="logo">
					<img src="../assets/img/profits.png">
				</div>
				<div class="divform">
					<form method="POST">
						<strong>E-mail</strong> <br>
						<input id="input" type="email" name="email" placeholder="E-mail" required autofocus autocomplete="off"><br><br>
						<strong>Senha</strong> <br>
						<input id="input" type="password" name="senha" placeholder="Senha"><br><br>
						<center>
							<br/>
							<button id="botao" type="submit" value="SEND" id="botao"> Entrar </button>
						</center>
					</form>
				</div>
				<div class="links">
					<a href="..\home\home.php"><h2>Home</h2></a><br/>
					<a href="form_cliente.php"><strong>CADASTRE-SE AQUI</strong></a>
				</div>
			</div>
		</div>			
		</div>





