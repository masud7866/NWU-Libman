<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 23-Mar-18
 * Time: 7:15 PM
 */

include "config.php";
class db{
    public function get_all_books(){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        $conn->close();
    }
}

$check = new db();
$check->get_all_books();