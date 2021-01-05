<html>
    <?php
    require_once 'header.php';
    $page = 'manageGallery';
    $session = new Session();
    $session->sessionCheck();
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
                    <h2>Album List </h2>
                    <?php
                    echo "<table cellpadding=5 cellspacing=0>"
                    . "<thead>"
                    . "<tr>"
                    . "<th>Cover Photo</th>"
                    . "<th>Album Name</th>"
                    . "<th colspan=2>Action</th>"
                    . "</tr>"
                    . "</thead>";
                    $table = "album";
                    $column = "*";
                    $condition = "";
                    $rowsperpage = 3;
                    $user = new User;
                    $resultArr = $user->pageinfo($table, $column, $condition,$rowsperpage);
                    while ($row = mysqli_fetch_assoc($resultArr['result'])) {
                        echo "<tr>"
                        . '<td>';
                        if (!empty($row['cover_photo'])) {
                            echo '<img src="../image/' . $row['cover_photo'] . '" width="50" height="50" />';
                        }
                        echo '</td>'
                        . "<td>" . $row["name"] . "</td>"
                        . "<td><a href=albumEdit.php?user_id=" . $row['id'] . "><button class='updatebtn'>Edit</button></a></td>"
                        ?>
                        <td><a href="albumDelete.php?user_id=<?= $row['id'] ?>" ><button class="cancelbtn" onclick="return confirm('Do you want to delete?')">Delete</button></a></td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</table>";
                    ?>
                    <div class="pagination"><br>
                        <?php
                        $totalpages = $resultArr['totalpages'];
                        $currentpage = $resultArr['currentpage'];
                        $pagination = new Pagination();
                        $pagination->paginate($totalpages, $currentpage);
                        ?>
                    </div>
                </div>
            </article> 
        </div>
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>