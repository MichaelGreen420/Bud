<?php

    //FOR DEBUGGING ONLY
    ini_set('display_errors', 1); //PRODUCTION SET TO "0"
    ini_set('error_reporting', E_ALL);

    define ('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/phpclass/');

    require_once DOCUMENT_ROOT . 'data/database.php';

    require_once DOCUMENT_ROOT . 'data/authentication.php';

    //mimic form input
    $_POST['request'] = 'register';
    $_POST['user'] = 'rach';
    $_POST['password'] = 'test1';

    //What request are we fullfilling
    $request = $_POST['request'];
    
    //Initialize a response to the user
    $response = "The request was unhandled.";

    //Determine which request has been made
    switch($request) {
        case 'register':
            $response = register($_POST['user'], $_POST['password']);

            break;

        case 'get_id':

            break;

        default:

            break;
    }
    
    //if the response is true assign a 
    if ($response === true) {
        $response = "Success!";
    } 

    echo "<h1>$response</h1>";
?>
