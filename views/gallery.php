<html>
    <?php
    require_once 'header.php';
    $page = 'showGallery';
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
                    <h2>Gallery Album</h2>
                    <?php
                    $table = "album";
                    $column = "*";
                    $condition = "";
                    $rowsperpage = 4;
                    $user = new User;
                    $resultArr = $user->pageinfo($table, $column, $condition,$rowsperpage);
                    if ($resultArr['result']->num_rows > 0) {
                        while ($row = $resultArr['result']->fetch_assoc()) {
                            if (!empty($row['cover_photo'])) {
                                echo '<a href=photoGallery.php?album_id='. $row['id'] .'&name=' . $row['name'] .'>'
                                . '<div class="pic">'
                                . '<img  src="../image/' . $row['cover_photo'] . '" width="200" height="200" />'
                                . '<h3 id="albumName">' . $row['name'] . '</h3></div></a>';
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
                    $pagination->paginate($totalpages, $currentpage);
                    ?>
                </div>
            </article> 
        </div>
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>