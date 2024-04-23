<?php
session_start()
    ?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="form">
        <form method="POST" action="loginproc.php">
            <label for="username">Felhasználónév</label>
            <input type="email" name="username" id="username">
            <label for="password">Jelszó</label>
            <input type="password" name="password" id="password">
            <button type="submit">Bejelentkezés</button>
            <?php
            if (isset($_SESSION['error'])) {
                ?>
                <div style="color:red;"><?php print ($_SESSION['error']); ?></div>
                <?php
            }
            ?>
        </form>
    </div>
</body>

</html>