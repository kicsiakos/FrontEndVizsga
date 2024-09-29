<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>

<?php
if (isset($_SESSION['id'])) {
    header("Location: admin.php");
} ?>

<body>
    <div class="form">
        <form method="POST" action="loginprocOOP.php">
            <!-- <label for="username">Felhasználónév</label> -->
            <div class="email-div">
                <input type="email" name="username" id="username" placeholder="Email cím">
            </div>
            <!-- <label for="password">Jelszó</label> -->
            <div class="password-div">
                <div class="password">
                    <input type="password" name="password" id="password" placeholder="Jelszó">
                </div>
                <div class="password-eye">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 20">
                        <path
                            d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" />
                    </svg>
                </div>
            </div>
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
    <script src="../scripts/login.mod.js"></script>
</body>

</html>