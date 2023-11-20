<?php 
require_once "config.php";
session_start();

$user_name = $user_password = $user_email = $user_bio = $user_frequency = $user_age = $user_img = $user_score = "" ;

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){



} else {
  header("location: sign-in.php");
  exit;  
}

$name = $_SESSION["user_name"];

// USER INFORMATION

$sql = "SELECT * FROM user where name=?";

if($stmt = mysqli_prepare($link, $sql)){
  
  mysqli_stmt_bind_param($stmt, "s", $name);

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


// ADD WEIGHT

$todaydate=date("Y-m-d");

$sql3 = "INSERT INTO `Weights` (`weight`, `user`,`AddDate`) VALUES (?, ?, ?);";
if($stmt3 = mysqli_prepare($link, $sql3)){
  mysqli_stmt_bind_param($stmt3, "sss", $_POST["user_weight"],$name,$todaydate);

  if(mysqli_stmt_execute($stmt3)){
header("location: dashboard.php");
exit;  
    
  }}

// GET SCORE FUNCTION

$sql5 = "SELECT session FROM Sessions where user=?";

if($stmt5 = mysqli_prepare($link, $sql5)){
  
  mysqli_stmt_bind_param($stmt5, "s", $name);

  if(mysqli_stmt_execute($stmt5)){
    mysqli_stmt_store_result($stmt5);

    mysqli_stmt_bind_result($stmt5,$user_score2);
  
    while (mysqli_stmt_fetch($stmt5)) {
      $user_score   = $user_score2 ;
  
   }

  }

}
    

// SELECT DATE

$sql4 = "SELECT AddDate FROM Weights WHERE user='{$name}'";

// bindParameter

$result2 = mysqli_query($link, $sql4);

$datas3 = array();
$dateChart = [];

while($row2 = mysqli_fetch_assoc($result2)){
  $datas3[]=$row2;

}
foreach($datas3 as $i => $data){
$dateChart[$i] = $data['AddDate'];
}

// 22222

$sql44 = "SELECT weight FROM Weights WHERE user='{$name}'";

// bindParameter

$result24 = mysqli_query($link, $sql44);

$datas34 = array();
$dateChart4 = [];

while($row24 = mysqli_fetch_assoc($result24)){
  $datas34[]=$row24;

}
foreach($datas34 as $i => $data){
$dateChart4[$i] = $data['weight'];
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

    <title>Dashboard - <?php echo $name ?></title>
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
          <img
            class="profil-picture"
            src="<?php echo "$user_img" ?>"
            alt="Profil picture"
          />
          <div>
            <h1 class="primary-heading heading-profil"><?php echo $name ?></h1>
            <p style="  font-size: 1.4rem;
  font-weight: 400;
  width: 75%;
  line-height: 1.2;
  margin-left: 1.2rem;
  margin-top: 1.2rem;">"<?php echo $user_bio ?>"</p>
<p class="score" style="font-size: 1.4rem;background-color: #f2e09c;padding: 1rem 1.6rem;border-radius: 9px;display: inline-block;float: right;"><b>Monthly Score :</b> <?php 


if($user_score>0){

  echo $user_score;
} else{

  echo "0";
}

?></p>
          </div>
        </div>
      </div>
    </section>
    <section class="page-content dashboard">
      <!-- ----- STATS & DASHBOARD ------->
      <div class="container">
        <div class="menubar">
          <ul class="dashboard-menu">
            <li>
              <a class="dash-stat-btn" href="#" title="#"
                ><ion-icon name="clipboard-outline"></ion-icon>Dashboard &
                Stats</a
              >
            </li>

            <li>
              <a class="dash-edit-btn" href="#" title="#"
                ><ion-icon name="create-outline"></ion-icon>Edit Profil</a
              >
            </li>
            <li>
              <a href="logout.php" title="#"
                ><ion-icon name="log-out-outline"></ion-icon>Log Out</a
              >
            </li>
          </ul>
        </div>
      </div>
      <div class="dash-grid-1 grid grid--2-cols container">
   
<div>
  <div class="stat-weight">
    <h3>Track your Montlhy weight</h3>

  </div>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
 method="POST" style="width: fit-content;margin: 0 auto;margin-bottom: 1.4rem;">
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
    "
            type="text"
            id="weight"
            name="user_weight"
            placeholder="Enter this month weight"
          />
          <input style="    border-radius: 0;
    background-color: #eacb5a;
    padding: 1rem 1.4rem;
    font-size: 1.4rem;"
          class="btn--input btn--input--full"
          id="sign-up-btn"
          type="submit"
          value="ADD WEIGHT"
        />
</form>
  <div class="stat-weight-inside">

</div>
<div>
  <canvas id="myChart"></canvas>
</div>
</div>  <div><div class="stat-ranking">
  <h3>Consistency montlhy ranking</h3>
 
</div>
<div  class="ranking-list" style="margin:0;">
<div>
<ul style="background: #2f2f2f;color: #fff;border-left: 2.4rem solid #282828;">

<li>Score</li>
<li>Name</li>

</ul>
</div><br />
<?php

$sql = "SELECT * FROM Sessions ORDER BY session DESC";
$result = $link->query($sql);


while($row = $result->fetch_assoc()){

  if($row["user"] != ""){

    echo "

<div>
<ul>

<li>". $row["session"] ."</li>
<li>". $row["user"] ."</li>

</ul>
</div>


<br /> ";

  }

}



?></div></div>
        <div><div class="stat-sessions">
  <h3>Sessions left this month</h3>
</div>
<h4 style="text-align: center;font-size: 4.6rem;background: #efefef;padding: 2.4rem;"><?php 

if($user_frequency==0){

  echo 8-intval($user_score);

}else {

  echo 12-intval($user_score);

}

?></h4>

</div>

       
       
<div>
          <div class="stat-quote">
            <h3>Monthly Quote</h3>
          </div>
          <div class="quote" style="width:100%;">
            <div class="container">
              <p class="typewriter">
                <span
                  data-text="I don't tell people You're okay the way that you are. That's not the right story., The right story is You're way less than you could be.'"
                ></span>
              </p>
            </div>
            <span class="author">Jordan Peterson</span>
          </div>
        </div>
      </div>
      <div class="dash-edit grid container sign-up">
        <form action="UpdateProfil.php"
 method="POST" enctype="multipart/form-data"
>
          <div class="center">
            <br /><br /><br />
            <h3>Edit Profil</h3>
            <br /><br /><br />
            <div
              style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 2rem;
              "
            >
              <p class="heading-profil">Your Photo</p>

              <img
                class="profil-picture"
                src="<?php echo "$user_img" ?>"
                alt="Profil picture"
              />
            </div>
            <input type="file" class="upload-btn"  name="uploadfile"
                   value=""
/> <br /><br /><br />
            <label for="name">Name :</label> <br /><br />
            <input
              type="text"
              id="name"
              name="user_name"
              value="<?php echo $name ?>"
            />
            <label for="email">Email :</label> <br /><br />
            <input
              type="email"
              id="mail"
              name="user_email"
              value="<?php echo $user_email ?>"
            />

            <label for="password">New Password :</label> <br /><br />
            <input
              type="password"
              id="password"
              name="user_password"
              value="<?php echo $user_password ?>"
            />
            <label>Update Age :</label> <br /><br />
            <br />
            <div>
              <input
                type="radio"
                id="under_13"
                value="under_13"
                name="user_age"
              <?php if($user_age==1) echo "checked"; ?>/>
              <label for="under_13">Under 13</label>
            </div>
            <div>
              <input
                type="radio"
                id="over_13"
                value="over_13"
                name="user_age"
                <?php if($user_age==0) echo "checked"; ?>/>
              <label for="over_13">Over 13</label>
            </div>

            
            <label for="bio">Bio :</label> <br /><br />
            <textarea id="bio" name="user_bio">
           <?php echo $user_bio ?>
            
            </textarea
            >
            <label for="Frequency">Frequency :</label><br /><br />
            <select id="frequency" name="user_frequency">
              <?php
              
              if($user_frequency==1){

?> <option value="2">Twice a week</option>
<option value="3">Three time a week</option><?php

              } else {

                ?> <option value="3">Three time a week</option><option value="2">Twice a week</option>
                <?php
              }
              
              ?>
             
            </select>
            <input
              class="btn--input btn--input--full"
              id="sign-up-btn"
              type="submit"
              value="Update Profil Information"
            />
          </div>
        </form>
      </div>
<div>


</div>    </section>
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
    <script>
  const labels = [];

  <?php
for($i=0;$i<count($dateChart);$i++){?>

labels.push(<?php echo json_encode($dateChart[$i]); ?>);

<?php
}

?>

  const data = {
    labels: labels,
    datasets: [{
      label: 'Weight per Day',
      backgroundColor: '#f2e09c',
      borderColor: '#f2e09c',
      data:   <?php
echo json_encode($dateChart4);
?>,
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
 
  </body>
</html>
