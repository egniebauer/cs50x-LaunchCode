<?php

    // configuration
    require("../includes/config.php");
    
    // extract the $_POST dictionary into local variables (e.g. $recipient_name, $select_greeting, etc)
    extract($_POST);

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission fields
        if (empty($username))
        {
            apologize("You must provide a username.");
        }
        else if (empty($password) || empty($confirmation))
        {
            apologize("You must provide a password and confirm it.");
        }
        else if ($password !== $confirmation)
        {
            apologize("Passwords provided must match.");
        }
        
        $result = CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)", $username, password_hash($_POST["password"], PASSWORD_DEFAULT));

        if ($result == 0)
        {
            apologize("Oops! That username is already taken. Please provide a new username.");
        }
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            
            // remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $id;
            
            // redirect to portfolio
            redirect("/");
        }

    }

?>