<?php
  // Recupera o ID do cliente a ser excluído
  $id = $_POST['id'];

include "conn.php";

  // Escreve a consulta DELETE
  $sql = "DELETE FROM clientes WHERE id=$id";

  // Executa a consulta
  if (mysqli_query($conn, $sql)) {
    echo "O cliente foi excluído com sucesso!";
  } else {
    echo "Erro ao excluir o cliente: " . mysqli_error($conn);
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($conn);

  echo "<a href='../php/cliente_tabela.php'>voltar ao menu</a> "
  
?>
