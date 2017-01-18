<?php
$balance_formatted = "\$" . number_format($current_balance, 2, ".", ",");

$count = count($row);
?>

<div>
<h1>Current Balance</h1>
<h2><?= htmlspecialchars($balance_formatted) ?></h2>
</div>
<div>
<table class="table table-striped table-condensed">
  <tr>
    <th>Symbol</th>
    <th>Name</th> 
    <th>Price</th>
    <th>Shares</th>
    <th>Total</th>
  </tr>
<?php for ($i = 0; $i <= $count - 1; $i++){ ?>
    <tr>
        <td><?= htmlspecialchars($row[$i]["symbol"]) ?></td>
        <td><?= htmlspecialchars($row[$i]["name"]) ?></td>
        <td><?= htmlspecialchars("\$" . number_format($row[$i]["price"], 2, ".", ",")) ?></td>
        <td><?= htmlspecialchars($row[$i]["shares"]) ?></td>
        <td><?= htmlspecialchars("\$" . number_format($row[$i]["total"], 2, ".", ",")) ?></td>
    </tr>
<?php } ?></table>
</div>