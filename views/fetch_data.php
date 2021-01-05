<?php
require_once '../Classes/database.php';
if (isset($_POST['get_option'])) {
    $database = new Database();
    $division = $_POST['get_option'];
    $table = "district";
    $column = "*";
    $condition = "where division_id='$division'group by name";
    $result = $database->select($column, $table, $condition);
    ?>
    <option value="0">--- Select District ---</option>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
    }
}
?>