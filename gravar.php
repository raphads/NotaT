<?php
 include 'conexao.php';
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
$reg = $_POST["txt_reg"];
$nome = $_POST["txt_nome"];
$data = $_POST["txt_data"];
$cargo = $_POST["txt_cargo"];
$qtde = $_POST["txt_qtde"];

$sql = $conecta_db->prepare("SELECT * FROM tb_funcionarios WHERE n_registro = ?");
$sql->bind_param("s", $reg); // "s" indica que estamos passando um string (CPF)
$sql->execute();
$result = $sql->get_result(); // Executa a consulta e obtém o resultado

$sal_bruto = $qtde * 1412; 

if($sal_bruto > 1550){
    $sal_liquido = $sal_bruto - ( (11 / 100) * $sal_bruto);
    $inss = (11 / 100) * $sal_bruto;
}else{
    $sal_liquido = $sal_bruto;
    $inss = 0;
}
if ($result->num_rows > 0) {
    echo "<center>";
    echo "<hr>";
    echo "Registro Existente. Insira outro Número de Registro";
    echo "<hr>";
	echo "<br>";
} else {
      $sql = $conecta_db->prepare("INSERT INTO tb_funcionarios (n_registro,nome_funcionario,data_admissao,cargo,qtde_salarios,salario_bruto,inss,salario_liquido)
	                     VALUES ('$reg','$nome','$data','$cargo','$qtde','$sal_bruto','$inss','$sal_liquido')");
     $sql->execute();
	        if ($sql->affected_rows > 0) {
            echo "<center>";
            echo "<hr>";
            echo "Conta Criada com Sucesso";
            echo "<hr>";
            echo "<br>";
           echo "<a href='listagem.php'>Visualizar Demonstrativos de Pagamentos</a><br>";
        } else {
            echo "<center>";
            echo "<hr>";
            echo "Houve um erro ao criar a conta. Tente novamente.";
            echo "<hr>";
            echo "<br>";
        }
    }
 }

?>
     	
				  