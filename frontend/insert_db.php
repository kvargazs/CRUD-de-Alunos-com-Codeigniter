<?php
    include('db.php');

    if (isset($_POST['add_aluno'])) {
        $nome = trim(mysqli_real_escape_string($connection, $_POST['nome']));
        $email = trim(mysqli_real_escape_string($connection, $_POST['email']));
        $telefone = trim(mysqli_real_escape_string($connection, $_POST['telefone']));
        $endereco = trim(mysqli_real_escape_string($connection, $_POST['endereco']));

        //foto
        $foto_nome = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_destino = "";

        if (!empty($foto_nome)) {
            $foto_destino = "uploads/" . basename($foto_nome);
            //verifica e envia a foto
            if (!move_uploaded_file($foto_tmp, $foto_destino)) {
                header('Location: index.php?message=Erro ao fazer o upload da imagem.');
                exit();
            }
        }

        //verifica se os campos estão preenchidos
        if (empty($nome) || empty($email) || empty($telefone) || empty($endereco)) {
            header('Location: index.php?message=Por favor, preencha todos os campos obrigatórios.');
            exit();
        }

        //envia os dados pro banco
        $query = "INSERT INTO `informacoes_alunos` (`nome`, `email`, `telefone`, `endereco`, `foto`) 
                VALUES ('$nome', '$email', '$telefone', '$endereco', '$foto_destino')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Falha na query: " . mysqli_error($connection));
        } else {
            header('Location: index.php?insert_msg=Aluno adicionado com sucesso!');
            exit();
        }
    }
?>
