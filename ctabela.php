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
<form action="rtabela.php" method="POST">
	<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password);
        
        //criação da tb
		if (isset($_POST["ctable"])) {
			$namedb = $_POST["tbanco"];
			$nametb = $_POST["tname"];
			echo "<div class='container-fluid' id='ntb'><b>Tabela: </b>".$nametb."</div>";
			$inbanco = "USE $namedb";
			
			if ($conn->query($inbanco) === TRUE) {
				echo "<table>
						<tr> 
							<th> <input type='text' disabled value='Nome'></th>
							<th> <input type='text' disabled value='Tipo' style='width: 90px'></th>
							<th> <input type='text' disabled value='Tamanho'></th>
							<th> <input type='text' disabled value='Nulo?' style='width: 90px'></th>
							<th> <input type='text' disabled value='Chave' style='width: 99px'></th>
						</tr>
					</table>";
					$col = $_POST["tcol"];
				for ($tb=0; $tb < $col; $tb++) { 
					echo "<table>";
					echo "<tr>" ;
					echo "<td> <input type='text' name='nome$tb'> </td>";

					echo "<td> <select name='tip$tb'>";
						echo "<option value='INT'>INT</option>";
						echo "<option value='DECIMAL'>DECIMAL</option>";
						echo "<option value='CHAR'>CHAR</option>";
						echo "<option value='VARCHAR'>VARCHAR</option>";
						echo "<option value='DATE'>DATE</option>";
						echo "</select>";
					echo "</td>";

					echo "<td> <input type='text' name='tamanho$tb'> </td>";

					echo "<td> <select name='nullo$tb'>";
						echo "<option value='NULL'>NULL</option>";
						echo "<option value='NOT NULL'>NOT NULL</option>";							 
					echo "</select>";
					echo "</td>";
					echo "<td> <select name='chave$tb'>";
						echo "<option value=' '> </option>";
						echo "<option value='Primary Key'>Primary Key</option>";
						echo "<option value='Unique'>Unique</option>";						 
					echo "</select>";
					echo "</td>";
					echo "</tr>";
					echo "</table>";
				}
			}
        }
	$_SESSION["tbanco"] = $_POST["tbanco"];
	$_SESSION["table"] = $_POST["tname"];
	$_SESSION["col"] = $_POST["tcol"];

	?> <br>
    <input class="btn btn-info" type="submit" name="create" value="Criar Tabela" id="inp">
</form>