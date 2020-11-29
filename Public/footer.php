    <footer>
        <?php
        if (!empty($_SESSION['user'])) {

            echo "<ul>
                        <li><a href='mySonds.php'>Mes sondages créés</a></li>
                        <li><a href='participate.php'>Mes participations</a></li>
                    </ul>";
        }
        ?>

    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/chat.js"></script>
    <script src="../js/friends.js"></script>
    <script src="../js/sondage.js"></script>
    </body>

    </html>