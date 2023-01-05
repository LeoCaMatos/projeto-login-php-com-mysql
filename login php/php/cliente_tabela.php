<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">

    <title>cadastro cliente</title>
</head>
<body>
    <nav id="menu">
        <a href="#" class="menu-toggle">Menu</a>
        <ul class="menu-items">
          <li><a href="../html/menu.html">Home</a></li>
          <li><a href="../php/cliente_tabela.php">Cadastrar produto</a></li>
          <!-- Mais opções de menu aqui -->
        </ul>
      </nav>
      <h1>Cadastro de Clientes</h1>
      <form action="cadastro_cliente.php" method="post">
  <label for="nome">Nome:</label><br>
  <input type="text" id="nome" name="nome"><br>
  <label for="sobrenome">Sobrenome:</label><br>
  <input type="text" id="sobrenome" name="sobrenome"><br><br>
  <input type="submit" value="Cadastrar">
</form> 
      
<br><br><br><br>
  <table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Sobrenome</th>
      <th>Ações</th>
    </tr>
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
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['nome'] . "</td>";
          echo "<td>" . $row['sobrenome'] . "</td>";
          echo "<td>";
          echo "<form action='atualizar_cliente.php' method='post'>";
          echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
          echo "<input type='submit' value='Editar'>";
          echo "</form>";
          echo "<form action='excluir_cliente.php' method='post'>";
          echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
          echo "<input type='submit' value='Excluir'>";
          echo "</form>";
          echo "</td>";
          echo "</tr>";
        }
      } else {
        echo "Nenhum cliente encontrado.";
      }

      // Fecha a conexão com o banco de dados
      mysqli_close($conn);
    ?>
  </table>
</body>
</html>

  