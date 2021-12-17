<?php
include_once 'header.php';
$item_total = 0;
if (isset($_GET["code"])) {
    $code = $_GET["code"];
}

if (isset($_SESSION["cartItem"])) {
    foreach ($_SESSION["cartItem"] as $item) {

        $item_total += ($item["price"] * $item["quantity"]);
    }
}
?>
<!--==================== PAY FORM ====================-->
<section class="section login">
    <div class="newsletter__container container">
        <h2 class="section__title">Choose payment option</h2>
        <div class="login__pad">
            <form action="./sample-charge.php?code=<?php echo $code ?>" method="post" class="login__form">
                <button type="submit" style="color: lightskyblue !important;" class="nav__link button--ghost">PAY WITH STRIPE!</button>
            </form>
            <!-- <div style="margin: auto !important;" class="g-recaptcha" data-sitekey="6LfQ2lodAAAAADkIrIc-6nd_GqOAxOuCMnnlyyfS"></div> -->
        </div>
    </div>
    </form>
</section>
</main>
<?php

include_once 'footer.php';
?>