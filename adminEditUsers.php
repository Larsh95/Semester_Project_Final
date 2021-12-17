<?php include_once './header.php';
include './includes/logoutinator.inc.php';
if (isset($_GET['id'])) {
?>
    <!--==================== GET USER HTML ====================-->
    <?php
    $userView = new \DAO\Admin();
    $user = $userView->showUser($_GET['id']);
    ?>
    <section class="section login">
        <div class="newsletter__container container">
            <h3 class="section__title">Editing user <?php echo $user[0][4] ?></h3>
            <form class="login__form" name="contact" method="post" action="./includes/UpdateUser.inc.php">
                <div style="border-bottom: 2px solid white !important;">
                    <label for="userName">Username:</label>
                    <input id="userName" name="userName" type="text" value="<?php echo $user[0][4] ?>" class="login__input" required="" aria-required="true">
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <label for="firstName">First Name:</label>
                    <input id="firstName" name="firstName" type="text" value="<?php echo $user[0][2] ?>" class="login__input" required="" aria-required="true">
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <label for="lastName">Last Name:</label>
                    <input id="lastName" name="lastName" type="text" value="<?php echo $user[0][3] ?>" class="login__input" required="" aria-required="true">
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <label for="email">E-Mail:</label>
                    <input id="email" name="email" type="email" value="<?php echo $user[0][6] ?>" class="login__input" required="" aria-required="true">
                </div>
                </br>
                <input type="hidden" name="userID" value="<?php echo $user[0][0] ?>">
                <button class="button" type="submit" name="submit">Update
                </button>
            </form>
        </div>
        </div>
    </section>

<?php
} else {
    header("Location: ./adminUsers.php?status=0");
} ?>

<?php include_once './footer.php'; ?>