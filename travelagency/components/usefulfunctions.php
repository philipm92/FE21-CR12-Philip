<?php
$filesAllowed = ["png", "jpg", "jpeg", "webp", "jfif"];


function debug_to_console($data) {
    $output = $data;
    if (is_array($output)) {
        $output = implode(',', $output);
        echo "<script>console.log('$output');</script>";
    }
    elseif (is_string($output)) echo '<script>console.log("'.$output.'");</script>';
	else echo "<script>console.log('$output');</script>";
}

function formatted_dump($obj, $print_to_console=FALSE) {
	if ($print_to_console) debug_to_console($obj);
	else echo "<pre>". var_dump($obj) ."</pre>";
}

function CleanInput($string) { // sanitize user input to prevent sql injection
    $new_string = trim($string);
    $new_string = strip_tags($new_string);
    $new_string = htmlspecialchars($new_string);
    return $new_string;
}

// NOT NEEDED!!! still useful though
// function CreateSelectDropDown($sql, $default = NULL) {
//     global $db;
//     $select_string = "";
//     $result = $db->query($sql)->fetchArray();
//     #echo gettype($result["Type"]);
//     if (count($result) > 0 ) $option_array = explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $result["Type"]));
//     if (isset($option_array)) {
//         foreach($option_array as $option) {
//             if ($option == $default) $select_string .= "<option selected value='{$default}'>".ucfirst($default)."</option>";
//             else $select_string .= "<option value='$option'>".ucfirst($option)."</option>";
//         }
//     } else $select_string = "<li>Status not available</li>";
//     return $select_string;
// }


function GetQueryData($rows) {
    $data = new stdClass();
    $data->head = array();
    $data->body = array();
    $first = TRUE; // fill head only once
    $i = 0; // make sure we are on the right row
    foreach ($rows as $row) {
        $data->body[$i] = array();
        foreach ($row as $key => $value) {
            if ($first) $data->head[] = $key;
            $data->body[$i][$key] = $value;
        }
        $i++;
        $first = FALSE;
    }
    return $data;
}

// TODO
function ConvertSQLToHTMLType($rows) {
    return FALSE;
}


function InRange($x, $lo, $hi) { return ($x >= $lo) && ($x <= $hi); }


?>