
<?php

require "valida_login.php"; 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kcal";
$teste = $_SESSION['id'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//print_r($_SESSION);

$sql = "SELECT id_usuario, data_pesagem, peso FROM historico_peso where id_usuario =". $_SESSION["ID_USUARIO"];
////$sql = "SELECT id_usuario, data_pesagem, peso FROM historico_peso where id_usuario = '$_SESSION[id]'";
$result = $conn->query($sql); // !!!! testa  la



if ($result->num_rows != 0) {
    echo "<table><tr><th> ID </th><th> Data </th><th> Peso </th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["id_usuario"]."</td><td>".$row["data_pesagem"]."</td><td>".$row["peso"]. "</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>