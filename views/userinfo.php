<html>
    <?php
    require_once 'header.php';
    $page = 'userList';
    $session = new Session();
    $session->sessionCheck();
    $database = new Database();
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
                    <h2>Information of the Users </h2>
                    <?php
                    echo "<table cellpadding=5 cellspacing=0>"
                    . "<thead>"
                    . "<tr>"
                    . "<th>Profile Photo</th>"
                    . "<th>First Name</th>"
                    . "<th>Last Name</th>"
                    . "<th>Email</th>"
                    . "<th>Phone</th>"
                    . "<th>Division</th>"
                    . "<th>District</th>"
                    . "<th>Thana</th>"
                    . "<th colspan=2>Action</th>"
                    . "</tr>"
                    . "</thead>";
                    $table = "registration";
                    $column = "registration.*,division.name AS division_name,district.name AS district_name,thana.name AS thana_name";
                    $condition = " LEFT JOIN `district`
                            ON district.`id` = registration.`district`
                            LEFT JOIN `division`
                            ON division.`id` = registration.`division`
                            LEFT JOIN `thana`
                            ON thana.`id` = registration.`thana`";
                    $rowsperpage = 2;
                    $user = new User;
                    $resultArr = $user->pageinfo($table,$column, $condition,$rowsperpage);
                    while ($userInfo = mysqli_fetch_assoc($resultArr['result'])) {
                        echo "<tr>"
                        . '<td>';
                        if (!empty($userInfo['photo'])) {
                            echo '<img src="../image/' . $userInfo['photo'] . '" width="100" height="100" />';
                        }
                        echo '</td>'
                        . "<td>" . $userInfo["fname"] . "</td>"
                        . "<td>" . $userInfo["lname"] . "</td>"
                        . "<td>" . $userInfo["email"] . "</td>"
                        . "<td>" . $userInfo["phone"] . "</td>"
                        . "<td>" . $userInfo["division_name"] . "</td>"
                        . "<td>" . $userInfo["district_name"] . "</td>"
                        . "<td>" . $userInfo["thana_name"] . "</td>"
                        . "<td><a href=userEdit.php?user_id=" . $userInfo['id'] . "><button class='updatebtn'>Edit</button></a></td>"
                        ?>
                        <td><a href="../controller/userDelete.php?user_id= <?= $userInfo['id'] ?>" ><button class="cancelbtn" onclick="return confirm('Do you want to delete?')">Delete</button></a></td>
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