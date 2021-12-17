<?php
include 'header.php';
?>
<!--==================== LOGIN FORM ====================-->
<section class="section login">
  <div class="newsletter__container container">
    <h2 class="section__title">Login</h2>
    <p class="login__description">
      Don't have a login? Sign up
      <a href="signup.php" class="nav__link">HERE</a>
    </p>
    <div class="login__pad">
      <form action="./includes/login.inc.php" method="post" class="login__form">
        <input type="text" name="user" placeholder="Username" class="login__input from_auto_off" autocomplete="off" />
        <input type="password" name="pass" placeholder="Password" class="login__input from_auto_off" autocomplete="off" />
    </div>
    <button type="submit" name="submit" value="Login" class="button">
      Login
    </button>
  </div>
  </form>
</section>
</main>
<?php
include 'footer.php';
?>