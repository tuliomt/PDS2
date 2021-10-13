<?php 
	include_once 'funcoes.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nome = $_POST['inomea'];
		$raca = $_POST['txtraca'];
		$idade = $_POST['idade']; 
		$categoria = $_POST['txtcategoria'];
		$codigo_cli = $_POST['inomep'];

		if(isset($_POST['cstatus'])) {
			$status = 1;	
		}
		else {
			$status = 0;
		}

		$link = conectar();

		if($_GET['tela'] == 'cadastrar') {
			$sql = "INSERT INTO animal(nome,raca,idade,categoria,status,codigo_cli) VALUES ('{$nome}','{$raca}','{$idade}','{$categoria}', {$status},{$codigo_cli})";

			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1) {
				//Cadastrado com sucesso
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'Animal cadastrado!'
				]);
			}
			else {
				//Erro ao cadastrar
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Ocorreu algum erro ao cadastrar!'
				]);
			}
		}
		else if($_GET['tela'] == 'editar') {
			$id =  base64_decode($_GET['id']);

			$sql = "UPDATE animal SET nome = '{$nome}', raca = '{$raca}', idade = '{$idade}', categoria = '{$categoria}',  status = {$status}, codigo_cli = {$codigo_cli}";
			$sql .= " WHERE codigo_ani = $id";

			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1) {
				//Editado com sucesso
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'Animal editado!'
				]);
			}
			else {
				//Erro ao deditar
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Ocorreu algum erro ao editar!'
				]);
			}
		}
		else if($_GET['tela'] == 'excluir') {
			$id =  base64_decode($_GET['id']);
			
			$sql = "DELETE FROM animal WHERE codigo_ani = $id";
	
			mysqli_query($link, $sql);
			if(mysqli_affected_rows($link)==1) {
				//Deletado com sucesso
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'Animal deletado!'
				]);
	
			}
			else {
				//Erro ao deletar
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Ocorreu algum erro ao deletar!'
				]);
			}
		}
			
		desconectar($link);
	}
	else {

		$link = conectar();
		$sql = "select nome, codigo_cli from cliente";
		$resClientes = mysqli_query($link, $sql);
		$clientes = array();
		while($cliente = mysqli_fetch_array($resClientes)) {
			$cliente = [
				'nome' => $cliente['nome'],
				'codigo_cli' => $cliente['codigo_cli'],
			];
			array_push($clientes, $cliente);
		}

		if(isset($_GET['id'])) {
			$id = base64_decode($_GET['id']);

			$link = conectar();

			$sql = "SELECT * FROM animal WHERE codigo_ani = {$id} LIMIT 1";
			$res = mysqli_query($link,$sql);

			$animais = array();

			while ($dados = mysqli_fetch_array($res)) {
				$animal = [
					'nome' => $dados['nome'],
					'raca' => $dados['raca'],
					'idade' => $dados['idade'],
					'categoria' => $dados['categoria'],
					'status' => $dados['status'],
					'codigo_cli' => $dados['codigo_cli']
				];

				array_push($animais, $animal);
			}

			echo json_encode([
				'status' => 'success', 
				'mensagem' => 'Animais recuperados',
				'data' => $animais,
				'clientes' => $clientes
			]);

			desconectar($link);
		}		else {
			echo json_encode([
				'status' => 'success',
				'clientes' => $clientes
			]);
		}
	}

 ?>