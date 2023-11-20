<?php 
// session_destroy();

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

$user_name = $user_password = $user_msg = "" ;

require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
// echo "Enter here";
$user_name = $_POST["user_name"];
$user_password = $_POST["user_password"];

$sql = "SELECT * FROM user WHERE name= ? and password= ?";

if($stmt = mysqli_prepare($link, $sql)){
  mysqli_stmt_bind_param($stmt, "ss", $user_name,$user_password);

  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);

    if(mysqli_stmt_num_rows($stmt) == 1){


      $_SESSION["loggedin"] = true;

      $_SESSION["user_name"] = $user_name;

      header("location: dashboard.php");

  } else {
    $user_msg =  "The information you enter are incorrect";

  }

  }

}


}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="img/favicon.png" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="manifest" href="manifest.webmanifest" />
    <mete
      name="description"
      content="Confidence & Basic Work is a training club for muay thai, kick boxing and MMA athletes."
    />

    <title>Sign In - Welcome back</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/queries.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script
      defer
      src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"
    ></script>

    <script defer src="js/script.js"></script>
    <script defer src="js/safari.js"></script>
  </head>
  <body>
    <!-- Hero sectin 100vh -->
    <section class="hero-section" style="height: 50vh">
      <header class="header container">
        <div class="logo">
          <a href="index.php"
            ><img
              src="img/logo-black.png"
              alt="Confidence & Basic work logo"
              class="logo-black"
          /></a>
        </div>
      </header>
      <div class="hero-box container">
        <div>
          <h1 class="primary-heading">Sign In - Welcome Back</h1>
        </div>
      </div>
    </section>
    <section class="page-content sign-in">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
 method="POST">
        <h2>Sign In - Welcome Back</h2>
        <fieldset>
          <legend>Enter your information to log in to your account :</legend>

          <label for="name">Name :</label>
          <input
            type="text"
            id="name"
            name="user_name"
            placeholder="Enter your full name"
          />
          <label for="password">Password :</label>
          <input
            type="password"
            id="password"
            name="user_password"
            placeholder="Enter your password"
          />
        </fieldset>
        <p style="font-size: 1.2rem;;;color: #ab3838;font-weight: 600;font-style: italic;"><?php echo $user_msg; ?></p>

        <input
          class="btn--input btn--input--full"
          id="sign-in-btn"
          type="submit"
          value="Log in"
        />
        <a class="sign-in-link" href="sign-up.php" title="Sign up now"
          >Don't have an account? Register now.</a
        >
      </form>
    </section>
    <footer class="footer">
      <div class="footer-grid container grid grid--3-cols">
        <div class="logo-col">
          <a href="#" class="footer-logo">
            <img class="white-logo" src="img/logo-white.png" alt="logo" />
          </a>

          <ul class="social-links">
            <li>
              <a
                target="_blank"
                class="footer-link"
                href="https://www.instagram.com/ayoub_sadam_sergma/"
                ><ion-icon
                  class="social-icon md hydrated"
                  name="logo-instagram"
                  role="img"
                  aria-label="logo instagram"
                ></ion-icon
              ></a>
            </li>
            <li>
              <a
                target="_blank"
                class="footer-link"
                href="https://www.facebook.com/AyoubSadamSergma/"
                ><ion-icon
                  class="social-icon md hydrated"
                  name="logo-facebook"
                  role="img"
                  aria-label="logo facebook"
                ></ion-icon
              ></a>
            </li>
            <li>
              <a
                target="_blank"
                class="footer-link"
                href="https://twitter.com/ayoub_sergma"
                ><ion-icon
                  class="social-icon md hydrated"
                  name="logo-twitter"
                  role="img"
                  aria-label="logo twitter"
                ></ion-icon
              ></a>
            </li>
          </ul>

          <p class="copyright">
            Copyright © <span class="year">year</span> by Confidence &amp; Basic
            Work, Inc. All rights reserved.
          </p>
        </div>
        <div class="address-col">
          <p class="footer-heading">Information</p>
          <address class="contacts">
            <p class="address">31000 Es-senia, Oran, Algeria</p>
            <p>
              <a class="footer-link" href="tel:213-777-7777">213-777-7777</a
              ><br />
              <a class="footer-link" href="mailto:hello@s18.com"
                >hello@s18.com</a
              >
            </p>
          </address>
        </div>

        <nav-footer class="nav-col">
          <p class="footer-heading">Resources</p>
          <ul class="footer-nav">
            <li>
              <a class="footer-link" href="privacy_policy.php"
                >Privacy &amp; terms</a
              >
            </li>
            <li><a class="footer-link" href="faq.php">F.A.Q</a></li>
          </ul>
        </nav-footer>
        <p class="dev">
          Réalisé par
          <a href="#" title="Abdelmadjid Lablack">Abdelmadjid Lablack</a> and
          <a href="#" title="Walid Bettahar">Walid Bettahar</a>
        </p>
      </div>
    </footer>
  </body>
</html>
