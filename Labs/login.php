<?php
session_start();

include "connection.php";

unset($_SESSION["account"]);

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["account"]) && isset($_POST["pw"])) {
    $username = $_POST["account"];
    $password = $_POST["pw"];

    // Perform a database query to check credentials
    $stmt = $conn->prepare("SELECT * FROM User WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        // Fetch user information including address from the database
        $user = $result->fetch_assoc();
        $userID = $user['UserID'];

        // Set the UserID session variable
        $_SESSION['UserID'] = $userID;

        // Debug: Check UserID
        var_dump($userID);

        $stmtAddress = $conn->prepare("SELECT * FROM Address WHERE UserID = ?");
        $stmtAddress->bind_param("i", $userID);
        $stmtAddress->execute();
        $resultAddress = $stmtAddress->get_result();
        $stmtAddress->close();

        if ($resultAddress->num_rows > 0) {
            // Address information found, set it in the session
            $address = $resultAddress->fetch_assoc();
            $_SESSION['UserID'] = $address['UserID'];
            $_SESSION['street'] = $address['street'];
            $_SESSION['city'] = $address['city'];
            $_SESSION['state'] = $address['state'];
            $_SESSION['zip'] = $address['zip'];
        }

        // Debug: Check Session Data
        var_dump($_SESSION);

        $_SESSION["account"] = $username;
        $_SESSION["success"] = "Logged in.";
        header('Location: address.php');
        return;
    } else {
        $_SESSION["error"] = "Incorrect username or password.";
        header('Location: login.php');
        return;
    }
} else if (count($_POST) > 0) {
    $_SESSION["error"] = "Missing Required Information";
    header('Location: login.php');
    return;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=is0-8859-1" />
    <title>Login</title>
</head>

<body style="font-family: sans-serif;">
    <h1>Please Log In</h1>
    <?php
    if (isset($_SESSION["error"])) {
        echo('<p style="color:red">Error:' . $_SESSION["error"] . "</p>\n");
        unset($_SESSION["error"]);
    }
    ?>
    <form method="post">
        <p>Account: <input type="text" name="account" value=""></p>
        <p>Password: <input type="text" name="pw" value=""></p>
        <p><input type="submit" value="Log In"></p>
    </form>
</body>
</html>
