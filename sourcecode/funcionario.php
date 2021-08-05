<?php 
	include_once "funcoes.php";

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nome = $_POST['inome'];
		$email = $_POST['iemail'];
		$tel = $_POST['itel'];
		$cpf = $_POST['icpf'];

		if(isset($_POST['cstatus'])) {
			$status = 1;	
		}
		else {
			$status =0;
		}

		$link = conectar();

		if($_GET['tela'] == 'cadastrar') {
			if(!existeEmail($email,"funcionario")){
				$senha = codificasenha($_POST['ipassword']);
	
				$sql = "INSERT INTO funcionario (nome,cpf,telefone,email,senha,status) VALUES ('{$nome}',{$cpf},{$tel},'{$email}','{$senha}',{$status})";
				
				mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)==1) {
					echo json_encode([
						'status' => 'success', 
						'mensagem' => 'Funcionário cadastrado!'
					]);
				}
				else {
					echo json_encode([
						'status' => 'error', 
						'mensagem' => 'Não foi possível cadastrar o funcionário!'
					]);
				}
	
			}else{
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Funcionário já cadastrado!'
				]);
			}
		}
		else if($_GET['tela'] == 'editar') {
			$id = base64_decode($_POST['icod']);

			$sql = "UPDATE funcionario SET nome = '$nome',cpf = '$cpf',telefone = '$tel',email = '$email',status = '$status' ";
			$sql .= " WHERE codigo_func = $id";
			
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1) {
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'Funcionário editado!'
				]);
			}
			else {
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Não foi possível editar o funcionário!'
				]);
			}
		}
		else if($_GET['tela'] == 'excluir') {
			$id = base64_decode($_POST['icod']);

			$sql = "DELETE FROM Funcionario ";
			$sql .= " WHERE codigo_func = $id";
			
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1) {
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'Funcionário deletado!'
				]);
			}
			else {
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Não foi possível deletar o funcionário!'
				]);
			}
		}
			
		desconectar($link);
	}
	else {
		if(isset($_GET['id'])) {
			$id = base64_decode($_GET['id']);

			$link = conectar();

			$sql = "SELECT * FROM Funcionario WHERE codigo_func = $id LIMIT 1";
			$resa = mysqli_query($link,$sql);

			$funcionarios = array();

			while ($dados = mysqli_fetch_array($resa)) {
				$funcionario = [
					'nome' => $dados['nome'],
					'email' => $dados['email'],
					'cpf' => $dados['cpf'],
					'tel' => $dados['telefone'],
					'status' => $dados['status']
				];

				array_push($funcionarios, $funcionario);
			}

			echo json_encode([
				'status' => 'success', 
				'mensagem' => 'Funcionários recuperados',
				'data' => $funcionarios
			]);

			desconectar($link);
		}
	}
?>
