<?php
  // Conecta ao banco de dados
include "conn.php";

  // Escreve a consulta SELECT
  $sql = "SELECT id, nome, sobrenome FROM clientes";

  // Executa a consulta e armazena os resultados em um result set
  $result = mysqli_query($conn, $sql);

  // Verifica se a consulta retornou algum resultado
  if (mysqli_num_rows($result) > 0) {
    // Exibe os dados dos clientes em uma tabela HTML
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nome</th>";
    echo "<th>Sobrenome</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['nome'] . "</td>";
      echo "<td>" . $row['sobrenome'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "Nenhum cliente encontrado.";
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($conn);

  echo "<a href='../index.html'>voltar ao menu</a> "

?>
