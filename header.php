<?php

session_start();
require "hemlis.php";
require "classes/DatingApp.php";

$DatingApp = new DatingApp\DatingApp($password);


$template['users'] = $DatingApp->getUsers();

?>
    <header>
        <!-- Logo och meny i headern -->
        <img src="./media/logo.svg" alt="Website logo"/>
        <div id="logo">NuggBugg</div>
        <nav>
            <!-- Huvudmenyn -->
            <ul>
                <li><a href="./">Home</a></li>

                <!-- Visa profilsidan om man är inloggad -->
                <?php
                if (isset($_SESSION['userLogin'])) {
                    // Visa länken till profilsidan om man är inloggad
                    print("<li><a href='./view_profile.php'>My Profile</a></li>");
                }
                ?>
                <!-- Visa login / Logga ut bereonde på session -->
                <?php if (!isset($_SESSION['userLogin'])) : ?>
                    <li><a href="./login.php">Login/Registrera</a></li>
                <?php else : ?>
                    <li>
                        <form method="POST"><input type="submit" name="logout" value="Logout"></form>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

<?php
