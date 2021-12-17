<?php
include_once 'header.php';

if (isset($_SESSION["id"])) {
    $userID = $_SESSION["id"];
    $userFname = $_SESSION["userFname"];
    $userLname = $_SESSION["userLname"];
    $userEmail = $_SESSION["userEmail"];
}

$pItems = serialize($_SESSION["cartItem"]);

$item_total = 0;

if (isset($_SESSION["cartItem"])) {
    foreach ($_SESSION["cartItem"] as $item) {

        $item_total += ($item["price"] * $item["quantity"]);
    }
}

?>
<!--==================== CHECKOUT FORM ====================-->
<section class="section login">
    <div class="newsletter__container container">
        <h2 class="section__title">Checkout Details</h2>
        <div class="login__pad">
            <form action="includes/checkout.inc.php" method="post">

                <?php if (isset($_SESSION["id"])) { ?>
                    <input type="text" name="fname" placeholder="First Name" value="<?php echo $userFname; ?>" class="login__input" autocomplete="off" />
                    <input type="text" name="lname" placeholder="Last Name" value="<?php echo $userLname; ?>" class="login__input" autocomplete="off" />
                    <input type="text" name="email" placeholder="E-Mail" value="<?php echo $userEmail; ?>" class="login__input" autocomplete="off" />
                <?php } else { ?>
                    <input type="text" name="fname" placeholder="First Name" class="login__input" autocomplete="off" />
                    <input type="text" name="lname" placeholder="Last Name" class="login__input" autocomplete="off" />
                    <input type="text" name="email" placeholder="E-Mail" class="login__input" autocomplete="off" />
                <?php } ?>
                <input type="text" name="postalCode" placeholder="Postal Code" class="login__input" autocomplete="off" />
                <input type="text" name="city" placeholder="City" class="login__input" autocomplete="off" />
                <abbr title="Kirkegade 123, st tv"><input type="text" name="address" placeholder="Street Address" class="login__input" autocomplete="off" /></abbr>
                <input type="text" name="phoneNum" placeholder="Phone Number" class="login__input" autocomplete="off" />
                <?php if (isset($_SESSION["id"])) { ?>
                    <input type="hidden" name="userID" value="<?php echo $userID; ?>" class="login__input" autocomplete="off" />
                <?php } else { ?>
                    <input type="hidden" name="userID" value="NEJ" class="login__input" autocomplete="off" />
                <?php } ?>
                <input type="hidden" name="totalPrice" value="<?php echo $item_total; ?>" class="login__input" autocomplete="off" />
                <input type="hidden" name="pItems" value='<?php echo $pItems; ?>' class="login__input" autocomplete="off" />
                <button type="submit" name="submit" style="color: lightskyblue !important;" class="nav__link button--ghost">Stripe Pay</button>
                <!-- <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $stripe['publishable_key']; ?>" data-description="Wine-Time Checkout" data-amount="<?php echo $item_total ?>00" data-locale="auto" data-currency="dkk"></script>
                <script>
                    document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
                </script> -->
            </form>
        </div>
    </div>
    </form>
</section>
</main>
<?php

include_once 'footer.php';
?>