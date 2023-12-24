<?php
// resume the session.
session_start();
// include the header and the database (halt script if database file not found).
require_once("connection.php");
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
    <!-- START OF NAV BAR -->
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
    <!-- WEBPAGE IF NO USER LOGGED IN -->
    <section class="header">
      <h1>⚠️ OOPS! You are not logged in :/ ⚠️</h1>
      <h3>This webpage is only accessible when you're signed in with your Dev Library account.</h3>
      <button><a href="login.php">Login</a></button>
    </section>

  <?php } else { ?>
    <!-- WEBPAGE IF USER LOGGED IN -->
    <link href="style.css" rel="stylesheet" type="text/css">

    <?php
    // function to retrieve book categories from the database.
    function getBookCategories($conn)
    {
      // initalise an array to store the categories.
      $categories = array();
      // SQL query to select all categories from the 'category' table.
      $CategorySelect = "SELECT * FROM category";
      // excuting the SQl statement using the database.
      $result = mysqli_query($conn, $CategorySelect);

      //while loop to go through each result and add them to the category array.
      while ($row = mysqli_fetch_assoc($result)) {
        $categories[$row['CategoryID']] = $row['CategoryDescription'];
      }
      // return the array of categories.
      return $categories;
    }

    // function to perform the search based on the user input.
    function searchBooks($conn, $title, $author, $category)
    {
      // initalise the core SQL query
      $query = "SELECT * FROM Books WHERE 1"; // 1 = always true.

      // add conditions based on user input.

      // if the user enters a book title, extend the SQL query to include it.
      if (!empty($title)) {
        $query .= " AND Booktitle LIKE '%$title%'";
      }
      // if the user enters a author, extend the SQL query to include it.
      if (!empty($author)) {
        $query .= " AND Author LIKE '%$author%'";
      }
      // if the user selects a book category, extend the SQL query to include it.
      if (!empty($category)) {
        $query .= " AND CategoryCode = $category";
      }
      // excuting the SQl statement using the database.
      $result = mysqli_query($conn, $query);

      // return the set of results.
      return $result;
    }

    // check if the form is submitted using HTTP POST.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // if so, get user input from the form
      // mysqli_real_escape_string is used to sanitise the input.
      $searchTitle = isset($_POST["title"]) ? mysqli_real_escape_string($conn, $_POST["title"]) : '';
      $searchAuthor = isset($_POST["author"]) ? mysqli_real_escape_string($conn, $_POST["author"]) : '';
      $searchCategory = mysqli_real_escape_string($conn, $_POST["searchCategory"]);

      // call the searchBooks function to perform the search.
      $searchResult = searchBooks($conn, $searchTitle, $searchAuthor, $searchCategory);
    }

    // get book categories
    $bookCategories = getBookCategories($conn);
    ?>

    <!-- START OF NAV BAR-->
    <nav>
      <!-- LOGO -->
      <div class="logo">
        <h1>Dev Library</h1>
      </div>

      <!-- LIST -->
      <ul class="firstMenu">
        <li><a href="index.php">Home</a></li> 
        <li><a href="#">Search</a></li>      
        <li><a href="viewReserve.php">View Reserved Books</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <!--END OF NAV BAR -->
    
    <!-- START OF CONTENT -->
    

    <div class="container">
    <form method="post">
      <!-- BOOK TITLE -->
      <label for="title">Book Title:</label>
      <input type="text" id="title" name="title" placeholder="Please enter the book title here..">
      <!-- AUTHOR -->
      <label for="author">Author:</label>
      <input type="text" id="author" name="author" placeholder="Please enter the Author here..">
      <!-- CATEGORIES -->
      <label for="searchCategory">Category:</label>
      <!-- START OF DROPDOWN -->
      <select name="searchCategory" id="searchCategory">
        <option value="">Select a book category</option>
        <?php
        // statement to loop through the 'bookCategories' array dropdown menu.
        foreach ($bookCategories as $categoryId => $categoryDescription) {
          // output each element as a html option element for the dropdown menu.
          echo("<option value=\"$categoryId\">$categoryDescription</option>");
        } 
        ?>
      </select>
      <!-- END OF DROPDOWN -->

      <?php
      // display search results in a table.

      // checks if the variable searchResult is set.
      if (isset($searchResult)) {
        // checks if there's more than 0 rows, I.E. there is results to display.
        if (mysqli_num_rows($searchResult) > 0) {
          // echo statements to build the basis of the HTMl table, to display the results.
          echo "<div class='container'>";
          echo "<table class='reservations-table'>";
          // column titles
          echo "<tr><th>Title</th><th>Author</th><th>Category</th><th>Manage</th></tr>";
          // loop to iterate through each row in the search results.
          while ($row = mysqli_fetch_assoc($searchResult)) {
            echo "<tr><td>";
            // print book title.
            echo (htmlentities($row['BookTitle']));
            echo "</td><td>";
            // print author.
            echo (htmlentities($row['Author']));
            echo "</td><td>";
            //print category
            echo (htmlentities($bookCategories[$row['CategoryCode']]));
            // htmlentities - used to sanitize and prevent any injection.
            echo "</td><td>";
            
            // if the reserved status of the book is NOT reserved.
            if ($row['Reserved'] != 'Y') {
              // dispaly a reserve link, that directs to reserve.php and includes the ISBN in the URL.
              echo "<a href='reserve.php?ISBN=" . htmlentities($row['ISBN']) . "'>Reserve</a>";
              } else {
              // otherwise, display the text that the book is reserved.
              echo "This book is already reserved.";
              }
              echo "</td></tr>";
              }
              echo "</table>";
              echo "</div>";
          } else {
              // if no results, display to user.
              echo "<p>No results found.</p>";
              echo"<br>";
          }
      }
      ?>     
      <!-- SUBMIT BUTTON -->
      <button type="submit" value="search">Search</button>
    </form>
    </div>

    <?php } ?>
    <!-- FOOTER -->
    <?php include "footer.php"; ?>
</body>
</html>