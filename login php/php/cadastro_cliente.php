<?php




  // Recupera os dados do formulário
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];

  include "conn.php";

  // Escreve a consulta INSERT
  $sql = "INSERT INTO clientes (nome, sobrenome) VALUES ('$nome', '$sobrenome')";

  // Executa a consulta
  if (mysqli_query($conn, $sql)) {
    echo "O cliente $nome $sobrenome foi adicionado com sucesso!";
  } else {
    echo "Erro ao adicionar o cliente: " . mysqli_error($conn);
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($conn);

  echo "<a href='../php/cliente_tabela.php'>voltar ao menu</a> "

?>

