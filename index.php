<?php
if (!empty($_GET) && isset($_GET["methode"])) {
    $methode = $_GET["methode"];
} else {
    $methode = "plus";
}

if (!empty($_GET) && isset($_GET["table"])
) {
    $table = $_GET["table"];
} else {
    $table = 1;
}

$maxTables = 10;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./main.css">
    <link rel="icon" href="favicon.png">

    <title>Tables de multiplication</title>
</head>
<body>
<header><h1>Tables de multiplication pour le primaire</h1></header>
<nav>
    <?php
    for ($i = 1; $i < $maxTables + 1; $i += 1) {
        echo '<a href="?table=' . $i . '&methode=' . $methode . '">' . $i . '</a>';
    }
    ?>
</nav>
<aside>
    <?php
    echo '<a class="methode" href="?table=' . $table . '&methode=plus">+</a>';
    echo '<a  class="methode" href="?table=' . $table . '&methode=fois">x</a>';
    echo '<a  class="methode" href="?table=' . $table . '&methode=division">÷</a>';
    ?>
</aside>
<main>
    <table>
        <thead>
        <tr>
            <td>La table du <?php echo $table ?></td>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 1; $i < $maxTables + 1; $i += 1) {
            switch ($methode) {
                case "division":
                    $stringMethod = " ÷ ";
                    $result = number_format(intval($table) / intval($i), 2, ',', ' ');
                    break;
                case "fois":
                    $stringMethod = " x ";
                    $result = intval($table) * intval($i);
                    break;
                default :
                    $stringMethod = " + ";
                    $result = intval($table) + intval($i);
            }
            echo '<tr><td>' . $table . ' ' . $stringMethod . ' ' . $i . ' = ' . $result . '</td></tr>';
        }
        ?>
        </tbody>
    </table>
</main>
<footer>© 2020 Léo Hugonnot</footer>
</body>
</html>