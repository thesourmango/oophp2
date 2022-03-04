<article>
    <h2>Registrera dig</h2>
    <p>Fyll i registreringsformuläret så lägger vi till dig på sajten</p>
    <form action="login.php" method="GET">
        Användarnamn: <input type="text" name="username"><br>
        Lösenord: <input type="text" name="password"><br>
        Epost: <input type="email" name="email"><br>
        <input type="submit" value="Registrera dig">
    </form>

    <?php

    if (!empty($_REQUEST['username']) && !empty($_REQUEST['password']) && !empty($_REQUEST['email'])) {
        // Testar att lägga till data i DB med PHP och PDO med en PREPARED STATEMENT
        $username = $DatingApp->test_input($_REQUEST['username']);
        $email = $DatingApp->test_input($_REQUEST['email']);

        $password = $DatingApp->test_input($_REQUEST['password']);
        $password = hash("sha256", $password);

        $fullname = "Test User3";
        $city = "qwe";
        $aboutme = "Hej på dig";
        $salary = 10000;
        $preference = 3;
        $user = array(
            "username" => $username,
            "email" => $email,
            "password" => $password,
            "fullname" => $fullname,
            "city" => $city,
            "aboutme" => $aboutme,
            "salary" => $salary,
            "preference" => $preference
        );
        if ($DatingApp->registerUser($user)) {
            $_SESSION['userLogin'] = $DatingApp->login($username, $password);
            header("Location: view_profile.php");
        } else {
            echo "<h2>Nåt gick fel</h2>";
        }
    }
    ?>
</article>
   
