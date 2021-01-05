<?php
require_once '../Classes/database.php';
if (isset($_POST['get_option'])) {
    $database = new Database();
    $dist = $_POST['get_option'];
    $table = "thana";
    $column = "*";
    $condition = "where district_id='$dist'group by name";
    $result = $database->select($column, $table, $condition);
    ?>
    <option>--- Select Thana ---</option>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
    }
    exit;
}
?>