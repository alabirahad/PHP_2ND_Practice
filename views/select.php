<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/address.js" type="text/javascript"></script>
    </head>
    <body>
        <label>Address:</label><br>
        <div>
            <select class="select-box" name="division" onchange="fetch_select(this.value);">
                <option value="0">--- Select Division ----</option>
                <?php
                require_once '../Classes/database.php';
                $database = new Database();
                $table = "division";
                $column = "*";
                $condition = "group by name";
                $select = $database->select($column, $table, $condition);
                while ($row = mysqli_fetch_array($select)) {
                    echo "<option value=" . $row['id'] . " " . (!empty($userInfo->division) && ($row['id'] == $userInfo->division) ? 'selected' : '') . ">" . $row['name'] . "</option>";
                }
                ?>
            </select>
            <select class="select-box" name="district" id="selectDistrict" onchange="fetch_select_thana(this.value);">
                <option value="0">--- Select District ---</option>
                <?php
                if (!empty($userInfo->district)) {
                    $table = "district";
                    $column = "*";
                    $condition = "group by name";
                    $select = $database->select($column, $table, $condition);
                    while ($row = mysqli_fetch_array($select)) {
                        echo "<option value=" . $row['id'] . " " . (!empty($userInfo->district) && ($row['id'] == $userInfo->district) ? 'selected' : '') . ">" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select>
            <select class="select-box" name="thana" id="selectThana">
                <option>--- Select Thana ---</option>
                <?php
                if (!empty($userInfo->thana)) {
                    $table = "thana";
                    $column = "*";
                    $condition = "group by name";
                    $select = $database->select($column, $table, $condition);
                    while ($row = mysqli_fetch_array($select)) {
                        echo "<option value=" . $row['id'] . " " . (!empty($userInfo->thana) && ($row['id'] == $userInfo->thana) ? 'selected' : '') . ">" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>     
    </body>
</html>