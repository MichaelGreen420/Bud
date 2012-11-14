<?php

    require_once DOCUMENT_ROOT . 'utils/connections.php';

    date_default_timezone_set('America/Los_Angeles');

    $directory = DOCUMENT_ROOT . 'logs/';
    $file_name = date("m_d_y"). ".txt";

    Connections::$LOG = fopen($directory . $file_name, "a");

    function write_to_log () {
        fwrite(Connections::$LOG, date("F j, Y | g:i:s:") . " | ".$__messages . "\r\n");
    }
?>
