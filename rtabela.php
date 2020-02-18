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
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $namedb = $_SESSION["tbanco"];
    $nametb = $_SESSION["table"];
    //Conexão com o banco
    $conn = new mysqli($servername, $username, $password, $namedb);

    if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
    }

    $dados = "";
	$col = $_SESSION["col"];
    for ($tb=0; $tb < $col; $tb++) { 
        $nome = $_POST["nome$tb"];
        $tipo = $_POST["tip$tb"];
        $tamanho = $_POST["tamanho$tb"];
        $nulo = $_POST["nullo$tb"];
        $chave = $_POST["chave$tb"];

        if ($tb == $col-1) {
            $dados .= "$nome $tipo ($tamanho) $nulo $chave"; 
        }elseif ($col > 0) {
             $dados .= "$nome $tipo ($tamanho) $nulo $chave, ";
        }
    }

    $ctb = "CREATE TABLE $nametb ( $dados )";
	
	if ($conn->query($ctb) === TRUE) {
        echo "<div class='container'>";
		echo "<div class='success alert alert-success'>Table created successfully<br><br>".$ctb."<br>";
        echo "<br><br><a class='btn btn-info' href='index.php'>Voltar</a></div></div>";	
	}else {
		echo "error ".$conn->error;
		}
	$conn->close();
?>