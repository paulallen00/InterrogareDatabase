<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "my_site";

  $user = $_POST["username"];
  $pass = $_POST["password"];
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    $sql = "SELECT password FROM utente WHERE username='$user'";
    $result = $conn->query($sql);
    //var_dump($result);
    if ($result->num_rows>0){
        while($row = $result->fetch_assoc()) {
            $pass_salvata = $row["password"];
            if($pass_salvata == $pass) {
                echo "Benvenuto $user<br>";
            } else {
                header("Location: index.html");
            }
        }
    }
    $conn->close();
  }
  
  
?>