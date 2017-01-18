<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];
    $sql_deets = "";
    $temp_all = [];
    
    // TODO: search database for places matching $_GET["geo"], store in $places

    // Split query string into individual search parameters
    $params = preg_split('/[,;| ]/', $_GET["geo"], null, PREG_SPLIT_NO_EMPTY);
    
    // Iterate over parameters array
    for ($i = 0; $i < count($params); $i++) {
        
        // If the search is a postal code
        if (is_numeric($params[$i])) {
            
            // Comment
            $query = $params[$i] . "%";
            $sql_deets = " postal_code LIKE '{$query}'";
            break;
        }
        
        else {
            
            //Comment
            $query = $params[$i] . "%";
            
            if (strcasecmp(strtolower($query), "us%") == 0) {
                $i++;
            }
            else {
                
                $result = CS50::query("SELECT * FROM places WHERE place_name LIKE '{$query}' OR admin_name1 LIKE '{$query}' OR admin_code1 LIKE '{$query}' OR admin_name2 LIKE '{$query}'");
                
                // foreach ($result as $address) {
                //     $temp = array_pop($result);
                //     array_push($temp_all, $temp);
                // }
                
                array_push($temp_all, $result);

            }
            
            
        }   

    }

    function my_serialize(&$arr,$pos){ 
      $arr = serialize($arr); 
    } 
    
    function my_unserialize(&$arr,$pos){ 
      $arr = unserialize($arr); 
    }
    // var_dump($temp_all);
    $serialized_all = [];
    foreach ($temp_all as $arr) {
        array_walk($arr, 'my_serialize');
        array_push($serialized_all, $arr);
    }
    
    $uniques = [];
    $diffs = [];
    for ($i = 0; $i < count($serialized_all); $i++) {
        if (count($uniques) < 2) {
            $uniques = array_diff($serialized_all[$i], $serialized_all[$i + 1]);
        }
        else {
            $uniques = array_diff($uniques, $serialized_all[$i]);
        }
        $diffs = array_diff($serialized_all[$i], $uniques);
    }
    
    var_dump($uniques);
    var_dump($diffs);

    
    
    // serialize sub-arrays
    // array_walk($cp_all, 'my_serialize');
    // var_dump($cp_all);
    
    // remove duplicates
    // $temp_unq = array_unique($cp_all, SORT_STRING);
    // var_dump($temp_unq);
    
    // // array difference
    // $matches = array_diff($cp_all, $temp_unq);
    // // var_dump($matches);
    
    // // unserialize difference
    // array_walk($matches, 'my_unserialize');
    
    // var_dump($matches);

    
    // $n = count($temp_array);
    // 
    // $matches = [];
    // for ($i = 0; $i < $n; $i++) {
    //     for ($j = 1; $j < $n + 1; $j++) {
    //         if (count($matches) < 1) {
    //             $matches = array_intersect($temp_array[$i], $temp_array[$j]);
    //         }
    //         else {
    //             $matches = array_intersect($temp_array[$i], $matches[$j]);
    //         }
    //     }
    // }

    // foreach ($matches as $match) {
    //     $temp = array_pop($matches);
    //     array_push($places, $temp);
    // }

    
    
    
    

    // $sql = "SELECT * FROM places WHERE" . $sql_deets;
    // $places = CS50::query($sql);

    // output places as JSON (pretty-printed for debugging convenience)
    // header("Content-type: application/json");
    // print(json_encode($places, JSON_PRETTY_PRINT));
?>