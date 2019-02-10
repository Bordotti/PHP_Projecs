<!DOCTYPE html>
<html>
<head>
	<title>Add Client</title>
	<style type="text/css">
		.header {
			font-family: "Times new roman";
			font-size: 18px;
			background-color: black;
			/*padding: 5px 5px 5px 5px; */
			border-left-style: solid;
			border-color: green;
			border-radius: 0px;


		}
		.link {
			padding-left: 8px;
			font-style: white;
			text-decoration: none;
			color:white;

			
		}
		

		table{
			/*border-color: green;*/
			border-style: ridge;
			padding: 5px 5px 5px 5px;
			margin: 10px 10px 10px 10px;
			align-items: center;
			align-content: center;
		}



	</style>


</head>
<body>

<div class="header">
	<p><a class="link" href="http://localhost/client_added.php"><b> Home 	</b></a>
	   <a class="link" href="#"><b> Clientes Cadastrados</b></a>
	</p>
</div>

<?php

require_once('lib/mysql_connector.php');

$query = "select id, nome, idade, salario, endereco, sexo, telefone from cliente"; 

$response = @mysqli_query($con, $query);


if($response){

	echo '<div class="relatorio"> <table align="left" cellspacing="5" cellpaddin="8" >
	<tr>
		<td align="left"><b>ID</b></td>
		<td align="left"><b>Nome</b></td>
		<td align="left"><b>Idade</b></td>
		<td align="left"><b>Salario</b></td>
		<td align="left"><b>Endereço</b></td>
		<td align="left"><b>Sexo</b></td>
		<td align="left"><b>Telefone</b></td>
	</tr>';

	while($row = mysqli_fetch_array($response)){

		echo '<tr><td align="left">' . 
			$row['id'] . '</td><td align="left">' .
			$row['nome'] . '</td><td align="left">' .
			$row['idade'] . '</td><td align="left">' .
			$row['salario'] . '</td><td align="left">' .
			$row['endereco'] . '</td><td align="left">' .
			$row['sexo'] . '</td><td align="left">' .
			$row['telefone'] . '</td><td align="left">';
		echo '</tr>';

		
	}

	echo '</table> </div>';
}else{
	echo "erro";

	echo mysqli_error($con);
}

mysqli_close($con)

?>




</body>
</html>