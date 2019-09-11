<!DOCTYPE html>

<html>
    <head>
        <title>Agenda Telefônica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
            echo "<br><h1>Ocorreu um erro grave ao tentar carregar os dados tente novamente mais tarde.</h1><br>";
        }

        $sql = "SELECT id, nome, email, telefone FROM contatos";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            ?>
            <table class="table table-dark table-hover">
                <tr style="font-size: 25px;">
                    <td>Código</td>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Telefone</td>
                    <td>Ação</td>
                </tr>
                <?php while ($dado = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dado['id']; ?></td>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['email']; ?></td>
                        <td><?php echo $dado['telefone']; ?></td>
                        <td>
                            <a href="editar_contatos.php?codigo=<?php echo $dado['id']; ?>">Editar</a>
                            <a href="deletar_contatos.php?codigo=<?php echo $dado['id']; ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </body>
</html>
