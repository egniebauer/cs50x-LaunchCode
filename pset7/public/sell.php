<?php

    // configuration
    require("../includes/config.php");
    
    // User's ID
    $user_id = $_SESSION["id"];

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("sell_form.php", ["title" => "Sell Stock"]);
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
            apologize("You must provide a number of shares to sell.");
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
            apologize("You can only sell whole shares of stocks.");
        }
        else
        {
            // query database for user's portfolia
            $portfolio_result = CS50::query("SELECT * FROM portfolios WHERE user_id = {$user_id}");
            $current_portfolio = $portfolio_result;

            $count = count($current_portfolio); 
            
            for ($i = 0; $i < $count; $i++)
            {
                // find requested stock to sell
                if ($current_portfolio[$i]["symbol"] !== $symbol)
                {
                    continue;
                }
                else
                {
                    if ($current_portfolio[$i]["shares"] < $shares)
                    {
                        apologize("You are unable to sell {$shares} shares of {$stock_details["name"]} ({$symbol}); you only own {$current_portfolio[$i]["shares"]} shares.");
                    }
                    // if selling all shares of stock
                    else if ($current_portfolio[$i]["shares"] == $shares)
                    {
                        $sale_amount = $stock_details["price"] * $shares;
                        
                        // update cash value in users
                        $sql_cash = "UPDATE users SET cash = cash + {$sale_amount} WHERE id = {$user_id}";
                        CS50::query($sql_cash);
                            
                        // query database for user's new balance
                        $balance_result = CS50::query("SELECT * FROM users WHERE id = {$user_id}");
                        $current_balance = $balance_result[0]["cash"];
                        
                        // remove shares from portfolio
                        $sql_shares = "DELETE FROM portfolios WHERE user_id = {$user_id} AND symbol = '{$symbol}'";
                        CS50::query($sql_shares);
                        
                        // add transaction to history
                        $sql_hisory = "INSERT INTO history (user_id, timestamp, action, symbol, shares, price) VALUES({$user_id}, CURRENT_TIMESTAMP, 'SELL', '{$symbol}', {$shares}, {$sale_amount})";
                        CS50::query($sql_hisory);
                        
                        // share sell details with the user
                        $data = [
                            "title" => "Stock Sold!",
                            "sale_amount" => $sale_amount,
                            "current_balance" => $current_balance,
                            "shares" => "all of your",
                            "name" => $stock_details["name"],
                            "symbol" => $stock_details["symbol"], 
                            ];
                            
                        render("sell_display.php", $data);
                        break;
                    }
                    // if selling a portion of shares
                    else if ($current_portfolio[$i]["shares"] > $shares)
                    {
                        $sale_amount = $stock_details["price"] * $shares;
                        
                        // update cash value in users
                        $sql_cash = "UPDATE users SET cash = cash + {$sale_amount} WHERE id = {$user_id}";
                        CS50::query($sql_cash);
                            
                        // query database for user's new balance
                        $balance_result = CS50::query("SELECT * FROM users WHERE id = {$user_id}");
                        $current_balance = $balance_result[0]["cash"];
                        
                        // remove shares from portfolio
                        $sql_shares = "UPDATE portfolios SET shares = shares - {$shares} WHERE user_id = {$user_id} AND symbol = '{$symbol}'";
                        CS50::query($sql_shares);
                        
                        // add transaction to history
                        $sql_hisory = "INSERT INTO history (user_id, timestamp, action, symbol, shares, price) VALUES({$user_id}, CURRENT_TIMESTAMP, 'SELL', '{$symbol}', {$shares}, {$sale_amount})";
                        CS50::query($sql_hisory);
                            
                        // share sell details with the user
                        $data = [
                            "title" => "Stock Sold!",
                            "sale_amount" => $sale_amount,
                            "current_balance" => $current_balance,
                            "shares" => $shares,
                            "name" => $stock_details["name"],
                            "symbol" => $stock_details["symbol"], 
                            ];
                            
                        render("sell_display.php", $data);
                        break;
                    }
                }
            }
            apologize("You don't own any shares of {$stock_details["name"]} ({$symbol}) stock.");
        }

    }
?>