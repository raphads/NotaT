<html>
<title>Manipulacao de Dados em PHP</title>
<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
<body>
<form name="form1" method="post"  action="gravar.php">
<fieldset>
<legend>Cadastro de Funcionários</LEGEND>
Número de Registro:<br>
<input type="text" name="txt_reg" size="30"><br>
Nome do Funcionário:<br>
<input type="text" name="txt_nome" size="30"><br>
Data de Admissão:<br>
<input type="date" value="DD-MM-AAAA" name="txt_data" size="30"><br>
Cargo:<br>
<input type="text" name="txt_cargo" size="30"><br>
Quantidade de Salários Mínimos:<br>
<input type="text" name="txt_qtde" size="30"><br>

<p>
<INPUT TYPE="submit" name="bt_incluir" VALUE="Cadastrar" onClick="document.form.action='gravar.php'">


    <center>
        <br><a href="listagem.php">Visualizar Demonstrativos de Pagamentos</a><br>
    </center>
</fieldset>
</form>

</body>
</html>