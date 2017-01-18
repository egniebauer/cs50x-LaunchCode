<?php

    // configuration
    require("../includes/config.php");

    
    $user_id = $_SESSION["id"];

    // query database for user's balance
    $balance_result = CS50::query("SELECT * FROM users WHERE id = {$user_id}");
    $current_balance = $balance_result[0]["cash"];

    // query database for user's portfolia
    $portfolio_result = CS50::query("SELECT * FROM portfolios WHERE user_id = {$user_id}");
    $current_portfolio = $portfolio_result;
    
    // add stock information
    $count = count($current_portfolio);
    for ($i = 0; $i <= $count - 1; $i++)
    {
        // get current stock information
        $current_stock = $current_portfolio[$i]["symbol"];
        $share_details = lookup($current_stock);
        
        // add name
        $share_name = $share_details["name"];
        $current_portfolio[$i]['name'] = $share_name;
        
        // add price
        $share_price = $share_details["price"];
        $current_portfolio[$i]['price'] = $share_price;
    }
    
    // total user's current portfolio
    for ($i = 0; $i <= $count - 1; $i++)
    {
        $share_price = $current_portfolio[$i]["price"];
        $num_shares = $current_portfolio[$i]["shares"];

        $current_portfolio[$i]['total'] = $share_price * $num_shares;
    }
    // dump($current_portfolio);
    
    // render portfolio
    $data = [
        "title" => "Portfolio",
        "current_balance" => $current_balance,
        "row" => $current_portfolio
        ];
        
    render("portfolio.php", $data);

?>
