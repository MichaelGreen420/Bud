<?php

    require_once DOCUMENT_ROOT . 'utils/connections.php';
    require_once DOCUMENT_ROOT . 'utils/logging.php';

    function query($__query) {
        $result = mysqli_query(Connections::$MYSQL, $__query);

        if(!$result) {
            write_to_log ("MSQL Error. | . " . mysqli_error(Connections::$MYSQL));
        }

        return $result;
    }
?>
