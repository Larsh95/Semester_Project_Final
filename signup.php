<?php
include_once 'header.php';
?>
<!--==================== SIGNUP FORM ====================-->
<section class="section login">
  <div class="newsletter__container container">
    <h2 class="section__title">SIGN UP</h2>
    <p class="login__description">
      Already have an account? Login
      <a href="login.php" class="nav__link">HERE</a>
    </p>
    <div class="login__pad">
      <form action="includes/signup.inc.php" method="post" class="login__form">
        <input type="text" name="fName" placeholder="First Name" class="login__input" autocomplete="off" />
        <input type="text" name="lName" placeholder="Last Name" class="login__input" autocomplete="off" />
        <input type="text" name="email" placeholder="E-mail" class="login__input" autocomplete="off" />
        <input type="text" name="user" placeholder="Username" class="login__input" autocomplete="off" />
        <input type="password" name="pass" placeholder="Password" class="login__input" autocomplete="off" />
        <input type="password" name="confirm_password" placeholder="Confirm Password" class="login__input" autocomplete="off" />
        <div style="margin: auto !important;" class="g-recaptcha" data-sitekey="6LfQ2lodAAAAADkIrIc-6nd_GqOAxOuCMnnlyyfS"></div>
    </div>
    <button type="submit" name="submit" value="SignaUp" class="button">
      Sign Up
    </button>
  </div>
  </form>
</section>
</main>
<?php
include_once 'footer.php';
?>