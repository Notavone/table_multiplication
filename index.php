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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="favicon.png">

    <title>Tables de multiplication</title>
</head>
<body>
<header>
    <h1 class="border-bottom pb-2 mt-3">Tables de multiplication pour le primaire</h1>
</header>
<div class="container">
    <div class="row">
        <div class="col">
            <nav class="mt-1">
                <?php
                for ($i = 1; $i < $maxTables + 1; $i += 1) {
                    echo '<a class="btn btn-secondary mx-1" href="?table=' . $i . '&methode=' . $methode . '">' . $i . '</a>';
                }
                ?>
            </nav>
            <aside class="my-2">
                <?php
                echo '<a class="btn btn-dark mx-1" class="methode" href="?table=' . $table . '&methode=plus">+</a>';
                echo '<a class="btn btn-dark mx-1" class="methode" href="?table=' . $table . '&methode=fois">x</a>';
                echo '<a class="btn btn-dark mx-1" class="methode" href="?table=' . $table . '&methode=division">÷</a>';
                ?>
            </aside>
            <main>
                <table class="table table-bordered table-hover table-striped text-center">
                    <thead>
                    <tr>
                        <td class="font-weight-bolder">La table du <?php echo $table ?></td>
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
        </div>
    </div>
</div>
<footer>© 2020 Léo Hugonnot</footer>
</body>
</html>