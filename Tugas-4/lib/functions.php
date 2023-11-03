
<?php
require_once __DIR__ . "/../vendor/autoload.php"; 

function getJSON($jsonResponse){
    $data = json_decode($jsonResponse);

    // Check if the JSON decoding was successful
    if ($data !== null) {
        // Access the values
        $success = $data->success; // true
        $message = $data->message; // "Update successful"

        // Now you can use $success and $message in your PHP code
        if ($success) {
            $val = true;
        } else {
            $val = false;
        }
    } else {
        // JSON parsing failed
        $val = "error";
    }
    return $val;
}

function base_url(){
    $base = $_ENV["BASE_URL"];
    return $base;
}

function ShowCheckBoxValue($val){
    if($val===0){
        $result = "Tidak";
    } else {
        $result = "Ya";
    }
    return $result;
}

function setTheme(){
    $theme = $_ENV["THEME"];
    return $theme;
}

function getHeader($theme_name){
    if($theme_name=="default"){
        include("../themes/".$theme_name."/header.php"); 
        include("../themes/".$theme_name."/upper_block.php");
    }
    
    if($theme_name=='fobia' || $theme_name=='compass'){
        include("../themes/".$theme_name."/header.php"); 
        include("../themes/".$theme_name."/leftmenu.php"); 
        include("../themes/".$theme_name."/topnav.php");
        include("../themes/".$theme_name."/upper_block.php");
    } 
   
    if($theme_name=="flat"){
        include("../themes/".$theme_name."/header.php"); 
        include("../themes/".$theme_name."/topnav.php");
        include("../themes/".$theme_name."/upper_block.php");
    }
}

function getFooter($theme_name, $extra){
    if($theme_name=="flat"){
        include("../themes/".$theme_name."/lower_block.php");
        include("../themes/".$theme_name."/leftmenu.php"); 
        echo $extra;
        include("../themes/".$theme_name."/footer.php"); 
    } else {
        include("../themes/".$theme_name."/lower_block.php"); 
        echo $extra;
        include("../themes/".$theme_name."/footer.php"); 
    }
    
    echo '</body>
    </html>';
}

function getFilename(){
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    $url = "http://".$host.$uri;
    $parsed_url = parse_url($url);

    // Get the path from the parsed URL
    $path = $parsed_url["path"];

    // Use pathinfo to extract the filename
    $file_info = pathinfo($path);

    // Get the filename
    $filename = $file_info["basename"];

    return $filename;
}
?>
