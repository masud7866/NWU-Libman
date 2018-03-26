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
    public function delete_book($book_id){
        $tmp = false;

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "DELETE FROM books WHERE id= $book_id";
        $result = $conn->query($sql);
        if (mysqli_affected_rows($conn)>0)
        {
            $tmp = true;
        }
        else{
            $tmp = false;
        }
        $conn->close();
        return $tmp;
    }

    public function add_to_stock($book_id, $count){
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

    public function remove_from_stock($book_id, $tags){
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
            if (mysqli_affected_rows($conn)>0)
            {
                $tmp = true;
            }
            else{
                $tmp = false;
            }

        }
        $conn->close();
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

    public function remove_member($member_id){
        $tmp = false;

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "DELETE FROM members WHERE id= $member_id";
        $result = $conn->query($sql);
        if (mysqli_affected_rows($conn)>0)
        {
            $tmp = true;
        }
        else{
            $tmp = false;
        }
        $conn->close();
        return $tmp;
    }

    public function add_manager_staff($name, $email, $password, $type){
        $tmp = false;

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        if($type=="staff"){
            $sql = "INSERT INTO staffs (name, email, password, active) VALUES ('$name', '$email', '$password', 1)";
            $result = $conn->query($sql);
            if ($result === TRUE) {

                $tmp = true;
            }
            else {
                $tmp = false;
            }
            $conn->close();
            return $tmp;
        }
        else {
            $sql = "INSERT INTO managers (name, email, password, active) VALUES ('$name', '$email', '$password', 1)";
            $result = $conn->query($sql);
            if ($result === TRUE) {

                $tmp = true;
            } else {
                $tmp = false;
            }
            $conn->close();
            return $tmp;
        }
    }

    public function remove_manager_staff($manager_staff_id, $type){
        $tmp = false;

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        if($type=="staff"){
            $sql = "DELETE FROM staffs WHERE id= $manager_staff_id";
            $result = $conn->query($sql);
            if (mysqli_affected_rows($conn)>0)
            {
                $tmp = true;
            }
            else{
                $tmp = false;
            }
            $conn->close();
            return $tmp;
        }
        else {
            $sql = "DELETE FROM managers WHERE id= $manager_staff_id";
            $result = $conn->query($sql);
            if (mysqli_affected_rows($conn) > 0) {
                $tmp = true;
            } else {
                $tmp = false;
            }
            $conn->close();
            return $tmp;
        }
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
//$check->delete_book("19");
//check->remove_from_stock("20", array('BCKKWMdF', 'EkKJ94xa'));
//$check->insert_books("Pathshala","3rd","bangla", array("jelly"),20);
//$check->add_members("Lal mia","lal@red.com","01791225515","student","20161003010","22 MAR 18");
//$check->remove_member("9");
//$check->add_manager_staff("Masud","example@ex.com","1234","staff");
$check->remove_manager_staff("1", "manager");