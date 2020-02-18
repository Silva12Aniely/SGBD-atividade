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
	session_start();
?>
<form action="rpreencher.php" method="POST">
	<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password);
        
        //criação da tb 
		if (isset($_POST["ptable"])) {
			$namedb = $_POST["pbanco"];
			$nametb = $_POST["pname"];

			$inbanco = "USE $namedb";
			if ($conn->query($inbanco) === TRUE) {
					$col = $_POST["pcol"];
				for ($tb=0; $tb < $col; $tb++) {
					echo "<div class='container'>";
					echo "<div class='success alert alert-success'>";
					echo "Valor<br>";
					echo "<input type='text' name='valor$tb'><br>";
					echo "</div></div>";
				}
			}
        }
 
	$_SESSION["tbanco"] = $_POST["pbanco"];
	$_SESSION["table"] = $_POST["pname"];
	$_SESSION["col"] = $_POST["pcol"];
	?>
	<br>
    <input class="btn btn-info" type="submit" name="create" value="Preencher" id="inp">
</form>