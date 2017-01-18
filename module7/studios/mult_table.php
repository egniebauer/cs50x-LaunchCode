<?php

$w = $_POST["w"];
$h = $_POST["h"];

if (empty($w) || empty($h)) {
    header("Location: ./mult_form.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Your Table is Ready</title>
    </head>
    <body>
        <table>
            <?php for ($i = 0; $i < $h; $i++): ?>
                <!-- TODO this multiplication table needs some work! -->
                <tr>
                    <?php for ($j = 0; $j < $wcd; $j++): ?>
                        <td>#</td>
                    <?php endfor ?>
                </tr>
            <?php endfor ?>
        </table>
    </body>
</html>