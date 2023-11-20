<!-- <?php require_once "config.php";
session_start();

// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//   header("location: dashboard.php");
//   exit;  
// } else {

// }

$name = $_SESSION["user_name"];

 ?> -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- head -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Confidence & Basic Work is a training club for muay thai, kick boxing and MMA athletes."
    />
    <link rel="icon" type="image/x-icon" href="img/favicon.png" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="manifest" href="manifest.webmanifest" />
    <title>Confidence & Basic Work</title>
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

    <!-- Reusable section can't be in the main -->
    <main>
      <!-- Hero sectin 100vh -->
      <section class="hero-section">
        <header class="header container">
          <div class="logo">
            <a href="index.php"
              ><img
                src="img/logo-black.png"
                alt="Confidence & Basic work logo"
                class="logo-black"
            /></a>
          </div>
          <nav>
            <ul class="nav-list">
              <li><a href="#aboutus" class="main-nav-link">About us</a></li>
              <li><a href="#session" class="main-nav-link">Session</a></li>
              <li>
                <a href="#contact" class="main-nav-link">Contact</a>
              </li>
              <li>
               
                  <?php 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

?>
 <a href="dashboard.php" class="main-nav-link cta-nav-link"
                  ><?php echo $name; ?></a
                >
<?php

} else {
  
  ?> <a href="sign-in.php" class="main-nav-link cta-nav-link"
  >Sign in</a
><?php

}
                  ?>
                 
              </li>
            </ul>
            <ion-icon
              class="icon-mobile-nav open"
              name="menu-outline"
              role="img"
              aria-label="menu outline"
            ></ion-icon>

            <ion-icon
              class="icon-mobile-nav close"
              name="close-outline"
              role="img"
              aria-label="menu outline"
            ></ion-icon>
          </nav>
        </header>
        <div class="hero-box container">
          <div>
            <h1 class="primary-heading">
              Confidence & Basic Work, the number one muay thai training club in
              Oran
            </h1>
            <span class="quote-author">— Jordan peterson </span>
            <p class="hero-description">
              A harmless man is not a good man. A good man is a very dangerous
              man who has that under voluntary control.
            </p>
            <?php 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

?>

<?php

} else {
  
  ?>             <a href="sign-up.php" class="btn btn--full">Join the team</a>
  <?php

}
                  ?>
            <a href="#aboutus" class="btn btn--outline">Learn more</a>
          </div>
        </div>
      </section>
      <!-- About section -->
      <section id="aboutus" class="about-section">
        <div class="container">
          <p class="section-name">— About us —</p>
          <h2 class="section-title">
            Years of experience as an athlete and as a coach
          </h2>
        </div>
        <div class="section-box container grid grid--2-cols">
          <div class="img-box">
            <img src="img/section-about.jpg" alt="Coach in the training club" />
          </div>
          <div class="text-box">
            <p class="step-prehead">The training club</p>
            <h3 class="heading-tertiary">S18 Training Club</h3>
            <p class="step-description">
              The club opened his doors almost a year ago, since then many
              athletes have been trained whether beginners, intermediaite or
              professional in order to excel and achieve their goals.

              <br /><br />We do our best in order to take all the essential
              points into consideration during our sessions, whether it is the
              intensity of the session, the exercises chosen or the time.
            </p>
          </div>
        </div>
        <div class="section-box container grid grid--2-cols">
          <div class="text-box">
            <p class="step-prehead">The coach</p>
            <h3 class="heading-tertiary">Ayoub Sergma</h3>
            <p class="step-description">
              31 years old, Sergma Ayoub Seddam is an Algerian athlete, more
              precisely from Oran. He won
              <strong>the world university championship</strong> which took
              place in Thailand in 2015 as well as several other titles.

              <br /><br />He began his career at ASMO with three titles as Oran
              champion and two others as Algerian champion. <br />
              <br />
              Currently thanks to the advice of his team made up of competent
              people, and the experience he was able to acquire, he became a
              coach in S18 Training Club.
            </p>
          </div>
          <div class="img-box">
            <img src="img/section-coach.jpg" alt="Coach in the training club" />
          </div>
        </div>
      </section>
      <!-- Session section -->
      <section id="session" class="session-section">
        <div class="container">
          <p class="section-name">— Session —</p>
          <h2 class="section-title">One hour of basic work to exceed</h2>
        </div>
        <div class="container">
          <div class="session-video">
            <iframe
              class="session-video-iframe"
              title="Video session of coaching"
              allowfullscreen=""
              name="wistia_embed"
              src="https://fast.wistia.net/embed/iframe/gjxq8azxpr"
            ></iframe>
          </div>
        </div>

        <div class="session-steps container grid grid--4-cols">
          <div>
            <ion-icon
              name="bicycle-outline"
              role="img"
              class="md hydrated"
              aria-label="bicycle outline"
            ></ion-icon>
            <p class="feature-title">Warming up</p>
            <p class="feature-text">
              The session begin with a warming up of 3 minutes doing some
              cardio, steps and jumping.
            </p>
          </div>
          <div>
            <ion-icon
              name="fitness-outline"
              role="img"
              class="md hydrated"
              aria-label="fitness outline"
            ></ion-icon>
            <p class="feature-title">Coordination exercises</p>
            <p class="feature-text">
              Then we jump into the boxing bag with some coordination exercices
              in order to warmp up the body and especially the shoulders.
            </p>
          </div>
          <div>
            <ion-icon
              name="people-outline"
              role="img"
              class="md hydrated"
              aria-label="people outline"
            ></ion-icon>
            <p class="feature-title">Partner exercise</p>
            <p class="feature-text">
              Repetition is mother of everything, we repeat in each session
              every mouvement that we have learned in order to make it become a
              habit.
            </p>
          </div>
          <div>
            <ion-icon
              name="invert-mode-outline"
              role="img"
              class="md hydrated"
              aria-label="invert mode outline"
            ></ion-icon>
            <p class="feature-title">Meditation &amp; Relaxation</p>
            <p class="feature-text">
              We end up with some stretching and meditation in order to recover.
            </p>
          </div>
        </div>
      </section>
      <!-- Testimonials section -->
      <!-- <section id="testimonials" class="testimonials-section">
        <div class="container">
          <p class="section-name">— Testimonials —</p>
          <h2 class="section-title">
            Discipline and perseverance, this is what we expect from our
            athletes
          </h2>
        </div>
        <div class="testimonials-box container grid grid--4-cols">
          <div class="testimonial">
            <div class="testimonial-img-container">
              <img
                class="testimonial-img"
                src="img/customers/customer-1.jpg"
                alt="Customer profil picture"
              />
            </div>
            <span class="testimonial-author">Nabil Keita</span>
            <span class="testimonial-date">02-04-2022</span>
            <p class="testimonial-description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Blanditiis incidunt quae eligendi voluptate deserunt mollitia
              soluta atque eveniet in.<br /><br />
              Eius culpa cum voluptates
            </p>
          </div>
          <div class="testimonial">
            <div class="testimonial-img-container">
              <img
                class="testimonial-img"
                src="img/customers/customer-2.jpg"
                alt="Customer profil picture"
              />
            </div>
            <span class="testimonial-author">Mo Saleh</span>
            <span class="testimonial-date">24-04-2022</span>
            <p class="testimonial-description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Blanditiis incidunt quae eligendi voluptate deserunt mollitia
              soluta atque eveniet in.
            </p>
          </div>
          <div class="testimonial">
            <div class="testimonial-img-container">
              <img
                class="testimonial-img"
                src="img/customers/customer-3.jpg"
                alt="Customer profil picture"
              />
            </div>
            <span class="testimonial-author">Ryad Mahrez</span>
            <span class="testimonial-date">04-04-2022</span>
            <p class="testimonial-description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Blanditiis incidunt quae eligendi voluptate deserunt mollitia
              soluta atque eveniet in.<br /><br />
              Eius culpa cum voluptates autem voluptatum tenetur qui magni
              incidunt distinctio.
            </p>
          </div>
          <div class="testimonial">
            <div>
              <div class="testimonial-img-container">
                <img
                  class="testimonial-img"
                  src="img/customers/customer-4.jpg"
                  alt="Customer profil picture"
                />
              </div>
              <span class="testimonial-author">Sergio Ramos</span>
              <span class="testimonial-date">14-03-2022</span>
            </div>
            <p class="testimonial-description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Blanditiis incidunt
            </p>
          </div>
        </div>
      </section> -->
      <!-- Contact section -->
      <section id="contact" class="contact-section">
        <div class="container">
          <p class="section-name">— Contact —</p>
          <h2 class="section-title">Contact us and we will guide you</h2>
        </div>
        <div class="contact-form-box container">
          <p>
            You're hesitating ? you are still not sure of what todo ? fill out
            this form and we will contact you as soon as possible.
          </p>
          <form name="sign-up" class="contact-form">
            <div>
              <label for="full-name">Full Name</label>
              <input
                id="full-name"
                type="text"
                placeholder="Mohammed"
                name="full-name"
                required=""
              />
            </div>

            <div>
              <label for="phone">Phone number</label>
              <input
                id="phone"
                type="tel"
                placeholder="+213 777 777 777"
                name="phone"
                required=""
              />
            </div>

            <div>
              <label for="select-where">Where did you hear from us?</label>
              <select id="select-where" name="select-where" required="">
                <option value="">Please choose one option:</option>
                <option value="friends">Friends and family</option>
                <option value="youtube">YouTube</option>
                <option value="ad">Facebook</option>
                <option value="others">Others</option>
              </select>
            </div>

            <div>
              <label>Click below to send your request</label>
              <button class="btn btn--form">Send request</button>
            </div>
          </form>
        </div>
      </section>
    </main>
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
