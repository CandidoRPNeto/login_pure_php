<?php 
if (isset($_COOKIE['login'])) {
    require_once "src/db.php";
    $query = "SELECT * FROM test.users";
    $lista = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <title>Users</title>
    </head>
    <body>
        <div class="card-body-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Emails Salvos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id_number = 1;
                        while($user = mysqli_fetch_assoc($lista)){
                            echo "<tr><th>$id_number</th><td>".$user['email_user']."</td></tr>";
                            $id_number++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<?php
} else {
    echo "Você precisa estar logado para ver esta página.";
}
?>