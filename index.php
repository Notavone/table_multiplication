<?php
if (!empty($_GET) && isset($_GET["methode"])) {
    $methode = $_GET["methode"];
} else {
    $methode = "plus";
}

if (!empty($_GET) && isset($_GET["table"])) {
    $table = $_GET["table"];
} else {
    $table = 1;
}

$max_table = 10;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./main.css">
    <title>TP 8</title>
</head>
<body>
<header><h1>Tables de multiplication pour le primaire</h1></header>
<nav>
    <?php
    for ($i = 1; $i < $max_table + 1; $i += 1) {
        echo "<a href='?table=$i&methode=$methode'>$i</a>";
    }
    echo "<a class='methode' href='?table=$table&methode=plus'>+</a>";
    echo "<a  class='methode' href='?table=$table&methode=fois'>x</a>";
    ?>
</nav>
<main>
    <table>
        <thead>
        <tr>
            <th><?php echo "La table de $table" ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < $max_table + 1; $i += 1) {
            $result = 0;
            if ($methode === "plus") {
                $result = intval($table) + intval($i);
                echo "<tr><td>" . $table . " + " . $i . " = " . $result . "</td></tr>";
            }
            if ($methode === "fois") {
                $result = intval($table) * intval($i);
                echo "<tr><td>" . $table . " x " . $i . " = " . $result . "</td></tr>";
            }
        }
        ?>
        </tbody>
    </table>
</main>
<footer>Site réalisé par Léo Hugonnot</footer>
</body>
</html>