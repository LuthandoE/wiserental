
<?php

set_error_handler('lueErrorHandler', E_ALL);

function lueErrorHandler($number, $text, $theFile, $theLine)
{
    if (ob_get_length())
        ob_clean();
    $errorMessage = 'Error: ' . $number . chr(10) . 'Message: ' . $text . chr(10) .
        'File: ' . $theFile . chr(10) . 'Error: ' . $theLine;

     
     echo  "<script> alert('".$errorMessage."');</script>";
   // exit;
}
function test_input($data)
{
    $data = trim($data);
    $data = strip_tags(trim($data));
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}
?>

