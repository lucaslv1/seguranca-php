<?php
$_SERVER = "localhost";
$_DB_NAME = "projseguranca";
$_USERNAME = "root";
$_PASSWORD = "132465";


try {
    $_coon = new mysqli($_SERVER, $_USERNAME, $_PASSWORD, $_DB_NAME);
    echo "fodase";
} catch (Exception $e) {
    die("A conexão com o banco de dados falhou: " . $conn->connect_error);
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}
if (isset($_POST['password'])) {

    $password = $_POST['password'];
}

if (!empty($username) && !empty($password)) {
    $select = "SELECT usuario from usuario where usuario LIKE '%$username%'";

    try {
        $resp = mysqli_query($_coon, $select);
        if (mysqli_num_rows($resp) == 0) {
            $sql = "INSERT INTO usuario(usuario, senha) VALUES ('$username', '$password')";
            if ($_coon->query($sql)) {
                echo 'Cadastro';
            };
        } else {
            echo 'Ja cadastradoo';
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }


}

$_coon->close();