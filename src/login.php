<?php
require_once "db.php";

$email = isset($_POST["email_user"]) ? $_POST["email_user"] : null;
$senha = isset($_POST["password_user"]) ? $_POST["password_user"] : null;

function login() {
    global $email, $senha, $mysqli;
    $stmt = $mysqli->prepare("SELECT password_user FROM test.users WHERE email_user = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($senha_db);
        $stmt->fetch();
        if (password_verify($senha, $senha_db)) {
            header("Location: ../users.phtml");
            exit;
        }
    }
    echo "Dados Incorretos";
    $stmt->close();
}

login();