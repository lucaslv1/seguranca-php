<?php
$_SERVER = "localhost";
$_DB_NAME = "test";
$_USERNAME = "root";
$_PASSWORD = "132465";


$_coon = new mysqli($_SERVER, $_USERNAME, $_PASSWORD, $_DB_NAME);
// try {
// } catch(Exception $e)
// {
//     die("A conexão com o banco de dados falhou: " . $conn->connect_error);
// }


$username = $_POST['username'];
$password = $_POST['password'];

if(!empty($username) && !empty($password))
{
    $sql = "INSERT INTO user(username, password) VALUES ('$username', '$password')";
    if($_coon->query($sql))
    {
        echo 'Cadastro';
    };
}

$_coon->close();