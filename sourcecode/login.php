<?php
	include_once "funcoes.php";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$email = $_POST['iemail'];
		$senha = codificasenha($_POST['isenha']);

		$link = conectar();

		$sql = "SELECT * FROM funcionario WHERE email = '{$email}' AND senha = '{$senha}' AND status = 1 LIMIT 1";
		$res = mysqli_query($link,$sql);
		
		if(mysqli_affected_rows($link)==1){
			//Login permitido
			while ($dados = mysqli_fetch_array($res)){	
				$_SESSION['idFunc'] = $dados['codigo_func'];
				$_SESSION['nomeF'] = $dados['nome'];
				$_SESSION['emailF'] = $dados['email'];
			}

			echo json_encode([
				'status' => 'success', 
				'mensagem' => 'Usuário logado!'
			]);
		}else{
			echo json_encode([
				'status' => 'error', 
				'mensagem' => 'Email e/ou senha inválidos!'
			]);
		}
	}
?>