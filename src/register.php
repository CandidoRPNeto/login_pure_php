<?php
require_once "db.php";

$json = file_get_contents("https://jsonplaceholder.typicode.com/posts/1");
$data = json_decode($json, true);

$name = isset($_POST["name_user"]) ? $_POST["name_user"] : null;
$email = isset($_POST["email_user"]) ? $_POST["email_user"] : null;
$senha = isset($_POST["password_user"]) ? $_POST["password_user"] : null;
$codigo = isset($_POST["code_user"]) ? $_POST["code_user"] : null;
$title = $data['title'];

function register() {
    global $name, $email, $senha, $codigo, $title, $mysqli; 
    $stmt = $mysqli->prepare("INSERT INTO test.users (title_user, name_user, email_user, password_user, code_user) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $name, $email, $senha, $codigo);
    $stmt->execute();
    echo "Dados Inseridos";
    $stmt->close();
}
register();