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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $namedb = $_POST["consbanco"];
    
    //Conexão com o banco
    $conn = new mysqli($servername, $username, $password, $namedb);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if (isset($_POST["consul"])) {
        $tabname = $_POST["consname"];
        
        $sql = "SELECT * FROM $tabname";

        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            echo "<div class='container'>";
            echo "<div class='success alert alert-success'>";
            echo "Numero de colunas: ";
            echo mysqli_num_fields($result) . "<br>";

            while ($row = $result->fetch_row()) {
                // echo "<br>".$row[0]."&nbsp;&nbsp;".$row[1]."&nbsp;&nbsp;".$row[2]."<br>";
                
                echo "<table border='1' cellpadding='10px'>";
                    echo "<tr>";
                        echo "<td>".$row[0]."</td>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                    echo "</tr>";
                echo "</table>";
                // for ($i=0; $i > $row; $i++) {

                // }
            }
            echo "<br><br><a class='btn btn-info' href='index.php'>Voltar</a></div>";  
        }else {
            echo "0 results";
        }
    }
    $conn->close();
?>