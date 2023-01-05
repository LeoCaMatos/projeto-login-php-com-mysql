
<?php
// Conexão do banco de dados
$servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "login_db";

  $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
  // Verifique a conexão
  if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
  }
  
?>