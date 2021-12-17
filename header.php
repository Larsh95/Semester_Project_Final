<?php
session_start();
require './vendor/autoload.php';
require_once('./sample-config.php');
?>


<!--==================== HTML START ====================-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--=============== MAIN JS ===============-->
  <script src="../assets/js/main.js"></script>

  <!--=============== reCaptcha ===============-->
  <script src="https://www.google.com/recaptcha/api.js"></script>

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon" />

  <!--=============== BOXICONS ===============-->
  <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>

  <!--=============== SWIPER CSS ===============-->
  <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css" />
  <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css" />

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="./assets/css/styles.css" />
  <link rel="stylesheet" href="../assets/css/styles.css" />

  <title>Wine-Time</title>
</head>

<body>
  <!--==================== HEADER ====================-->
  <header class="header" id="header">
    <nav class="nav container">
      <a href="./index.php" class="nav__logo">
        <img src="./assets/img/logo.png" alt="" class="nav__logo-img" />
        Wine
      </a>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <?php
          if (isset($_SESSION["id"])) {
            if ($_SESSION["rank"] === '0') {
          ?>
              <li class='nav__item'><a href='./index.php' class='nav__link'>Home</a></li>
              <li class='nav__item'><a href='./shop.php' class='nav__link'>Shop</a></li>
              <li class='nav__item'><a href='./profile.php' class='nav__link'>Profile</a></li>
              <li class='nav__item'><a href='./adminUsers.php' class='nav__link'>Admin</a></li>
              <li class='nav__item'><a href='./includes/logout.inc.php' class='nav__link'>Logout</a></li>
            <?php } elseif ($_SESSION["rank"] === '1') { ?>
              <li class='nav__item'><a href='./index.php' class='nav__link'>Home</a></li>
              <li class='nav__item'><a href='./shop.php' class='nav__link'>Shop</a></li>
              <li class='nav__item'><a href='./profile.php' class='nav__link'>Profile</a></li>
              <li class='nav__item'><a href='./includes/logout.inc.php' class='nav__link'>Logout</a></li>
            <?php }
          } else { ?>
            <li class='nav__item'><a href='./index.php' class='nav__link'>Home</a></li>
            <li class='nav__item'><a href='./shop.php' class='nav__link'>Shop</a></li>
            <li class='nav__item'><a href='./signup.php' class='nav__link'>Sign Up</a></li>
            <li class='nav__item'><a href='./login.php' class='nav__link'>Login</a></li>
          <?php  }
          ?>
          <li class='nav__item'><a href='./about.php' class='nav__link'>About</a></li>
          <?php
          if (!empty($_SESSION["cartItem"])) {
          ?>
            <a href="./cart.php" style="border-color: green !important;" class="button button--ghost">Shopping Cart</a>
          <?php
          } else { ?>
            <a href="./cart.php" style="border-color: red !important;" class="button button--ghost">Shopping Cart</a>
          <?php  }
          ?>
        </ul>

        <div class="nav__close" id="nav-close">
          <i class="bx bx-x"></i>
        </div>

      </div>

      <div class="nav__toggle" id="nav-toggle">
        <i class="bx bx-grid-alt"></i>
      </div>
    </nav>
  </header>


  <main class="main">
    <?php include 'includes/errorhandle.inc.php';
    require './includes/CartSwitch.inc.php'; ?>