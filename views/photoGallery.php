<html>
    <?php
    require_once 'header.php';
    $page = 'showGallery';
    $database = new Database();
    ?>
    <body>
        <div class="contain">
            <?php
            require_once 'nav.php';
            ?>
            <article>
                <div class="mrg">
                    <?php
                    echo "<center><h2> Welcome to ";
                    $album_name = $_GET['name'];
                    echo $album_name;
                    echo "</h2></center>";
                    $album_id = $_GET['album_id'];
                    $table = "image";
                    $column = "*";
                    $condition = "WHERE album_id='$album_id'";
                    $rowsperpage = 4;
                    $user = new User;
                    $resultArr = $user->pageinfo($table, $column, $condition, $rowsperpage);
                    if ($resultArr['result']->num_rows > 0) {
                        while ($row = $resultArr['result']->fetch_assoc()) {
                            if (!empty($row['photo'])) {

                                if (isset($_SESSION['user_id'])) {
                                    echo '<div class="pic"><img src="../image/' . $row['photo'] . '" width="200" height="200" />';
                                    echo '<h3><center>
                                        <a href=photoEdit.php?user_id=' . $row['id'] . '><button class="updatebtn">Edit</button></a>';
                                    ?>
                                    <a href="../controller/photoDelete.php?user_id= <?= $row['id'] ?>" ><button class="cancelbtn" onclick="return confirm('Do you want to delete?')">Delete</button></a>
                                    <?php
                                    echo '</h3></center></div>';
                                } else {
                                    echo '<img class="pic" src="../image/' . $row['photo'] . '" width="200" height="200" />';
                                }
                            } else {
                                echo "0 results";
                            }
                        }
                    }
                    ?>
                </div>
                <div class="pagination"><br>
                    <?php
                    $totalpages = $resultArr['totalpages'];
                    $currentpage = $resultArr['currentpage'];
                    $pagination = new Pagination();
                    $pagination->photoGalleryPagination($totalpages,$currentpage,$album_id,$album_name);
                    ?>
                </div>
            </article> 
        </div>

        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>