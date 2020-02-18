 	<title>Banco de dados</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   	<link rel="icon" type="image/png" href="dbicon.png">
  	<link rel="stylesheet" type="text/css" href="Style.css">
  	<div class="container">
		<div class="jumbotron">
       		<img src="mysql.png">
      		<h2>Gerenciador de</h2>
       		<h1>Banco de dados</h1>
    	</div>
    </div>
<?php
   //Entrando no banco
	$servername = "localhost";
	$username = "root";
	$password = "";

	//conexão com o banco
	$conn = new mysqli($servername, $username, $password);

	//Verificação
	if ($conn->connect_error) {
		die("Connection Failed: ".$conn->connect_error);
	}
	//pegando informações submit para criação do banco
		if (isset($_POST["cBanco"])) {
			$nBanco = $_POST["nomedb"];
		//Criando o Banco de Dados
		$sql = "CREATE DATABASE $nBanco";
	
		if ($conn->query($sql) === TRUE) {
			echo "<div class='container'>";
			echo "<div class='success alert alert-success'>Database create successfully<br><br>".$sql."&nbsp;&nbsp;&nbsp;";
			echo "<span class='glyphicon glyphicon-ok'></span>";
			echo "<br><br><a class='btn btn-info' href='index.php'>Voltar</a></div>";
		}else {
			echo "Error creating database: ".$conn->error;
		}
		echo "</div>";
		$conn->close();
	}
?>