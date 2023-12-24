<?php
// resume the session.
session_start();
// include the header file and connection file for the datatbase.
include "connection.php";
include "header.php";
$user = $_SESSION['account'];
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
        <li><a href="#">View Reserved Books</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <!--END OF NAV BAR -->
    
    <!-- START OF CONTENT -->
    <div class="container">
      <section class="header">
        <!-- DISPLAY GREETING WITH ACCOUNT USERNAME -->
        <h1>Welcome back, <?php echo $_SESSION['account']; ?>. Here are the books you currently have reserved. 📚📚📚</h1>
        <br>
      </section>
    </div> 

    <div class="container">    
    <?php
    // SQL query retrieves information about reserved books from three tables
    $result = mysqli_query($conn, "SELECT b.ISBN, b.BookTitle, b.Author, r.ReservationDate FROM Books b
    -- JOIN THE TABLES BASED ON THEIR RELATIONSHIPS
    JOIN Reservations r ON b.ISBN = r.ISBN
    JOIN users u ON r.Username = u.Username
    WHERE u.Username = '$user'");
    // checks if the result returned by the database has more than 0 rows, meaning their is results in the set.
    if($result->num_rows > 0) {
      // creates and HTML table to display the results
      echo "<table class='reservations-table'>";
      echo "<tr><th>ISBN</th><th>Book Title</th><th>Author</th><th>Date Reserved</th><th>Manage</th></tr>";

      // iterates through each row in the result set.
      while ($row = $result->fetch_assoc()) {
        // prints the ISBN, Book Title, and Author and Date in separate cells within the table row.
        echo "<tr><td>";
        echo (htmlentities($row['ISBN']));
        echo "</td><td>";
        echo (htmlentities($row['BookTitle']));
        echo "</td><td>";
        echo (htmlentities($row['Author']));
        echo "</td><td>";
        echo (htmlentities($row['ReservationDate']));
            
        // create a new column for the unreserve button
        echo "</td><td><a href='unreserve.php?ISBN=" . htmlentities($row['ISBN']) . "'>Unreserve</a></td>";
        echo "</tr>\n";  // Close the table row after all columns
      }
      echo "</table>";
    } else {
      // if no books reserved, display the message
      echo "Well, this is awkward... It looks like you don't have any books reserved at the moment 😔";
    } ?>
    </div>
  <?php } ?>
  <!-- FOOTER -->
  <?php include "footer.php"; ?>
</body>

</html>