<?php
	include_once 'funcoes.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nome = $_POST['inome'];
		$email = $_POST['iemail'];
		$cpf = $_POST['icpf'];
		$fone_res = $_POST['ifoneres'];
		$fone_cel = $_POST['ifonecel'];
		
		if(isset($_POST['cstatus'])) {
			$status = 1;	
		}
		else {
			$status =0;
		}

		$link = conectar();

		if($_GET['tela'] == 'cadastrar') {
			if (!existeEmail($email,"cliente")) {
				$sql = "INSERT INTO cliente(nome,cpf,email,tel_residencial,tel_celular,status) VALUES('{$nome}',{$cpf},'{$email}',{$fone_res},{$fone_cel},{$status})";
				
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)==1) {
					echo json_encode([
						'status' => 'success', 
						'mensagem' => 'Cliente cadastrado!'
					]);
				}
				else {
					echo json_encode([
						'status' => 'error', 
						'mensagem' => 'Erro ao cadatrar cliente!'
					]);
				}

			}
			else {
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Cliente já existe!'
				]);
			}
		}
		else if($_GET['tela'] == 'editar') {
			$id = base64_decode($_POST['icod']);

			$sql = "UPDATE cliente SET nome= '$nome',cpf= '$cpf',email = '$email',tel_residencial ='$fone_res',tel_celular = '$fone_cel',status = $status ";
			$sql .= " WHERE codigo_cli = $id";

			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1) {
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'Cliente alterado!'
				]);
			}
			else {
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Erro ao tentar alterar!'
				]);
			}	
		}
		else if($_GET['tela'] == 'excluir') {
			$id = base64_decode($_POST['icod']);

			$sql = "DELETE FROM cliente WHERE codigo_cli = $id";

			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1) {
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'Cliente excluído!'
				]);
			}
			else {
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Erro ao excluir cliente!'
				]);
			}
		}
			
		desconectar($link);
	}
	else {
		if(isset($_GET['id'])) {
			$id = base64_decode($_GET['id']);

			$link = conectar();
			
			$sql = "SELECT * FROM Cliente WHERE codigo_cli = {$id} LIMIT 1";
			$res = mysqli_query($link,$sql);

			$clientes = array();

			while ($dados = mysqli_fetch_array($res)) {
				$cliente = [
					'nome' => $dados['nome'],
					'email' => $dados['email'],
					'cpf' => $dados['cpf'],
					'tel' => $dados['tel_residencial'],
					'cel' => $dados['tel_celular'],
					'status' => $dados['status']
				];

				array_push($clientes, $cliente);
			}

			echo json_encode([
				'status' => 'success', 
				'mensagem' => 'Clientes recuperados',
				'data' => $clientes
			]);

			desconectar($link);
		}
	}
 ?>