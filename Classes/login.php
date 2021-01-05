<?php
require_once 'database.php';
class Login extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM registration WHERE " . "(phone='$username')" . " AND (password='$password')";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            $user_info = mysqli_fetch_assoc($query_result);
            if ($user_info) {
                session_start();
                $_SESSION['user_id'] = $user_info['id'];
                header('Location: index.php');
            } else {
                echo '<h4 id="deleteMsg"> Your Phone Number/Username or password invalid </h4>';
            }
        } else {
            echo '<h4 id="deleteMsg"> Fail</h4>';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php');
    }

}
?>
