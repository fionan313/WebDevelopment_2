<?php
// start the session
session_start();

// including the connection to the dtatbase and the header files.
include "connection.php";
include "header.php";
// clearing the user's session account information before login.
unset($_SESSION["account"]);

// checks if account and password are set.
if (isset($_POST["account"]) && isset($_POST["pw"])) {
    $username = $_POST["account"];
    $password = $_POST["pw"];

    // query the database to check credentials - prepared statement used to prevent SQL injection.
    $check = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    // binds values to the placeholders in the prepared statement - "ss" as the data type is strings.
    $check->bind_param("ss", $username, $password);
    $check->execute();
    // fetches the result set returned by the SQL statement.
    $result = $check->get_result();
    $check->close();
    // checks if the result returned by the database has more than 0 rows, meaning the user entered their login details.
    if ($result->num_rows > 0) {
        // username of the account is stored in the "account" variable.
        $_SESSION["account"] = $username;
        $_SESSION["success"] = "Logged in.";
        // redirects the user to the index.php page.
        header('Location: index.php');
        return;
    } else {
        // if the if condition is false, inform taht the username of password is incorrect.
        $_SESSION["error"] = "Incorrect username or password.";
        // redirects the user back to the login.php page.
        header('Location: login.php');
        return;
    }
// if the first if condition fails, check that are any elements in the array, indicating that the user submitted the form.
} else if (count($_POST) > 0) {
    //indicate to the user that there is missing information
    $_SESSION["error"] = "Missing Required Information";
    // redirects the user back to the login.php page.
    header('Location: login.php');
    return;
}
?>

<body>
    <!-- START OF NAV BAR-->
    <nav>
        <!-- LOGO -->
        <div class="logo">
            <h1>Dev Library</h1>
        </div>
        <!-- LOGO -->
        <ul class="firstMenu">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>
    <!--END OF NAV BAR -->
    <?php
    //checks if there's any messages stored in the "error" variable and if so displays them to the user in red.
    if (isset($_SESSION["error"])) {
        echo('<p style="color:red">Error:' . $_SESSION["error"] . "</p>\n");
        unset($_SESSION["error"]);
    }
    ?>

    <!-- LOGIN FORM -->
    <form method="post" action="login.php">
        <div class="container">
            <!-- USERNAME -->
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Please enter your username.." name="account" id="username" required>

            <!-- PASSWORD -->
            <label for="userpassword"><b>Password</b></label>
            <input type="password" placeholder="Please enter your password.." name="pw" id="userpassword" required>

            <!-- LOGIN BUTTON -->
            <button type="submit" value="Log In">Login</button>
            <br>
            <br>
            <p>Don't have an account?</p>
            <br>
            <!-- REGISTER BUTTON -->
            <button type="submit" onclick="location.href='register.php'">Register</button>
            
        </div>
    </form>
    <!-- FOOTER -->
    <?php include "footer.php"; ?>
</body>
</html>