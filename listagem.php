<?php
include 'conexao.php';

$busca = isset($_POST['busca_nome']) ? trim($_POST['busca_nome']) : "";

if ($busca != "") {
    $stmt = $conecta_db->prepare("SELECT * FROM tb_funcionarios WHERE nome_funcionario LIKE ? ORDER BY nome_funcionario ASC");
    $busca_param = "%$busca%";
    $stmt->bind_param("s", $busca_param);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $stmt = $conecta_db->prepare("SELECT * FROM tb_funcionarios ORDER BY nome_funcionario ASC");
    $stmt->execute();
    $result = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Listagem de Funcionários</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form name="form1" method="POST" action="listagem.php">
        <label>Digite o Nome do Funcionário:</label>
        <input type="text" name="busca_nome" value="<?= htmlspecialchars($busca) ?>">
        <input type="submit" value="Filtrar">
        <a href="index.php"><input type="button" value="Voltar"></a>
    </form>

    <?php if ($result->num_rows > 0): ?>
        <table border="1" align="center">
            <thead>
                <tr>
                    <th colspan="8" bgcolor="MediumAquamarine">Demonstrativo de Rendimentos Mensais</th>
                </tr>
                <tr>
                    <th bgcolor="LightGreen">Nº Registro</th>
                    <th bgcolor="LightGreen">Nome do Funcionário</th>
                    <th bgcolor="LightGreen">Data de Admissão</th>
                    <th bgcolor="LightGreen">Cargo</th>
                    <th bgcolor="LightGreen">Salário Bruto</th>
                    <th bgcolor="LightGreen">INSS</th>
                    <th bgcolor="LightGreen">Salário Líquido</th>
                    <th bgcolor="LightGreen">Apagar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($eq = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($eq['n_registro']) ?></td>
                        <td><?= htmlspecialchars($eq['nome_funcionario']) ?></td>
                        <td><?= htmlspecialchars($eq['data_admissao']) ?></td>
                        <td><?= htmlspecialchars($eq['cargo']) ?></td>
                        <td><?= htmlspecialchars($eq['salario_bruto']) ?></td>
                        <td><?= htmlspecialchars($eq['inss']) ?></td>
                        <td><?= htmlspecialchars($eq['salario_liquido']) ?></td>
                        <td><a href="excluir_funcionario.php?id=<?= $eq['n_registro'] ?>" onclick="return confirm('Tem certeza que deseja excluir este funcionário?')">
                         <img src="img/del.png" alt="Apagar" title="Apagar Funcionário">
                        </a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum funcionário encontrado.</p>
    <?php endif; ?>

</body>
</html>
