<?php

include_once './header.php';
include_once './includes/adminTabs.inc.php';
include './includes/logoutinator.inc.php';
?>
<section class="section login">
    <div class="newsletter__container container">
        <h3 class="section__title">Add Product</h3>
        <form class="login__form" name="contact" method="post" action="./includes/Product.inc.php">
            <div style="border-bottom: 2px solid white !important;">
                <label for="pType">Product Type:</label>
                <select id="pType" name="pType" type="text" class="login__input" required="" aria-required="true" border: none !important; outline: none !important;">
                    <option value="White Wine">White Wine</option>
                    <option value="Red Wine">Red Wine</option>
                    <option value="Whiskey">Whiskey</option>
                    <option value="Vodka">Vodka</option>
                    <option value="Brie">Brie</option>
                    <option value="Danish Cheese">Danish Cheese</option>
                </select>
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="pName">Product Name:</label>
                <input id="pName" name="pName" type="text" class="login__input" required="" aria-required="true">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="pPrice">Product Price:</label>
                <input id="pPrice" name="pPrice" type="text" class="login__input" required="" aria-required="true">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="pDiscount">Discount:</label>
                <input id="pDiscount" name="pDiscount" type="text" class="login__input">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="pStock">Product Stock:</label>
                <input id="pStock" name="pStock" type="text" class="login__input" required="" aria-required="true">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="pBoxsale">Box Sale:</label>
                <select id="pBoxsale" name="pBoxsale" type="text" class="login__input" required="" aria-required="true" border: none !important; outline: none !important;">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="pDescription">Product Description:</label>
                <input id="pDescription" name="pDescription" type="text" class="login__input" required="" aria-required="true">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="pImgUrl">Product Image URL:</label>
                <input id="pImgUrl" name="pImgUrl" type="text" class="login__input" required="" aria-required="true">
            </div>
            </br>
            <button class="button" type="submit" name="submit">Add</button>
        </form>
    </div>
</section>
<!--==================== SORT BY ====================-->

<section class="section utility" id="utility">
    <h2 class="section__title">Edit Products</h2>
    <div style="float: right !important; padding-right: 8em; padding-top: 1em;">
        <form class="login__form">
            <select name="sortBy" style="height: 3rem; border: none !important; outline: none !important; background: none; color: white; font-size: 18px">
                <option value="pName">Name</option>
                <option value="pPrice">Price</option>
                <option value="pType">Type</option>
            </select>
            <button class="button" type="submit" formaction="?" formmethod="post">Sort By</button>
        </form>

    </div>

    <!--==================== WINE ====================-->
    <div class="utility__container container grid">

        <?php

        use \DAO\Product;

        $ProductView = new Product();
        $ProductView->getProducts();
        ?>
    </div>
</section>



<?php include_once './footer.php'; ?>