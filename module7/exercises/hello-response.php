<?php 

$greeting = $_GET["greeting"];
$username = $_GET["username"];

if (empty($username) || empty($greeting)):
    // redirect the user back to the index page
    header("Location: ./hello-form.php"); // notice we can use a "relative" link here
    // stop running this script
    exit;
endif

?>

<!DOCTYPE html>
<head>
</head>
<body>
    <?php print("{$greeting}, {$username}!"); ?>
</body>