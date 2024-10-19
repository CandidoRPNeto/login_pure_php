<?php
require_once "db.php";

$email = isset($_POST["email_user"]) ? $_POST["email_user"] : null;
$senha = isset($_POST["password_user"]) ? $_POST["password_user"] : null;

function login() {
    global $email, $senha, $mysqli;
    if (!$email || !$senha) {
        echo "Email e senha são obrigatórios.";
        return;
    }
    $stmt = $mysqli->prepare("SELECT password_user FROM test.users WHERE email_user = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($senha_db);
        $stmt->fetch();
        if ($senha == $senha_db) {
            set_cookie();
            header("Location: ../users.php");
            exit;
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
    
    $stmt->close();
}

function set_cookie(){
    if (!isset($_COOKIE['login'])) {
        $cookie_value = "valor_do_cookie";
        $cookie_name = "login";
        $cookie_expiration = time() + (86400 * 30);
        setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");
    }
}

login();