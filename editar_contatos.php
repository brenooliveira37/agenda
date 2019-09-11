<!DOCTYPE html>
<html>
    <head>
        <title>Agenda Telefônica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
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
        <div>
            <h1>
                Faça o cadastro de seu contato abaixo!
            </h1>
        </div>
        <form action="atualizar_contatos.php" method="get" autocomplete="on">
            <?php
            $id = isset($_GET["codigo"]) ? $_GET["codigo"] : " ";

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

            $sql = "SELECT id, nome, email, telefone FROM contatos WHERE id=" . $id;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($dado = $result->fetch_assoc()) {
                    ?>
                    <div class="input-group mb-3" style="display:none">
                        <input type="text" class="form-control"  maxlength="100" 
                               value="<?php echo $dado['id']; ?>" name="breno" >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Digite seu nome aqui" maxlength="100"
                               required autofocus name="nome" value="<?php echo $dado['nome']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">E-mail</span>
                        </div>
                        <input type="email" class="form-control" placeholder="email@email.email" maxlength="100"
                               required autocomplete="off" name="email" value="<?php echo $dado['email']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Telefone</span>
                        </div>
                        <input type="tel" class="form-control" placeholder="(99) 99999-9999" 
                               required pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" name="telefone"
                               value="<?php echo $dado['telefone']; ?>">
                    </div>
                    <?php
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
            <div align="center">
                <input type="submit" class="btn btn-success col-sm-3" value="Salvar">
            </div>
        </form>
        <?php
// put your code here
        ?>
    </body>
</html>
