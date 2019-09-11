<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Agenda Telefônica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="index.php">Pagina Inicial</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar.html">Cadastrar novo contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar_contatos.php">Listar Contatos</a>
                    </li>
                </ul>
            </div>  
        </nav>
        <?php
        $nome = isset($_GET["nome"]) ? $_GET["nome"] : " ";
        $email = $_GET["email"];
        $telefone = $_GET["telefone"];

        //Prepara a conexão
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "agenda_telefonica";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);

            echo "<h1>Ocorreu um erro grave no seu cadastro tenha mais atenção e siga exatamente os exemplos.</h1>"
            . "<h2>Para continuar seu cadastro vá até a pagina novo cadastro e faça seu cadastro novamente.</h2>";
        }

        $sql = "INSERT INTO contatos ( nome, email, telefone)" .
                " VALUES ('" . $nome . "', '" . $email . "', '" . $telefone . "')";
        if (mysqli_query($conn, $sql)) {
            echo "Cadastrado com sucesso. Continue no sitema, entrando através do menu.";
            
        } else {

            echo "<h1>Ocorreu um erro grave no seu cadastro tenha mais atenção e siga exatamente os exemplos.</h1> <br>"
            . "<h2>Para continuar seu cadastro vá até a pagina novo cadastro e faça seu cadastro novamente.</h2> <br>";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $conn->close();
        ?>
        <script>
            window.location.href = 'index.php';
        </script>
    </body>
</html>
