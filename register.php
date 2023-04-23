<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<div class="card m-5 p-3">
    <h1 class="mx-auto">Atualizar perfil</h1>


    <form method="POST" action="register.php" class="mx-auto">
        <div class="row">
            <div class="col-4">
                <label for="firstname">Nome:</label>
                <input type="text" id="firstname" name="firstname" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="lastname">Sobrenome:</label>
                <input type="text" id="lastname" name="lastname" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="superscription">Endereço:</label>
                <input type="text" id="superscription" name="superscription" required><br>
                <?php if($con) { ?>
                    

                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="neighborhood">Bairro:</label>
                <input type="text" id="neighborhood" name="neighborhood" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="num">Numero:</label>
                <input type="text" id="num" name="num" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col mx-auto">
                <input type="submit" value="Atualizar">
            </div>
        </div>
    </form>
</div>

</body>
</html>


<?php
$_SERVER = "localhost";
$_DB_NAME = "projseguranca";
$_USERNAME = "postgres";
$_PASSWORD = "132465";
$con = null;


try {
    $con = pg_connect("host=$_SERVER user=$_USERNAME 
password=$_PASSWORD dbname=$_DB_NAME");
} catch (Exception $e) {
    die("A conexão com o banco de dados falhou: " . $_coon->connect_error);
}

if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
}
if (isset($_POST['lastname'])) {

    $lastname = $_POST['lastname'];
}
if (isset($_POST['email'])) {

    $email = $_POST['email'];
}
if (isset($_POST['cpf'])) {

    $cpf = $_POST['cpf'];
}
if (isset($_POST['superscription'])) {

    $superscription = $_POST['superscription'];
}
if (isset($_POST['neighborhood'])) {

    $neighborhood = $_POST['neighborhood'];
}
if (isset($_POST['num'])) {

    $num = $_POST['num'];
}

if (!empty($firstname) && !empty($email) && !empty($cpf)) {
    try {
        $sql = "INSERT INTO perfil(firstname, lastname, email, cpf, superscription, neighborhood, num)
                    VALUES ('$firstname', '$lastname', '$email', '$cpf', '$superscription', '$neighborhood', '$num')";
        pg_query($con, $sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }


} else {
    echo "Os campos nome, e-mail e cpf são obrigatórios.";
}
