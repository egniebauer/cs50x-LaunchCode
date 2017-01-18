<?php

    // configuration
    require("../includes/config.php");
    
    // extract the $_POST dictionary into local variables (e.g. $recipient_name, $select_greeting, etc)
    extract($_POST);


    $user_id = $_SESSION["id"];

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("account_form.php", ["title" => "Account"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission fields
        if (empty($new_password) || empty($confirm_new) )
        {
            apologize("You must fill all form fields.");
        }
        else
        {
            if ($new_password !== $confirm_new)
            {
                apologize("Your passwords do not match.");
            }
            else
            {
                $result = CS50::query("UPDATE users SET hash = ? WHERE id = {$user_id}", password_hash($_POST["new_password"], PASSWORD_DEFAULT));
                $message = "Your password has been updated.";
                render("account_display.php", ["message" => $message]);
            }
        }
    }

?>