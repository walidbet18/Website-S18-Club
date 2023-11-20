<?php 
require_once "config.php";

$user_session = $user_score = $user_score2 = $user_frequency = "";

// GET THE OLD VALUE AND INCREMENT IT

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $user_session=$_POST["user_session"];

$sql5 = "SELECT session FROM Sessions where user=?";

if($stmt5 = mysqli_prepare($link, $sql5)){

  mysqli_stmt_bind_param($stmt5, "s", $user_session);

  if(mysqli_stmt_execute($stmt5)){
    mysqli_stmt_store_result($stmt5);

    mysqli_stmt_bind_result($stmt5,$user_score2);
  
    while (mysqli_stmt_fetch($stmt5)) {
      $user_score   = $user_score2 ;
   }
  }

}
} 
// INSERT THE NEW VALUE WITH THE LAST DATE

if($user_score != 0){
  $sql31 = "UPDATE Sessions SET session=? WHERE user=?";

  $x = intval($user_score)+1;
  if($stmt31 = mysqli_prepare($link, $sql31)){
 mysqli_stmt_bind_param($stmt31, "ss",$x,$user_session);
 
 if(mysqli_stmt_execute($stmt31)){}}

} else {

  $todaydate=date("Y-m-d");

  $sql33 = "INSERT INTO `Sessions` (`id`, `user`, `AddDate`, `session`) VALUES (NULL, ?, ?, '1');";

  if($stmt33 = mysqli_prepare($link, $sql33)){
 mysqli_stmt_bind_param($stmt33, "ss",$user_session,$todaydate);
 
 if(mysqli_stmt_execute($stmt33)){}}

}

// get all user info

$sql = "SELECT * FROM user where name=?";

if($stmt = mysqli_prepare($link, $sql)){
  
  mysqli_stmt_bind_param($stmt, "s", $user_session);

  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);

    mysqli_stmt_bind_result($stmt, $id, $user_name2,$user_email2,$user_password2,$user_age2,$user_bio2,$user_frequency2,$user_img2);
  
    while (mysqli_stmt_fetch($stmt)) {
     $user_name = $user_name2 ;
     $user_email = $user_email2;
     $user_password = $user_password2;
     $user_age = $user_age2;
     $user_bio = $user_bio2;
     $user_frequency =  $user_frequency2;
     $user_img = $user_img2;
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

    <title>Administrator</title>
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
    <script defer src="js/effects.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </head>
  <body>
    <!-- Hero sectin 100vh -->
    <section class="hero-section" style="height: fit-content">
    <header class="header container">
          <div class="logo">
            <a href="index.php"
              ><img
                src="img/logo-black.png"
                alt="Confidence & Basic work logo"
                class="logo-black"
            /></a>
          </div>
        
        </header>    <br />    <br /> <br />    <br /> <br />    <br />
      <div class="hero-box container">
        <div style="display: flex; justify-content: left; align-items: center">
       
          <div>
            <h1 class="primary-heading heading-profil">Administartor</h1>
         
          </div>
        </div>
      </div>
    </section>
    <section class="page-content dashboard">
      <!-- ----- STATS & DASHBOARD ------->
      <h2 style="text-align:center;">ADMINISTRATOR : Add here a session</h2><br /><br />
      <p  style="text-align:center;font-size:1.2rem;color:#771300;font-weight:bold;text-transform:uppercase;"><?php 

if(intval($user_frequency)==0){

  $yy = 8-intval($user_score);

}else {

  $yy = 12-intval($user_score);
}

      if($yy<=0){echo "You don't have any session left please subscribe";}
      
      ?></p><br />
      <form style="width:fit-content;margin:0 auto;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
 method="POST">
 <input style="background: rgba(255, 255, 255, 0.1);
    border: none;
    font-size: 1.4rem;
    height: auto;
    margin: 0;
    outline: 0;
    padding: 1rem;
    
    background-color: #e8eeef;
    color: #8a97a0;
    box-shadow: 0 1px 0 rgb(0 0 0 / 3%) inset;
    width: 100%;margin-bottom: 1.2rem;"
            type="text"
            id="weight"
            name="user_session"
            placeholder="Enter the name of the athlete"
          />
          <input style="    border-radius: 0;
    background-color: #eacb5a;
    padding: 1rem 1.4rem;
    font-size: 1.4rem;width:100%;"
          class="btn--input btn--input--full"
          id="sign-up-btn"
          type="submit"
          value="ADD SESSION"
        /><br /><br /><br /><br />

      
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
