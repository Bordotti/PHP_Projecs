<!DOCTYPE html>
<html>
<head>
	<title>Add Client</title>
	<style type="text/css">
		.header {
			font-family: "Times new roman";
			font-size: 18px;
			padding: 15px 15px 15px 15px;
			border: 1px;
			border-color: green;
			border-radius: 10px;
		};
		a {
			padding-left: 8px;
			margin: 10px 10px 10px 10px;
		};


	</style>


</head>
<body>


<div class="header">
	<p><a href="#"><b> Home 	</b></a>
	   <a href="http://localhost/clientes.php"><b> Clientes Cadastrados</b></a>
	</p>
</div>

<?php

if(isset($_POST['submit'])){
	
	$data_missing = array();

	if(empty($_POST['nome'])){
	$data_missing[] = 'nome';
	} else {
		$nome = trim($_POST['nome']);
	}
	
	if(empty($_POST['idade'])){
	$data_missing[] = 'idade';
	} else {
		$idade = trim($_POST['idade']);
	}

	if(empty($_POST['salario'])){
	$data_missing[] = 'salario';
	} else {
		$salario = trim($_POST['salario']);
	}

	if(empty($_POST['endereco'])){
	$data_missing[] = 'endereco';
	} else {
		$endereco = trim($_POST['endereco']);
	}

	if(empty($_POST['sexo'])){
	$data_missing[] = 'sexo';
	} else {
		$sexo = trim($_POST['sexo']);
	}

	if(empty($_POST['telefone'])){
	$data_missing[] = 'telefone';
	} else {
		$telefone = trim($_POST['telefone']);
	}

	if(empty($data_missing)){

		require('lib/mysql_connector.php');

		$query = "Insert Into cliente(nome, salario, telefone, sexo, idade, endereco) values(? , ?, ?, ?, ?, ?)";

		$stmt = mysqli_prepare($con, $query);

		mysqli_stmt_bind_param($stmt, "sdisis", $nome, $salario, $telefone, $sexo, $idade, $endereco);

		mysqli_stmt_execute($stmt);

		$affected_rows = mysqli_stmt_affected_rows($stmt);

		if($affected_rows == 1){
			echo 'success!!<br />';
			
			mysqli_stmt_close($stmt);
			mysqli_close($con);
			
		} else {
			echo 'Error <br />' ;
			echo mysqli_error();
		}



	} else {
		echo 'Fill the blank fields';

		foreach($data_missing as $missing){
			echo "$missing <br />";
		}
	}


}

?>


<form action="http://localhost/client_added.php" method="post">
	
	<b> Add new Client </b>

	<p> Nome
	<input type="text" name="nome" size="50"  value = ""/></p>

	<p> Idade
	<input type="text" name="idade" size="2"  value = ""/></p>

	<p> Salario
	<input type="text" name="salario" size="11"  value = ""/></p>

	<p> Endereco
	<input type="text" name="endereco" size="120"  value = ""/></p>

	<p> Sexo
	<input type="text" name="sexo" size="1"  value = ""/></p>

	<p> Telefone
	<input type="text" name="telefone" size="11"  value = ""/></p>

	<input type="submit" name="submit", value="Send">
</form>





</body>
</html>