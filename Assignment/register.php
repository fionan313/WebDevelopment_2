<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
// including the connection to the dtatbase and the header files.
include "connection.php";
include "header.php";

$errors = [];
// checks that all fields are set.
if (isset($_POST['UserName']) && isset($_POST['Password']) && isset($_POST['cPassword'])  && isset($_POST['FirstName']) && isset($_POST['Surname']) && isset($_POST['AddressLine1']) && isset($_POST['AddressLine2']) && isset($_POST['City']) && isset($_POST['Telephone']) && isset($_POST['Mobile'])) {
    $u = $_POST['UserName'];
    $p = $_POST['Password'];
    $cP = $_POST['cPassword'];
    $f = $_POST['FirstName'];
    $s = $_POST['Surname'];
    $a1 = $_POST['AddressLine1'];
    $a2 = $_POST['AddressLine2'];
    $c = $_POST['City'];
    $t = $_POST['Telephone'];
    $m = $_POST['Mobile'];

    // Validation checks
    // check for empty fields
    if (empty($u) || empty($p) || empty($cP) || empty($f) || empty($s) || empty($a1) || empty($a2) || empty($c) || empty($t) || empty($m)) {
        $errors[] = "Ensure all fields are filled before submitting.";
    }

    $uniqueUsername = "SELECT UserName FROM Users WHERE UserName = '$u'";
    $result = $conn->query($uniqueUsername);
    // If there are rows in the result, the username is not unique
    if ($result->num_rows > 0) {
        $errors[] = "That username is not available.";
    }

    // If the password is not equal to 6
    if (strlen($p) !== 6) {
        $errors[] = "Password must be exactly 6 characters long.";
    }

    // If the telephone number is not equal to 10
    if (!is_numeric($t) || strlen($t) !== 10 || $t > 2147483647) {
        $errors[] = "Telephone number must be a valid 10 digit number.";
    }

    // If the mobile number is not equal to 10
    if (!is_numeric($m) || strlen($m) !== 10 || $m > 2147483647) {
        $errors[] = "Mobile number must be a valid 10 digit number.";
    }

    // If the the passwords don't match
    if ($p !== $cP) {
        $errors[] = "Passwords do not match.";
    }

    // Display any errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        echo "<a href='register.php'>Try again.</a>";
        exit();
    }

    $sql = "INSERT INTO Users (UserName, Password, FirstName, Surname, AddressLine1, AddressLine2, City, Telephone, Mobile) VALUES ('$u', '$p', '$f', '$s', '$a1', '$a2', '$c', '$t', '$m')";
    echo "SQL Query: " . $sql;
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 

    $conn->close();
}
?>

<body>
    <script src="script.js"></script>
    <!-- START OF NAV BAR-->
    <nav>
        <!-- LOGO -->
        <div class="logo">
        <h1>Dev Library</h1>
        </div>
        <!-- LOGO -->
        <ul class="firstMenu">
            <li><a href="index.php">Home</a></li> 
            <li><a href="login.php">Login</a></li>  
            <li><a href="#">Register</a></li>
        </ul>
    </nav>
    <!--END OF NAV BAR -->

    <!-- CONTACT FROM -->
    <div class="container">
        <form method="post">
            <!-- USERNAME -->
            <label for="uname">Username:</label>
            <input type="text" id="uname" name="UserName" placeholder="Please enter your username here..">
            <!-- PASSWORD -->
            <label for="pwd">Password:</label>
            <input type="password" id="pwd" name="Password" placeholder="Please enter your password here..">
            <!-- CONIRM PASSWORD -->
            <label for="cpwd">Confirm Password:</label>
            <input type="password" id="cpwd" name="cPassword" placeholder="Please confirm your password here..">
            <!-- FIRST NAME -->
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="FirstName" placeholder="Please enter your first name here..">
            <!-- SURNAME -->
            <label for="surname">Surname:</label>
            <input type="text" id="lname" name="Surname" placeholder="Please enter your surname here..">
            <!-- ADDRESS 1 -->
            <label for="ad1">Address Line 1:</label>
            <input type="text" id="al1" name="AddressLine1" placeholder="Please enter address line 1 here..">
            <!-- ADDRESS 2 -->
            <label for="ad2">Address Line 2:</label>
            <input type="text" id="al2" name="AddressLine2" placeholder="Please enter address line 2 here..">
            <!-- CITY -->
            <label for="city">City:</label>
            <input type="text" id="city" name="City" placeholder="Please enter your city here..">
            <!-- TELEPHONE -->
            <label for="tele">Telephone:</label>
            <input type="text" id="tele" name="Telephone" placeholder="Please enter your telephone number here..">
            <!-- MOBILE -->
            <label for="mobile">Mobile:</label>
            <input type="text" id="mobile" name="Mobile" placeholder="Please enter your mobile number here..">
            <!-- REGISTER BUTTON -->
            <button type="submit" value="register">Register</button>
            <br>
            <br>
            <p>Please enter your personal information in the form above to create an account.</p>
        </form>
    </div>
    <!-- FOOTER -->
<?php include "footer.php"; ?>
</body>
</html>