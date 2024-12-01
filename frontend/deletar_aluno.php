<?php
    include('db.php');

    //verificacao do id
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM informacoes_alunos WHERE id = '$id'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Erro na consulta: " . mysqli_error($connection));
        } else {
            header('Location: index.php?delete_msg=Aluno deletado com sucesso!');
        }
    }
?>
