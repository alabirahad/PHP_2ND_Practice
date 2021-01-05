<html>
    <?php
    require_once 'header.php';
    $page = 'manageGallery';
    $session = new Session();
    $session->sessionCheck();
    require_once '../controller/image.php';
    ?>
    <body>
        <div class="contain">
            <?php
            require_once 'nav.php';
            ?>
            <article>
                <?php
                if ((isset($_SESSION['msg'])) && (!empty($_SESSION['msg']))) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    header("Refresh:2");
                }
                ?>
                <div class="mrg">
                    <h2>Upload New Photo</h2>
                    <form name="myform2" action="manageGallery.php" method="POST" enctype="multipart/form-data">
                        <label>Select Album:</label><br>
                        <select class="select-box" name="album" onclick="fetch_select(this.value);">
                            <option>Album</option>
                            <?php
                            require_once '../Classes/database.php';
                            $database = new Database();
                            $table = "album";
                            $column = "*";
                            $condition = "";
                            $result = $database->select($column, $table, $condition);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value=" . $row['id'] . " >" . $row['name'] . "</option>";
                            }
                            ?>
                        </select><br>
                        <label>Insert Image:</label><br>
                        <input type="file"  name="photo" required><br><br>
                        <button type="submit" value="submit" name="submit_photo">Upload Image</button>
                    </form>
                </div>
            </article> 
        </div>
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>