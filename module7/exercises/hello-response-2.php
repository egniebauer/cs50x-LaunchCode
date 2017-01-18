<?php 

$username = $_GET["username"]; 
$greeting = $_GET["greeting"]; 

?>

<!DOCTYPE html>
<head>
</head>
<body>
    <!-- TODO replace "false" below with a condition to check if either value is empty (same condition as last time) -->
    <?php if(empty($username) || empty($greeting)): ?> 
        <p>Hey - you've got to fill the whole form out!</p>
        <p><a rel="stylesheet" href="https://ide50-eniebauer.cs50.io/hello-form-2.php" type="text/css" />Go back</a></p>
    <?php else: ?>
        <?php print("{$greeting}, {$username}!"); ?>
    <?php endif ?>
</body>
