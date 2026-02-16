<html>
<head>
<title>Exemplo PHP - Microsserviços</title>
</head>
<body>

<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=UTF-8');

echo 'Versão Atual do PHP: ' . phpversion() . '<br>';

$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');
$database = getenv('DB_NAME');

// Criar conexão
$link = new mysqli($servername, $username, $password, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$valor_rand1 =  rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();

$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES ('$valor_rand1' , '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2','$host_name')";

if ($link->query($query) === TRUE) {
  echo "Novo registro criado com sucesso!<br>";
  echo "Host: " . $host_name;
} else {
  echo "Erro: " . $link->error;
}

$link->close();
?>
</body>
</html>
