<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Quote Request"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $symbol = strtoupper($_POST["symbol"]);
        
        // validate submission fields
        if (empty($symbol))
        {
            apologize("You must provide a stock symbol.");
        }
        
        $stock = lookup($_POST["symbol"]);
        
        if ($stock === FALSE)
        {
            apologize("You must provide a stock symbol.");
        }
        else
        {
            $symbol = $stock["symbol"];
            $name = $stock["name"];
            $price = $stock["price"];
            
            $values = [
                "title" => $name,
                "symbol" => $symbol,
                "name" => $name,
                "price" => $price,
                ];
            
            render("quote_display.php", $values); 
        }

    }
?>