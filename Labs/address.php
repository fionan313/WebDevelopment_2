<?php
session_start();

// Debug: Check if $_SESSION has the 'UserID' key
var_dump(isset($_SESSION['UserID']), $_SESSION['UserID']);

include "connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in
if (!isset($_SESSION["account"])) {
    header('Location: login.php');
    return;
}

//$uid = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';

// Debug: Check $uid and $_SESSION['UserID']
//var_dump($uid, $_SESSION['UserID']);

// Retrieve data from the session for the view
$userID = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';
$street = isset($_SESSION['street']) ? $_SESSION['street'] : '';
$city = isset($_SESSION['city']) ? $_SESSION['city'] : '';
$state = isset($_SESSION['state']) ? $_SESSION['state'] : '';
$zip = isset($_SESSION['zip']) ? $_SESSION['zip'] : '';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if all required fields are set
    if (isset($_POST["street"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zip"])) {
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        // Update the address in the database
        $sql = "UPDATE Address SET street = '$street', city = '$city', state = '$state', zip = '$zip' WHERE UserID = '$userID'";
        // Debug: Check the SQL query
        var_dump($sql);

        if ($conn->query($sql) === TRUE) {

            $_SESSION['street'] = $street;
            $_SESSION['city'] = $city;
            $_SESSION['state'] = $state;
            $_SESSION['zip'] = $zip;
            $_SESSION["success"] = "Address updated successfully";
            header('Location: address.php');
            return;
        } else {
            $_SESSION["error"] = "Error updating address: " . $conn->error;
            header('Location: address.php');
            return;
        }

        $_SESSION["success"] = "Address updated successfully";
        header('Location: address.php');
        return;
    } else {
        $_SESSION["error"] = "Missing Required Information";
        header('Location: address.php');
        return;
    }
}

?>

<html>
<head>
</head>
<body style="font-family: sans-serif;">
    <h1>Online Address Book</h1>

    <?php
    // Display error or success messages
    if (isset($_SESSION["error"])) {
        echo('<p style="color:red">' . $_SESSION["error"] . "</p>\n");
        unset($_SESSION["error"]);
    }
    if (isset($_SESSION["success"])) {
        echo('<p style="color:green">' . $_SESSION["success"] . "</p>\n");
        unset($_SESSION["success"]);
    }
    ?>

    <p>Please enter your address:</p>
    <form method="post" action="address.php">
        <p>Street: <input type="text" name="street" size="50" value="<?php echo(htmlentities($street)); ?>"></p>
        <p>City: <input type="text" name="city" size="20" value="<?php echo(htmlentities($city)); ?>"></p>
        <p>State: <input type="text" name="state" size="2" value="<?php echo(htmlentities($state)); ?>"></p>
        <p>Zip: <input type="text" name="zip" size="5" value="<?php echo(htmlentities($zip)); ?>"></p>
        <p>
            <input type="submit" value="Update">
            <input type="button" value="Logout" onclick="location.href='logout.php'; return false">
        </p>
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
