<?php
//1. Ask the user how many people to get orders for
    $orders = readline("How many orders? ");
    
//2. Then, for each person:
//      -Ask for their name
//      -Ask for their order
    for ($i = 0; $i < $orders; $i++) {
        $name = readline("Order " . $i . " name: ");
        $order = readline("Order " . $i . " order: ");
        $orderList[$name] = $order;
    }
    
//3. Output each person's name, then their order 
    print "\nTotal order:\n";
    foreach ($orderList as $name => $order) {
        print($name . ": " . $order . "\n");
    }
?>