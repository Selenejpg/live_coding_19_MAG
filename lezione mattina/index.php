<?php
//costanti del DB
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "university");
define("DB_PORT", 3307);

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

var_dump($conn);

if ($conn && $conn -> connect_error) {
    echo 'Connessione fallita' . $conn -> connect_error;
    exit();
}

$sql = "SELECT `name`, `email` FROM `departments`";

$result = $conn -> query($sql);

var_dump($result);

if ($result && $result -> num_rows > 0 ) {
  while ($row = $result -> fetch_assoc()) {
      var_dump($row);
      echo "Nome:" . $row['name'] . "<br>" . "Email: " .  $row['email'];
  } 
} else {
    echo "Ci sono degli errori";
}

$conn -> close();
?>