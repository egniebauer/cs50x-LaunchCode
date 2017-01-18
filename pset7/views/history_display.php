<?php
$count = count($row);
?>

<div>
<h1>Transaction History</h1>
</div>
<div>
<table class="table table-striped table-condensed">
  <tr>
    <th>Timestamp</th>
    <th>Action</th> 
    <th>Stock</th>
    <th>Shares</th>
    <th>Total</th>
  </tr>
<?php for ($i = 0; $i <= $count - 1; $i++){ ?>
    <tr>
        <td><?= htmlspecialchars($row[$i]["timestamp"]) ?></td>
        <td><?= htmlspecialchars($row[$i]["action"]) ?></td>
        <td><?= htmlspecialchars($row[$i]["symbol"]) ?></td>
        <td><?= htmlspecialchars($row[$i]["shares"]) ?></td>
        <td><?= htmlspecialchars("\$" . number_format($row[$i]["price"], 2, ".", ",")) ?></td>
    </tr>
<?php } ?></table>
</div>