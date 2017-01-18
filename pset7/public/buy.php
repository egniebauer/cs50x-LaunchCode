<?php

    // configuration
    require("../includes/config.php");
    
    // User's ID
    $user_id = $_SESSION["id"];


    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("buy_form.php", ["title" => "Buy Stock"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $symbol = strtoupper($_POST["symbol"]);
        $shares = $_POST["shares"];

        // validate submission fields
        if (empty($symbol))
        {
            apologize("You must provide a stock symbol.");
        }
        else if (empty($shares))
        {
            apologize("You must provide a number of shares to buy.");
        }
        
        $stock_details = lookup($_POST["symbol"]);
        $valid_shares = preg_match("/^\d+$/", $shares);
        
        // validate stock
        if ($stock_details === FALSE)
        {
            apologize("You must provide a valid stock symbol.");
        }
        // validate shares
        else if ($valid_shares !== 1)
        {
            apologize("You can only buy whole shares of stocks.");
        }
        else
        {
            // query database for user's current cash
            $user_result = CS50::query("SELECT cash FROM users WHERE id = {$user_id}");
            $initial_balance = $user_result[0]["cash"];
            
            // cost of stock purchase
            $sale_amount = $stock_details["price"] * $shares;
            
            if ($sale_amount > $initial_balance)
            {
                apologize("You can't afford {$shares} shares of {$stock_details["name"]} ({$stock_details["symbol"]}). You only have \$" . number_format($initial_balance, 2, '.', ',') . ".");
            }
            else
            {
                // add stock purchase to portfolio
                $sql_shares = "INSERT INTO portfolios (user_id, symbol, shares) VALUES({$user_id}, '{$symbol}', {$shares}) ON DUPLICATE KEY UPDATE shares = shares + {$shares}";
                CS50::query($sql_shares);
                
                // update cash value in users
                $sql_cash = "UPDATE users SET cash = cash - {$sale_amount} WHERE id = {$user_id}";
                CS50::query($sql_cash);
                
                // add transaction to history
                $sql_hisory = "INSERT INTO history (user_id, timestamp, action, symbol, shares, price) VALUES({$user_id}, CURRENT_TIMESTAMP, 'BUY', '{$symbol}', {$shares}, {$sale_amount})";
                CS50::query($sql_hisory);
                
                // query database for user's new balance
                $balance_result = CS50::query("SELECT * FROM users WHERE id = {$user_id}");
                $current_balance = $balance_result[0]["cash"];
                
                // share sell details with the user
                $data = [
                    "title" => "Stock Bought!",
                    "sale_amount" => $sale_amount,
                    "current_balance" => $current_balance,
                    "shares" => $shares,
                    "name" => $stock_details["name"],
                    "symbol" => $stock_details["symbol"], 
                    ];
                    
                render("buy_display.php", $data);
            }
    
        }
    }
?>