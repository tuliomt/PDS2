<?php 
	include_once 'funcoes.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nome = $_POST['inomep'];
		$desc = $_POST['txtdesc'];
		$preco = $_POST['ipreco'];

		if(isset($_POST['cstatus'])) {
			$status = 1;	
		}
		else {
			$status = 0;
		}

		$link = conectar();

		if($_GET['tela'] == 'cadastrar') {
			$sql = "INSERT INTO produto(nome,descr,preco,status) VALUES ('{$nome}','{$desc}','{$preco}',{$status})";

			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1) {
				//Cadastrado com sucesso
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'Produto cadastrado!'
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

			$sql = "UPDATE produto SET nome = '$nome', descr = '$desc', preco = '$preco', status = $status";
			$sql .= " WHERE codigo_prod = $id";

			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1) {
				//Editado com sucesso
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'O produto foi editado!'
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
			
			$sql = "DELETE FROM produto WHERE codigo_prod = $id";
	
			mysqli_query($link, $sql);
			if(mysqli_affected_rows($link)==1) {
				//Deletado com sucesso
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'O produto foi deletado!'
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
		if(isset($_GET['id'])) {
			$id = base64_decode($_GET['id']);

			$link = conectar();

			$sql = "SELECT * FROM Produto WHERE codigo_prod = {$id} LIMIT 1";
			$res = mysqli_query($link,$sql);

			$produtos = array();

			while ($dados = mysqli_fetch_array($res)) {
				$produto = [
					'nome' => $dados['nome'],
					'desc' => $dados['descr'],
					'preco' => $dados['preco'],
					'status' => $dados['status']
				];

				array_push($produtos, $produto);
			}

			echo json_encode([
				'status' => 'success', 
				'mensagem' => 'Produtos recuperados',
				'data' => $produtos
			]);

			desconectar($link);
		}
	}
 ?>