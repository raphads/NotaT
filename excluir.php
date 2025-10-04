<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
    // Verifica se o ID do funcionário foi fornecido
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "empresa";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Prepara e executa a consulta de exclusão
        $sql = "DELETE FROM funcionarios WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Funcionário excluído com sucesso.";
        } else {
            echo "Erro ao excluir funcionário: " . $stmt->error;
        }

        // Fecha a conexão
        $stmt->close();
        $conn->close();
    } else {
        echo "ID do funcionário não fornecido.";
    }
} else {
    echo "Método de requisição inválido.";
}

?>