<?php
// FokusKonten PHP 8.2 Compatibility Shield & MySQL Extension Polyfill
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

global $GLOBAL_MYSQLI_CONN;

if (!function_exists('mysql_connect')) {
    function mysql_connect($server = "localhost", $username = "root", $password = "", $new_link = false, $client_flags = 0) {
        global $GLOBAL_MYSQLI_CONN;
        mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($server, $username, $password);
        if ($conn) {
            $GLOBAL_MYSQLI_CONN = $conn;
            return $conn;
        }
        return false;
    }

    function mysql_select_db($database_name, $link_identifier = null) {
        global $GLOBAL_MYSQLI_CONN;
        $conn = $link_identifier ?: $GLOBAL_MYSQLI_CONN;
        if ($conn) {
            return @mysqli_select_db($conn, $database_name);
        }
        return false;
    }

    function mysql_query($query, $link_identifier = null) {
        global $GLOBAL_MYSQLI_CONN;
        $conn = $link_identifier ?: $GLOBAL_MYSQLI_CONN;
        if ($conn) {
            return @mysqli_query($conn, $query);
        }
        return false;
    }

    function mysql_fetch_array($result, $result_type = MYSQLI_BOTH) {
        if ($result instanceof mysqli_result) {
            return @mysqli_fetch_array($result, $result_type);
        }
        return false;
    }

    function mysql_fetch_assoc($result) {
        if ($result instanceof mysqli_result) {
            return @mysqli_fetch_assoc($result);
        }
        return false;
    }

    function mysql_fetch_object($result, $class_name = null, $params = null) {
        if ($result instanceof mysqli_result) {
            if ($class_name) {
                return @mysqli_fetch_object($result, $class_name, $params);
            }
            return @mysqli_fetch_object($result);
        }
        return false;
    }

    function mysql_fetch_row($result) {
        if ($result instanceof mysqli_result) {
            return @mysqli_fetch_row($result);
        }
        return false;
    }

    function mysql_num_rows($result) {
        if ($result instanceof mysqli_result) {
            return @mysqli_num_rows($result);
        }
        return 0;
    }

    function mysql_free_result($result) {
        if ($result instanceof mysqli_result) {
            return @mysqli_free_result($result);
        }
        return true;
    }

    function mysql_affected_rows($link_identifier = null) {
        global $GLOBAL_MYSQLI_CONN;
        $conn = $link_identifier ?: $GLOBAL_MYSQLI_CONN;
        if ($conn) {
            return @mysqli_affected_rows($conn);
        }
        return -1;
    }

    function mysql_insert_id($link_identifier = null) {
        global $GLOBAL_MYSQLI_CONN;
        $conn = $link_identifier ?: $GLOBAL_MYSQLI_CONN;
        if ($conn) {
            return @mysqli_insert_id($conn);
        }
        return 0;
    }

    function mysql_error($link_identifier = null) {
        global $GLOBAL_MYSQLI_CONN;
        $conn = $link_identifier ?: $GLOBAL_MYSQLI_CONN;
        if ($conn) {
            return @mysqli_error($conn);
        }
        return '';
    }

    function mysql_real_escape_string($unescaped_string, $link_identifier = null) {
        global $GLOBAL_MYSQLI_CONN;
        $conn = $link_identifier ?: $GLOBAL_MYSQLI_CONN;
        if ($conn) {
            return @mysqli_real_escape_string($conn, $unescaped_string);
        }
        return addslashes($unescaped_string);
    }
}

$dbUser = "root";
$dbPass = "";
$dbName = "ataz";
$dbHost = "localhost";

mysql_connect($dbHost, $dbUser, $dbPass);
mysql_select_db($dbName);
?>