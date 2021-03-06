<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 23-Mar-18
 * Time: 7:15 PM
 */
//include 'config.php';

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

        if ($result->num_rows > 0) {
            return $result->fetch_all();
        }
        $conn->close();
        return false;
    }
    public function get_books_meta($id,$meta_key=null){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        if($meta_key==null) {
            $sql = "SELECT * FROM books_meta WHERE book_id='$id'";
            $result = $conn->query($sql);
            $conn->close();
            return $result->fetch_all();
        }
        else{
            $sql = "SELECT meta_value FROM books_meta WHERE book_id='$id' AND meta_key='$meta_key'";
            $result = $conn->query($sql);
            $conn->close();
            return $result->fetch_all();
        }
    }
    public function get_all_tags()
    {
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT meta_value,book_id FROM books_meta WHERE meta_key='tag'";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
    }

    public function get_book_by_id($id){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql="select * from `books` where `id`=$id";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return ($result->fetch_all())[0];
        }
        return false;
    }

    public function get_all_borrowings(){

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }

        $sql="select * from `borrowings`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $temparr=array();
            while($row=$result->fetch_assoc()){
                $id=$row["id"];
                $book_id=$row["book_id"];
                $member_id=$row["member_id"];
                $book_tag=$row["book_tag"];
                $due_by=$row["due_by"];
                $authors = $this->get_books_meta($book_id,'author');

                if($authors)
                {
                    $tmpAuthor = "";
                    foreach ($authors as $author)
                    {
                        $tmpAuthor.= $author[0] . ", ";
                    }
                    $authors = substr($tmpAuthor,0,strlen($tmpAuthor)-2);
                }

                $status=$row["status"];
                $book_title = $this->get_book_by_id($book_id)[1];
                $member_name=$this->get_member_info_by_id($member_id,"name");
                $edition = $this->get_book_by_id($book_id)[2];
                $subject=$this->get_book_by_id($book_id)[3];
                if($status==0){
                    $status="Borrowed";
                }else{
                    $status="Returned";
                }

                $borrowingsarr=array("id" => $book_id,"subject"=>$subject,"edition"=>$edition,"books_title"=>$book_title,"member_name"=>$member_name,'authors'=>$authors,"book_tag"=>$book_tag,"due_by"=>$due_by,"status"=>$status);

                array_push($temparr,$borrowingsarr);

            }
            return $temparr;
        }
        return false;




    }


    public function get_books_count(){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT COUNT(*) FROM books";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
    }

    public function get_av_copies_count(){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT COUNT(*) FROM books_meta WHERE meta_key = 'tag'";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
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

    public function remove_book_author($book_id, $authors){
        $tmp = false;
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        for($i=0;$i<count($authors);$i++)
        {
            $sql = "DELETE FROM books_meta WHERE book_id = '$book_id' AND meta_key = 'author' AND meta_value = '$authors[$i]'";
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
            //Insert ID, Join date
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

    public function get_all_members(){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT * FROM members";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
    }

    public function get_members_meta($id,$meta_key=null){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        if($meta_key==null) {
            $sql = "SELECT * FROM members_meta WHERE member_id='$id'";
            $result = $conn->query($sql);
            $conn->close();
            return $result->fetch_all();
        }
        else{
            $sql = "SELECT meta_value FROM members_meta WHERE member_id='$id' AND meta_key='$meta_key'";
            $result = $conn->query($sql);
            $conn->close();
            return $result->fetch_all();
        }
    }

    public function set_members_info($id,$field,$value){            //Updates members table
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }

        $sql = "UPDATE members SET $field = '$value' WHERE members.id = $id";
        $result = $conn->query($sql);
        if (mysqli_affected_rows($conn) > 0) {
            return true;
        }

        return false;
    }

    public function set_members_meta($id,$meta_key,$meta_value){            //Updates members_meta table
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "UPDATE members_meta SET meta_value = '$meta_value' WHERE member_id = $id AND meta_key = '$meta_key'";

        $result = $conn->query($sql);
        if (mysqli_affected_rows($conn) > 0) {
            return true;
        }
        return false;

    }

    public function get_members_count(){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT COUNT(*) FROM members";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
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
            $sql = "INSERT INTO staffs (name, email, password, active) VALUES ('$name', '$email', MD5('$password'), 1)";
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
            $sql = "INSERT INTO managers (name, email, password, active) VALUES ('$name', '$email', MD5('$password'), 1)";
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
    public function get_all_managers(){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT * FROM managers";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
    }

    public function get_managers_count(){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT COUNT(*) FROM managers";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
    }

    public function get_all_staffs(){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT * FROM staffs";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
    }

    public function get_staffs_count(){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT COUNT(*) FROM staffs";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
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
    public function loan_book($book_id, $member_id, $book_tag, $due_by){
        $tmp = false;

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        if($this->is_book_available($book_id,$book_tag)!= null) {
            $sql = "INSERT INTO borrowings (book_id, member_id, book_tag, due_by, status) VALUES ('$book_id','$member_id','$book_tag','$due_by',0)";
            $result = $conn->query($sql);
            if (mysqli_affected_rows($conn) > 0) {
                $sql = "DELETE FROM books_meta WHERE meta_value = '$book_tag'";
                $result = $conn->query($sql);
                $tmp = true;
            } else {
                $tmp = false;
            }
            $conn->close();
            return $tmp;
        }
        else {
            return false;
        }
    }

    public function retrieve_book($book_id,$book_tag){
        $tmp = false;

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        if ($this->is_book_borrowed($book_id,$book_tag)!=null){
            $sql = "UPDATE borrowings SET status = 1 WHERE book_id = $book_id AND book_tag = '$book_tag'";
            $result = $conn->query($sql);
            if (mysqli_affected_rows($conn) > 0) {
                $sql = "INSERT INTO books_meta (book_id, meta_key, meta_value) VALUES ('$book_id','tag','$book_tag')";
                $result = $conn->query($sql);
                $tmp = true;
            } else {
                $tmp = false;
            }
            $conn->close();
            return $tmp;
        }
    }

    function is_book_available($book_id, $book_tag){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT id FROM books_meta WHERE book_id = '$book_id' AND meta_value = '$book_tag'";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
    }

    function is_book_borrowed($book_id, $book_tag){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT id FROM borrowings WHERE book_id = '$book_id' AND book_tag = '$book_tag' AND status = 0";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
    }
    function count_borrowed_book(){
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);
        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "SELECT COUNT(*) FROM borrowings WHERE status=0";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_all();
    }

    public function set_book_info($id,$field,$value){            //Updates members table
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }

        $sql = "UPDATE books SET $field = '$value' WHERE books.id = $id";
        $result = $conn->query($sql);
        if (mysqli_affected_rows($conn) > 0) {
            return true;
        }

        return false;
    }

    public function set_book_meta($id,$meta_key,$meta_value){            //Updates members_meta table
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $sql = "UPDATE members_meta SET meta_value = '$meta_value' WHERE member_id = $id AND meta_key = '$meta_key'";

        $result = $conn->query($sql);
        if (mysqli_affected_rows($conn) > 0) {
            return true;
        }
        return false;

    }


    public function check_credentials($email,$password,$type){
        $tmp = false;

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
            if ($type=="staff")
            {
                $sql = "SELECT * FROM `staffs` WHERE `email` = '$email' AND `password` = MD5('$password')";
            }
            else
            {
                $sql = "SELECT * FROM `managers` WHERE `email` = '$email' AND `password` = MD5('$password')";
            }
            $result = $conn->query($sql);

            if($result->fetch_assoc() != null)
            {
                return true;
            }
            else
            {
                return false;
            }
    }
    public function get_member_info_by_id($id,$field){

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);
        // Check connection
        if ($conn->connect_error) {
            return false;
        }

        $sql="SELECT $field FROM `members`WHERE `id`= '$id'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return ($result->fetch_all())[0][0];
        }
        return false;




    }


    public function get_member_meta_info_by_id($id,$key){
        //connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);
        if ($conn->connect_error) {
            return false;
        }

        $sql="SELECT `meta_value` FROM `members_meta` WHERE `member_id`= '$id' and `meta_key`='$key'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return ($result->fetch_all())[0][0];
        }
        return false;

    }


    // Create connection

    public function get_user_info_by_email($email,$type,$field)
    {

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        if($type=="staff")
        {
            $sql = "SELECT $field FROM `staffs` WHERE `email` = '$email'";
        }
        else
        {
            $sql = "SELECT $field FROM `managers` WHERE `email` = '$email'";
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return ($result->fetch_all())[0][0];
        }
        return false;
    }

    public function get_user_info_by_id($uid,$type,$field)
    {

        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        if($type=="staff")
        {
            $sql = "SELECT $field FROM `staffs` WHERE `id` = $uid";
        }
        else
        {
            $sql = "SELECT $field FROM `managers` WHERE `id` = $uid";
        }

        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            return ($result->fetch_all())[0][0];
        }
        return false;
    }




    public function insert_session($email,$type,$code)
    {
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        $uid = $this->get_user_info_by_email($email,$type,'id');
        $ua = $_SERVER['HTTP_USER_AGENT'];
        $sql = "INSERT INTO `sessions` (`id`, `user_id`, `type`, `code`, `user_agent`, `created_at`) VALUES (NULL,$uid, '$type', '$code', '$ua', CURRENT_TIMESTAMP);";
        $result = $conn->query($sql);

        return $result;
    }

    public function get_session($code)
    {
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }

        $sql = "SELECT * FROM `sessions` WHERE `code` = '$code' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return ($result->fetch_all())[0];
        }

        return false;

    }

    public function update_user_profile($id,$type,$field,$value)
    {
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        if($type=="staff"){
            $sql = "UPDATE `staffs` SET `$field` = '$value' WHERE `staffs`.`id` = $id;";
        }
        else
        {
            $sql = "UPDATE `managers` SET `$field` = '$value' WHERE `managers`.`id` = $id;";
        }
        $result = $conn->query($sql);
        if (mysqli_affected_rows($conn) > 0) {
            return true;
        }
        return false;
    }

    public function delete_session($code)
    {
        // Create connection
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_DB);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }

        $sql = "DELETE * FROM `sessions` WHERE `code` = '$code' LIMIT 1";
        $result = $conn->query($sql);
        return true;
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

class authenticator{
    public function __construct()
    {
        $this->db = new db();
    }
    public function authenicate($email,$pass,$type)
    {
        $db = new db();


        if($db->check_credentials($email,$pass,$type))
        {
            $phpsesid = md5($db->generateRandomString());

            if($db->insert_session($email,$type,$phpsesid))
            {
                $cookie = new \Delight\Cookie\Cookie('PHPSESID');
                $cookie->setValue($phpsesid);
                $cookie->setMaxAge(60 * 60 * 24);
                $cookie->setPath('/');
                $cookie->setSameSiteRestriction('Strict');
                $cookie->save();
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function isAuthenicated()
    {

        if(\Delight\Cookie\Cookie::exists('PHPSESID'))
        {
            $db = new db();
            $phpsesid =  \Delight\Cookie\Cookie::get('PHPSESID');
            $session = $db->get_session($phpsesid);

            if ($session)
            {
                return $session;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function inAuth()
    {
        if(\Delight\Cookie\Cookie::exists('PHPSESID'))
        {
            $db = new db();
            $phpsesid =  \Delight\Cookie\Cookie::get('PHPSESID');
            $session = $db->delete_session($phpsesid);
            $phpsesid = new \Delight\Cookie\Cookie('PHPSESID');
            $phpsesid->delete();
        }
    }
}


$check = new db();
$check2 = new authenticator();

//$check->get_all_books();
//$check->remove_from_stock('17',array('A6VG','Zetd'));
//$check->delete_book("19");
//check->remove_from_stock("20", array('BCKKWMdF', 'EkKJ94xa'));
//$check->insert_books("Pathshala","3rd","bangla", array("jelly"),20);
//$check->add_members("Lal mia","lal@red.com","01791225515","student","20161003010","22 MAR 18");
//$check->remove_member("9");
//$check->add_manager_staff("Masud","example@ex.com","1234","staff");
//$check->remove_manager_staff("1", "manager");
//$check->loan_book("20","1","DAQ1J0yZ","2018-03-30");
//$check->is_book_available("20","DAQ1J");
//$check->is_book_borrowed("20","DAQ1J0yZ");
//$check->retrieve_book("20","DAQ1J0yZ");
//$check->get_all_books();
//$check->get_user_info_by_id(5,'manager','email');
//$check->insert_session('ieitlabs@gmail.com','manager','asdfasdfasdf6er6a5dfasdf');
//$check2->authenicate("zamanpranto@gmail.com","test1234","manager");
//var_dump($check2->isAuthenicated());
//var_dump($check->get_all_borrowings());