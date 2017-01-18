<?php

    // configuration
    require("../includes/config.php");

    
    $user_id = $_SESSION["id"];

    // query database for user's history
    $history_result = CS50::query("SELECT * FROM history WHERE user_id = {$user_id}");
    $user_history = $history_result;

    
    // display user's transaction history
    $data = [
        "title" => "History",
        "row" => $user_history
        ];
        
    render("history_display.php", $data);

?>
