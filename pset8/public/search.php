<?php

    require(__DIR__ . "/../includes/config.php");
    
    
    // numerically indexed array of places
    $places = [];
    // build sql query deetails based on user search
    $sql_deets = "";
    // Split user search request string into individual parameters
    $params = preg_split('/[,;| ]/', $_GET["geo"], null, PREG_SPLIT_NO_EMPTY);
    
    
    // Iterate over parameters array
    for ($i = 0; $i < count($params); $i++) {
        
        // format search parameter for sql query statement
        $query_zip = ltrim($params[$i] . "%", '0');
        $query = ($params[$i] . "%");


        // ignore searches for US
        if (strcasecmp(strtolower($query), "us%") == 0) {
            $i++;
        }
        // return zip code results
        elseif (is_numeric($params[$i])) {
            $sql_deets = " postal_code LIKE '{$query_zip}'";
            break;
        }
        // return city results
        elseif ($i == 0) {
            $query2 = ($params[0] . " " . $params[1]);
            $test = CS50::query("SELECT * FROM places WHERE (place_name LIKE '{$query2}' OR admin_name2 LIKE '{$query2}')");
            
            // if two word city name
            if (count($test) > 0) {
                $sql_deets = " (place_name LIKE '{$query2}' OR admin_name2 LIKE '{$query2}')";
                $i = 1;
            }
            // if one word city name
            else {
                $sql_deets = " (place_name LIKE '{$query}' OR admin_name2 LIKE '{$query}')";
            }
        }
        // return state results
        else {
            $sql_deets .= " AND (admin_name1 LIKE '{$query}' OR admin_code1 LIKE '{$query}')";
        }
        
    }
    
    // build sql query based on user search
    $sql = "SELECT * FROM places WHERE" . $sql_deets;
    // return results
    $places = CS50::query($sql);
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>