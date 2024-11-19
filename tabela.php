<?php
include 'listar.php';
include 'conexaobd_php.php';


$query = "SELECT nivel, COUNT(*) as quantidade FROM usuario GROUP BY nivel";
$resultado = mysqli_query($conexaoBD, $query);


$dadosGrafico = [];
while ($linha = mysqli_fetch_assoc($resultado)) {
    $dadosGrafico[] = [$linha['nivel'], (int)$linha['quantidade']];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tabela PHP com Gráfico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
       
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            
            var data = google.visualization.arrayToDataTable([
                ['Nível', 'Quantidade'],
                <?php
                foreach ($dadosGrafico as $dado) {
                    echo "['" . $dado[0] . "', " . $dado[1] . "],";
                }
                ?>
            ]);

            
            var options = {
                title: 'Distribuição de Usuários por Nível',
                pieHole: 0.4,
                colors: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#6f42c1']
            };

            
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema de Cadastro</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Usuários Cadastrados</h2>
        <div id="piechart" style="width: 100%; height: 400px;" class="mb-5"></div> <!-- Gráfico será exibido aqui -->

        <table class="table table-striped table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Nível</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($usuario = mysqli_fetch_assoc($listarSQL)) { ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['sobrenome']; ?></td>
                    <td><?php echo $usuario['nivel']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $usuario['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="deletar.php?id=<?php echo $usuario['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-primary mt-3">Adicionar Novo</a>
    </div>
</body>
</html>
