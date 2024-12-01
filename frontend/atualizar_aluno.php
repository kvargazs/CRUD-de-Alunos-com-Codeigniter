<?php
    include('db.php'); // Inclui a conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 id="main-title">API CRUD ALUNOS</h1>
    <div class="container">
        <div class="box1">
            <h2>Atualizar cadastro do aluno</h2>
        </div>

        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            
                //consulta o aluno pelo id
                $query = "SELECT * FROM informacoes_alunos WHERE id = '$id'";
                $result = mysqli_query($connection, $query);
            
                if (!$result) {
                    die("Erro na consulta: " . mysqli_error($connection));
                }
            
                //traz os dadso
                $row = mysqli_fetch_assoc($result);
            }
            
            if (isset($_POST['atualizar_aluno'])) {
                $nome = mysqli_real_escape_string($connection, trim($_POST['nome']));
                $email = mysqli_real_escape_string($connection, trim($_POST['email']));
                $telefone = mysqli_real_escape_string($connection, trim($_POST['telefone']));
                $endereco = mysqli_real_escape_string($connection, trim($_POST['endereco']));
                $foto_atual = mysqli_real_escape_string($connection, trim($_POST['foto_atual']));
                
                //ve se foi enviado a foto
                $foto_nome = $_FILES['foto']['name'];
                $foto_tmp = $_FILES['foto']['tmp_name'];
                $foto_destino = $foto_atual; //se nao enviar nada fica igual tava

                if (!empty($foto_nome)) {
                    $foto_destino = "uploads/" . basename($foto_nome);
                    if (!move_uploaded_file($foto_tmp, $foto_destino)) {
                        header('Location: index.php?message=Erro ao fazer o upload da nova imagem.');
                        exit();
                    }
                }
            
                //atualiza os dados do aluno no banco
                $query = "UPDATE informacoes_alunos SET
                            nome = '$nome',
                            email = '$email',
                            telefone = '$telefone',
                            endereco = '$endereco',
                            foto = '$foto_destino'
                        WHERE id = '$id'";

                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Erro ao atualizar: " . mysqli_error($connection));
                } else {
                    header('Location: index.php?update_msg=Cadastro atualizado com sucesso!');
                    exit();
                }
            }
        ?>

        <form action="atualizar_aluno.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="foto_atual" value="<?php echo $row['foto']; ?>">

            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Nome</label>
                        <input type="text" id="name" name="nome" class="form-control" value="<?php echo $row['nome']; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone">Telefone</label>
                        <input type="text" id="phone" name="telefone" class="form-control" value="<?php echo $row['telefone']; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="address">Endereço</label>
                        <input type="text" id="address" name="endereco" class="form-control" value="<?php echo $row['endereco']; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Foto (deixe vazio para manter a atual)</label>
                        <input type="file" id="image" name="foto" class="form-control" accept="image/*">
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" name="atualizar_aluno" value="Atualizar">
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
