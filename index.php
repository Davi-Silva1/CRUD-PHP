<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastro PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema de Cadastro</a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="mb-4">Formulário de Cadastro</h1>
                <form method="post" action="salvar.php">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Sobrenome" name="sobrenome" required>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="nivel" required>
                            <option value="" disabled selected>Selecione o nível</option>
                            <option value="Aluno">Aluno</option>
                            <option value="Professor">Professor</option>
                            <option value="Merendeiro">Merendeiro</option>
                            <option value="Bibliotecário">Bibliotecário</option>
                            <option value="Coordenador">Coordenador</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
