<?php

class Database {

    public $db_connect;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "userdb";
        $this->db_connect = mysqli_connect($servername, $username, $password, $dbname);
        if (!$this->db_connect) {
            die('Connection Fail' . mysqli_error($this->db_connect));
        }
    }

    public function select($column, $tablename, $condition) {
        $sql = "SELECT " . $column . " FROM " . $tablename . " " . $condition;
        $query = mysqli_query($this->db_connect, $sql);
        return $query;
    }

    public function insert($tablename, $column, $values) {
        $sql = "INSERT INTO " . $tablename . " " . $column . " VALUES " . $values;

        $query = mysqli_query($this->db_connect, $sql);
        $message = '';
        if ($query) {
            $message = "<h4 id='successMsg'> New Record Created Successfully</h4>";
        } else {
            $message = "<h4 id='deleteMsg'> Error </h4>";
        }
        $_SESSION['msg'] = $message;
    }

    public function update($tablename, $column, $id) {
        $sql = "UPDATE " . $tablename . " SET " . $column . " WHERE id=" . $id;

        $message = '';
        $query = mysqli_query($this->db_connect, $sql);
        $message = '';
        if ($query) {
            $message = "<h4 id='successMsg'>Updated Successfully</h4>";
        } else {
            $message = "<h4 id='deleteMsg'> Error </h4>";
        }
        $_SESSION['msg'] = $message;
    }

    public function delete($id, $tablename, $condition) {
        $sql = "DELETE from " . $tablename . " where " . $condition . "=" . $id;
        $query = mysqli_query($this->db_connect, $sql);
        $message = '';
        if ($query) {
            $message = "<h4 id='deleteMsg'> Deleted successfully</h4>";
        } else {
            $message = "<h4 id='deleteMsg'> Error </h4>";
        }
        $_SESSION['msg'] = $message;
    }

}

class Session {

    public function sessionStart() {
        session_start();
    }

    public function sessionCheck() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php');
        }
    }

}

class Pagination {

    public $totalpages;
    public $currentpage;

    public function paginate($totalpages, $currentpage) {

        echo '<br><center>';
        $range = 1;
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'>FirstPage</a> ";
        $prevpage = $currentpage - 1;
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
        for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
            if (($x > 0) && ($x <= $totalpages)) {
                if ($x == $currentpage) {
                    echo "<a><b id='currentPage'>$x</b></a>";
                } else {
                    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
                }
            }
        }
        $nextpage = $currentpage + 1;
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>LastPage</a> ";
        echo '</center>';
    }
    public function photoGalleryPagination($totalpages, $currentpage,$id,$name) {

        echo '<br><center>';
        $range = 1;?>
        <a href=photoGallery.php?currentpage=<?=1?>&album_id=<?=$id?>&name=<?=$name?>>FirstPage</a>
        <?php
        $prevpage = $currentpage - 1;
        echo " <a href='photoGallery.php?currentpage=$prevpage&album_id=$id&name=$name'><</a> ";
        for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
            if (($x > 0) && ($x <= $totalpages)) {
                if ($x == $currentpage) {
                    echo "<a><b id='currentPage'>$x</b></a>";
                } else {
                    echo " <a href='photoGallery.php?currentpage=$x&album_id=$id&name=$name'>$x</a> ";
                }
            }
        }
        $nextpage = $currentpage + 1;
        echo " <a href='photoGallery.php?currentpage=$nextpage&album_id=$id&name=$name'>></a> ";
        echo " <a href='photoGallery.php?currentpage=$totalpages&album_id=$id&name=$name'>LastPage</a> ";
        echo '</center>';
    }

}

class User {

    public function pageinfo($table, $column, $condition, $rowsperpage) {
        $database = new Database();
        $currentpage = 0;
        $result = $database->select($column, $table, $condition);
        $totalRow = $result->num_rows;
        $totalpages = ceil($totalRow / $rowsperpage);
        if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
            $currentpage = (int) $_GET['currentpage'];
        } else {
            $cucrrentpage = 1;
        }
        if ($currentpage > $totalpages) {
            $currentpage = $totalpages;
        }
        if ($currentpage < 1) {
            $currentpage = 1;
        }
        $offset = ($currentpage - 1) * $rowsperpage;
        $limit = "LIMIT $offset, $rowsperpage";
        $condition = "$condition $limit";
        $result = $database->select($column, $table, $condition);
        $resultArr = [
            'result' => $result,
            'totalpages' => $totalpages,
            'currentpage' => $currentpage
        ];
        return $resultArr;
    }

}

?>