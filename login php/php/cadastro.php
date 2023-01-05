<?php
  include "conn.php";
  // Receba as informações do formulário
  $nome_de_usuario_novo = $_POST['nome_de_usuario_novo'];
  $senha_nova = $_POST['senha_nova'];

  global $conn;

// Crie a consulta SQL para verificar se o nome de usuário já existe
$sql = "SELECT * FROM usuarios WHERE nome_de_usuario='$nome_de_usuario_novo'";
$result = mysqli_query($conn, $sql);

// Verifique se a consulta retornou algum resultado
if (mysqli_num_rows($result) > 0) {
  // O nome de usuário já existe
  echo "O nome de usuário escolhido já está em uso. Por favor, escolha outro.";
  echo "<a href='../html/cadastro.html'>voltar</a> ";
  
} else {
  // O nome de usuário ainda não existe, então podemos criar o novo usuário
  $sql = "INSERT INTO usuarios (nome_de_usuario, senha)
  VALUES ('$nome_de_usuario_novo', '$senha_nova')";

  if (mysqli_query($conn, $sql)) {
    echo "Novo usuário criado com sucesso!";
    echo "<a href='../index.html'>logar</a> ";
  } else {
    echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
  }
}

  // Feche a conexão com o banco de dados
  mysqli_close($conn);
?>