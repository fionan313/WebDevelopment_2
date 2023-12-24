<?php
// resume the session.
session_start();
// include the header file and connection file for the datatbase.
include "connection.php";
include "header.php";
?>

<body>
  <?php
  // if any error messages stored in the session, this code will display it in red.
  if (isset($_SESSION["error"])) {
    echo('<p style="color:red">Error:' . $_SESSION["error"] . "</p>\n");
    // after displaying the message, it's cleared.
    unset($_SESSION["error"]);
  }
  // if any success messages stored in the session, this code will display it in green.
  if (isset($_SESSION["success"])) {
    echo('<p style="color:green">' . $_SESSION["success"] . "</p>\n");
    // after displaying the message, it's cleared.
    unset($_SESSION["success"]);
  }

  // if the user is not logged in, it will display this block of code.
  if (!isset($_SESSION["account"])) { ?>
    <!-- USE THE SECOND STYLESHEET -->
    <link href="style.css" rel="stylesheet" type="text/css">
    <!-- START OF NAV BAR-->
    <nav>
      <!-- LOGO -->
      <div class="logo">
        <h1>Dev Library</h1>
      </div>

      <!-- LIST -->
      <ul class="firstMenu">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      </ul>
    </nav>
    <!--END OF NAV BAR -->
    <!-- START OF CONTENT -->
    <section class="header">
      <h1>⚠️ OOPS! You are not logged in :/ ⚠️</h1>
      <h3>This webpage is only accessible when you're signed in with your Dev Library account.</h3>
      <!-- LOGIN BUTTON -->
      <button><a href="login.php">Login</a></button>
    </section>
  <!-- ELSE, I.E. THE USER IS LOGGED IN -->
  <?php } else { ?> 
    <!-- USE THE FIRST STYLESHEET -->
    <link href="style.css" rel="stylesheet" type="text/css">

    <!-- START OF NAV BAR-->
    <nav>
      <!-- LOGO -->
      <div class="logo">
        <h1>Dev Library</h1>
      </div>

      <!-- LIST -->
      <ul class="firstMenu">
        <li><a href="index.php">Home</a></li> 
        <li><a href="search.php">Search</a></li>      
        <li><a href="viewreserve.php">View Reserved Books</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <!--END OF NAV BAR -->
    
    <!-- START OF CONTENT -->
    <div class="container">
      <section class="header">
        <!-- DISPLAY GREETING WITH ACCOUNT USERNAME -->
        <h1>⚠️ Hey, <?php echo $_SESSION['account']; ?>. We are working on reserving your book but it's taking a while... ⚠️ (normally you wouldn't see this page)</h1>
        <br>
        <h3>If it's still not working or you believe you have reached this webpage in error, You can ignore this and go back <a href='index.php'>home.</a></h3>
        <br>
      </section>
    </div> 

    <div class="container">    
      <?php  
      // checks if the user is logged in and ensures that the ISBN is passed throughin the URL.
      if (isset($_SESSION["account"]) && isset($_GET['ISBN'])) {
        // if so, retreive the users account name, the ISBN in the URL and the cureent date
        $user = $_SESSION['account'];
        $ISBN = $_GET['ISBN'];
        $date = date('Y-m-d');
        // SQL query to update the 'reserved' status in the 'Books' table to 'Y' for the chosen book
        $updateReservationStatus = mysqli_query($conn, "UPDATE Books SET reserved = 'Y' WHERE ISBN = '$ISBN'");
        // if the SQL query complete successfully, complete the next block  
        if ($updateReservationStatus) {
          // add the corresponding book in the 'Reservations' table
          $addToReservations = mysqli_query($conn, "INSERT INTO Reservations VALUES ('$ISBN', '$user', '$date')");
          // if the insertion is successful, store success
          if ($addToReservations) {
            $_SESSION["success"] = "Book reserved successfully.";
          } else {
            // otherwise, store an error message
            $_SESSION["error"] = "Error reserving.";
          }
        }
        // after, redirect the user back to the previous page
        header("Location: {$_SERVER['HTTP_REFERER']}");
      }?>
    </div>
  <?php } ?>
  <!-- FOOTER -->
  <?php include "footer.php"; ?>
</body>
</html>