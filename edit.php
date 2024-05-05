<?php session_start() ?>
<?php require_once ('config/conf.php') ?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módosítás</title>
</head>

<body>
    <form action="editproc.php" method="POST">
        <label for="id">ID:</label>
        <input type="number" name="id" id="id" value="<?php echo $_POST['myId'] ?>">
        <label for="eljarasNeve">Eljárás neve:</label>
        <input type="text" name="eljarasNeve" id="eljarasNeve" value="<?php echo $_POST['myName'] ?>">
        <label for="megjegyzés">Megjegyzés:</label>
        <input type="text" name="megjegyzes" id="megjegyzes" value="<?php echo $_POST['myNote'] ?>">
        <label for="eljarasHelyszine">Eljárás helyszíne:</label>
        <input type="text" name="eljarasHelyszine" id="eljarasHelyszine" value="<?php echo $_POST['myLoc'] ?>">
        <label for="eljarasAra">Eljárás Ára:</label>
        <input type="text" name="eljarasAra" id="eljarasAra" value="<?php echo $_POST['myPrice'] ?>">
        <label for="esztetikaTetovalas">Esztétika/Tetoválás:</label>
        <select name="esztetikaTetovalas" id="esztetikaTetovalas">  
            <option value="<?php echo $_POST['myMode'] ?>"><?php echo $_POST['myMode'] ?></option>
            <?php
            if ($_POST['myMode'] === "Esztétika") {
                ?>

                <option value="Tetoválás">Tetoválás</option>

                <?php
            } else {
                ?>

                <option value="Esztétika">Esztétika</option>

                <?php
            }
            ?>
        </select>
        <button>MÓDOSÍT</button>
    </form>
</body>

</html>