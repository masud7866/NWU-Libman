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
            return false;
        }
        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_assoc();
    }

    public function insert_books($title, $edition, $subject, $author, $in_stock){
        $tmp = false;

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "INSERT INTO books (title, edition, subject) VALUES ('$title', '$edition', '$subject')";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            $last_id = $conn->insert_id;
            //Insert Author
            for($i=0;$i<count($author);$i++)
            {
                $sql = "INSERT INTO books_meta (book_id, meta_key, meta_value) VALUES ('$last_id', 'author', '$author[$i]')";
                $result = $conn->query($sql);
            }
            for($i=0;$i<$in_stock;$i++)
            {
                $random = $this->generateRandomString();
                $sql = "INSERT INTO books_meta (book_id, meta_key, meta_value) VALUES ('$last_id', 'tag', '$random')";
                $result = $conn->query($sql);
            }

            $tmp = true;
        }
        else {
            $tmp = false;
        }
        $conn->close();

        return $tmp;
    }

    function add_to_stock($book_id, $count){
        $tmp = false;
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        for($i=0;$i<$count;$i++)
        {
            $random = $this->generateRandomString();
            $sql = "INSERT INTO books_meta (book_id, meta_key, meta_value) VALUES ('$book_id', 'tag', '$random')";
            $result = $conn->query($sql);
            $tmp = true;
        }
        $conn->close();
        return $tmp;
    }

    function remove_from_stock($book_id, $tags){
        $tmp = false;
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        for($i=0;$i<count($tags);$i++)
        {
            $random = $this->generateRandomString();
            $sql = "DELETE FROM books_meta WHERE book_id = '$book_id' AND meta_value = '$tags[$i]'";
            $result = $conn->query($sql);
            if ($result==true)
            {
                $tmp = true;
            }
            else{
                $tmp = false;
            }

        }
        $conn->close();
        echo $tmp;
        return $tmp;
    }

    public function add_members($name, $email, $phone, $type, $id, $join_date){
        $tmp = false;

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "INSERT INTO members (name, email, phone, type) VALUES ('$name', '$email', '$phone', '$type')";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            $last_id = $conn->insert_id;
            //Insert Author
            $sql = "INSERT INTO members_meta (member_id, meta_key, meta_value) VALUES ('$last_id', 'id', '$id')";
            $result = $conn->query($sql);
            $sql = "INSERT INTO members_meta (member_id, meta_key, meta_value) VALUES ('$last_id', 'joined', '$join_date')";
            $result = $conn->query($sql);
            $tmp = true;
        }
        else {
            $tmp = false;
        }
        $conn->close();

        return $tmp;
    }

   function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

$check = new db();
//$check->get_all_books();
//$check->remove_from_stock('17',array('A6VG','Zetd'));
$check->add_members("Lal mia","lal@red.com","01791225515","studet","20161003010","22-01-18");