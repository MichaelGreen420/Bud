<?php
    /**
    * Registers the given user
    * 
    * @param string $__user The username to register
    * @param string $__pass The password to use
    * 
    * @return string / boolean Returns true on success,
    * and returns an error message on failure
    * 
    */

    require_once DOCUMENT_ROOT . 'utils/connections.php';
    require_once DOCUMENT_ROOT . 'data/querying.php';

    function register ($__user, $__pass) {
        $__user = mysqli_real_escape_string(Connections::$MYSQL, $__user);
        $__pass = mysqli_real_escape_string(Connections::$MYSQL, $__pass);

        $__user = trim($__user);
        $__pass = trim($__pass);

        if (strlen($__user) <= 3) {
            return "The username was too short, please make it greater than 3 characters";
        } else if (strlen($__user) > 25) {
                return "The username was too long, please make it less than 26 characters";
            } else if (strlen($__pass) < 5) {
                    return "The password was too short, please make it at least than 5 characters";
                } else if (strlen($__pass) > 50) {
                        return "The password was too long, please make it less than 50 characters";
                    }

                    //test for a duplicate username
        //$query = sprintf("SELECT username FROM USERS WHERE username = '$__user'");
        //$result = query($query);

        $query = sprintf("INSERT INTO USERS (username, password) VALUES ".
        "('%s', '%s')", $__user, $__pass
        ); //echo "<div>$query</div>";
        $result = query($query);

        if ($result) {
            return true;
        } else {
            return "We're having technical issues, please try later.";
        }
    }
?>
