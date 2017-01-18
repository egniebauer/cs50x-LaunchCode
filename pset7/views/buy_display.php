<?php
$sale_amount_formatted = "\$" . number_format($sale_amount, 2, '.', ',');
$current_balance_formated = "\$" . number_format($current_balance, 2, '.', ',');

$message = "You bought {$shares} shares of {$name} ({$symbol}) for {$sale_amount_formatted}. Your current balance is now: {$current_balance_formated}."
?>

<h1><?= htmlspecialchars($title) ?></h1>
<p><?= htmlspecialchars($message) ?></p>