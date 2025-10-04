<?php

$pdo = include 'conexao.php';
/*
if(isset($_POST['busca_nome']) != ''){
    $sql = $conecta_db->prepare("select * from tb_funcionarios where nome like ? order by nome asc");
   // $sql->execute()
   // $sql = mysqli_query("select * from tb_login where Usuario like '{$_POST['busca_nome']}%' order by Usuari asc");
    $sql = mysqli_query("select * from tb_funcionarios where nome like '1_POST['busca_nome']%' order by nome asc");
}else{
    $sql = mysqli_query("select * from tb_funcionarios order by id asc");
}
*/

$busca = isset($_GET['busca']) ? trim($_GET[busca]) : "";
if($busca != ""){
    $sql = "SELECT * from tb_funcionarios where nome like :busca order by nome asc";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(" :busca", "%$busca%");
    $stmt->execute();
} else {
    $sql = "select * from tb_funcionarios order by nome asc";
}
?>

<html>

<head>
    <title>Listagem de Funcionários</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="form1" method="POST" action="listagem.php">
    <label>Digite o Nome do Funcionário:</label>
    <input type = "text" name="busca_nome">
    <input type = "submit" value = "Filtrar">
    <input type = "submit" value = "Voltar">
</FORM>

<table border="1" align="center">
    <tr> <!--tr é table row. th é table header, um adiciona linha o outro deixa centralizado e em negrito -->
        <th colspan="8" bgcolor="MediumAquamarine">
            Demonstrativo de Rendimentos Mensais</th>
    </tr>
    <tr>
        <th bgcolor="LightGreen">Nº Registro</th>
        <th bgcolor="LightGreen">Nome do Funcionário</th>
        <th bgcolor="LightGreen">Data de Admissão</th>
        <th bgcolor="LightGreen">Cargo</th>
        <th bgcolor="LightGreen">Salário Bruto</th>
        <th bgcolor="LightGreen">INSS</th>
        <th bgcolor="LightGreen">Salário Líquido</th>
        <th colspan = "1" bgcolor = "LightGreen">Apagar</th>
    </tr>
    <?php 
       // foreach ($funcionarios as $linha) {
            ?>
            <tr>
            <td><?php echo $linha ['n_registro']; ?></td>
            <td><?php echo $linha ['nome_funcionario']; ?></td>
            <td><?php echo $linha ['data_admissao']; ?></td>
            <td><?php echo $linha ['cargo']; ?></td>
            <td><?php echo $linha ['qtde_salarios']; ?></td>
            <td><?php echo $linha ['salario_bruto']; ?></td>
            <td><?php echo $linha ['inss']; ?></td>
            <td><?php echo $linha ['salario_liquido']; ?></td>
            <td><img src = 'img/del.png'></td>
        </tr>

            <?php //endforeach; ?>
            <?php
            echo "<br>";
            echo "<center>";
            echo "<br>";
            echo "<a href = \"home_funcionarios.php\">Retornar à Página Inicial</a>";
            echo "<br>";
            
            ?>
            
            
        
        
</table>
</body>    

</html>
