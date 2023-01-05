<?php
  // Conecta ao banco de dados
  include "conn.php";

 


  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário

    

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];

    $nome = '';
if (isset($_POST['nome'])) {
  $nome = $_POST['nome'];
}

$sobrenome = '';
if (isset($cliente['sobrenome'])) {
  $sobrenome = $cliente['sobrenome'];
}
   

    // Escreve a consulta UPDATE
    $sql = "UPDATE clientes SET nome='$nome', sobrenome='$sobrenome' WHERE id=$id";

    // Executa a consulta
    if (mysqli_query($conn, $sql)) {
      echo "Cliente atualizado com sucesso.";
    } else {
      echo "Erro ao atualizar cliente: " . mysqli_error($conn);
    }
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Atualizar Cliente</title>
</head>
<body>
  <h1>Atualizar Cliente</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="id">ID:</label><br>
    <input type="text" id="id" name="id" value="<?php echo $id; ?>"><br>
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>"><br>
    <label for="sobrenome">Sobrenome:</label><br>
    <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $sobrenome; ?>"><br><br>
    <input type="submit" value="Atualizar">
  </form>
  <P>Clique aqui para <a href="../php/cliente_tabela.php">voltar</a></P>
</body>
</html>
