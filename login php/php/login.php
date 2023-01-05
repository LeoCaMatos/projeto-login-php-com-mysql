<?php
  // incluir a conexão de dados
  include "conn.php";
  // Receba as informações do formulário
  $username = $_POST['username'];
  $password = $_POST['password'];

  global $conn;

  // Crie a consulta SQL
  $sql = "SELECT * FROM usuarios WHERE nome_de_usuario='$username' AND senha='$password'";
  $result = mysqli_query($conn, $sql);

  // Verifique se a consulta retornou algum resultado
  if (mysqli_num_rows($result) > 0) {
    // O usuário foi encontrado
    echo "Bem-vindo, $username!";
    header('Location: cliente_tabela.php');
  } else {
    // O usuário não foi encontrado
    echo "Nome de usuário ou senha inválidos.";
  }

  // Feche a conexão com o banco de dados
  mysqli_close($conn);
  
?>


