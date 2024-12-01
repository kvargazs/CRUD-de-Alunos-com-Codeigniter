<?php
    define("HOSTNAME", 'localhost');
    define("USERNAME", 'root');
    define("PASSWORD", '');
    define("DATABASE", 'crud_alunos');

    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if (!$connection) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }
?>