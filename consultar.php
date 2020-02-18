<!DOCTYPE html>
<html>
<head>
    <title>Banco de dados</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   	<link rel="icon" type="image/png" href="dbicon.png">
  	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	<div class="container">
        <div class="jumbotron">
            <img src="mysql.png">
            <h2>Gerenciador de</h2>
            <h1>Banco de dados</h1>
        </div>
    </div>
    <div class="container">
    <form class="banco" action="rconsulta.php" method="POST">
    	<div class="alert alert-info">
		<b>Banco:</b>
		<input type='text' name='consbanco'><br><br>
		<b>Tabela:</b>
		<input type='text' name='consname'><br><br>

		<input class="btn btn-info" type='submit' name='consul' value='Consultar'>
		</div>
    </form>
    </div>
</body>
</html>