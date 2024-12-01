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
            <h2>Lista de alunos cadastrados</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar novo aluno</button>
        </div>

        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>ENDEREÇO</th>
                    <th>FOTO</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM informacoes_alunos";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Erro na consulta: " . mysqli_error($connection));
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['telefone'] . "</td>";
                        echo "<td>" . $row['endereco'] . "</td>";
                        echo "<td><img src='" . $row['foto'] . "' width='50'></td>";
                        echo "<td><a href='atualizar_aluno.php?id=" . $row['id'] . "' class='btn btn-success'>Atualizar</a></td>";
                        echo "<td><a href='deletar_aluno.php?id=" . $row['id'] . "' class='btn btn-danger'>Deletar</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <?php
        if (isset($_GET['message'])) {
            echo "<h6 style='color: red;'>".$_GET['message']."</h6>";
        }

        if (isset($_GET['insert_msg'])) {
            echo "<h6 style='color: green;'>".$_GET['insert_msg']."</h6>";
        }

        if (isset($_GET['update_msg'])) {
            echo "<h6 style='color: green;'>".$_GET['update_msg']."</h6>";
        }

        if (isset($_GET['delete_msg'])) {
            echo "<h6 style='color: red;'>".$_GET['delete_msg']."</h6>";
        }
        ?>

        <form action="insert_db.php" method="post">
        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo aluno</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" id="name" name="nome" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" id="phone" name="telefone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address">Endereço</label>
                                <input type="text" id="address" name="endereco" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Foto</label>
                                <input type="file" id="image" name="foto" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-success" name="add_aluno" value="Adicionar">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
