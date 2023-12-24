<?php
// resume the session
session_start();
// include the header file.
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
  // if the user is not logged in, it will display this block of code.
  if (!isset($_SESSION["account"])) { ?>
    <!-- START OF NAV BAR-->
    <nav>
      <!-- LOGO -->
      <div class="logo">
        <h1>Dev Library</h1>
      </div>

      <!-- LIST -->
      <ul class="firstMenu">
        <li><a href="#">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      </ul>
    </nav>
    <!--END OF NAV BAR -->

    <!-- START OF CONTENT -->
    <section class="header">
      <h1>Welcome to the Developer Library.</h1>
      <button><a href="login.php">Login</a></button>
    </section>

    <!--ABOUT SECTION -->
    <section class="section2">
      <h2>About</h2>
      <!-- INFO SECTION-->
      <div class="info">
        <div class="infoSection">
          <h3>Who We Are</h3>
          <p>The first-of-its-kind program to help people get into reading and software devlopment. Dev Library's main goal is to help anyone on their journey to learn how to code. Learn more about how it works and the additional resources available for free and for people of all ages who want to begin their development journey.
          </p>
          <br>
          <p>We provide a curated experience for all of our users to give them accurate and concise information in all of the book and resources we provide. We also connect them with many external resources that specialise in the field to provide useful and accurate both online and in person.
          </p>
        </div>
        <div class="infoSection">
          <h3>What We Do</h3>
          <p>We provide a curated experience for all of are users to give them accurate and concise information about how to deal with the trials and tribulations that may arise when learning how to code. We also connect them with many external resources and approved organisiations that specialise in the field to provide useful and accurate both online and in person.
          </p>
          <br>
          <p>To ensure are information is as trustworthy as possible, we rely on external fact-checkers and always try are best to crosscheck are information and tips with other organisations and resources to ensure are users get the most accurate and up-to-date information always.
          </p>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>
  <?php } else { ?>
    <!-- START OF NAV BAR-->
    <nav>
      <!-- LOGO -->
      <div class="logo">
        <h1>Dev Library</h1>
      </div>

      <!-- LIST -->
      <ul class="firstMenu">
        <li><a href="#">Home</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href="viewReserve.php">View Reserved Books</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <!--END OF NAV BAR -->
    
    <!-- START OF CONTENT -->
    <section class="header">
      <!-- DISPLAY GREETING WITH ACCOUNT USERNAME -->
      <h1>Welcome, <?php echo $_SESSION['account']; ?>.</h1>
      <h1>You have successfully logged in!</h1>
      <!-- SAERCH AND RESERVE BUTTONS -->
      <button><a href="search.php">Search inventory</a></button>
      <button><a href="viewReserve.php">View reserved books</a></button>
    </section>
    <!-- FOOTER -->
    <?php include "footer.php"; ?>
  <?php } ?>

</body>
</html>