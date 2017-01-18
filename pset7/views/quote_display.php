<?php
$price_formatted = "\$" . number_format($price, 2, '.', ',');

$message = "{$symbol}   |   {$price_formatted}"
?>

<h1><?= htmlspecialchars($title) ?></h1>
<p><?= htmlspecialchars($message) ?></p>