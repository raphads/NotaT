<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conecta_db->prepare("DELETE FROM tb_funcionarios WHERE n_registro = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: listagem.php");
        exit;
    } else {
        echo "Erro ao excluir funcionário.";
    }
} else {
    echo "ID inválido.";
}
?>
