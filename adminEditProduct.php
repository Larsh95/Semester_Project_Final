<?php include_once './header.php';
include './includes/logoutinator.inc.php';
if (isset($_GET['ProductID'])) {
?>
    <!--==================== GET USER HTML ====================-->
    <?php
    $productView = new \DAO\Product();
    $getProduct = $productView->showProduct($_GET['ProductID']);
    ?>
    <!--==================== EDIT PRODUCT HTML ====================-->
    <section class="section login">
        <div class="newsletter__container container">
            <h3 class="section__title">Editing Product: <?php echo $getProduct[0][2]; ?></h3>
            <form class="login__form" name="contact" method="post" action="./includes/UpdateProduct.inc.php">
                <div style="border-bottom: 2px solid white !important;">
                    <label for="pType">Product Type:</label>
                    <select id="pType" name="pType" type="text" value="<?php echo $getProduct[0][1]; ?>" class="login__input" required="" aria-required="true" style="fontsize: 3rem; border: none !important; outline: none !important;">
                        <option hidden disabled selected value="">Select Product Type</option>
                        <option value="<?php echo $getProduct[0][1]; ?>"> <?php echo $getProduct[0][1]; ?> </option>
                        <option value="White Wine">White Wine</option>
                        <option value="Red Wine">Red Wine</option>
                        <option value="Whiskey">Whiskey</option>
                        <option value="Vodka">Vodka</option>
                        <option value="Accessories">Accessories</option>

                    </select>
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <label for="pName">Product Name:</label>
                    <input id="pName" name="pName" value="<?php echo $getProduct[0][2]; ?>" type="text" class="login__input" required="" aria-required="true">
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <label for="pPrice">Product Price:</label>
                    <input id="pPrice" name="pPrice" value="<?php echo $getProduct[0][3]; ?>" type="text" class="login__input" required="" aria-required="true">
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <label for="pDiscount">Discount:</label>
                    <input id="pDiscount" name="pDiscount" value="<?php echo $getProduct[0][4]; ?>" type="text" class="login__input" required="" aria-required="true">
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <label for="pStock">Product Stock:</label>
                    <input id="pStock" name="pStock" value="<?php echo $getProduct[0][5]; ?>" type="text" class="login__input" required="" aria-required="true">
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <label for="pBoxsale">Box Sale:</label>
                    <select id="pBoxsale" name="pBoxsale" value="<?php echo $getProduct[0][6]; ?>" type="text" class="login__input" required="" aria-required="true" style="fontsize: 3rem; border: none !important; outline: none !important;">
                        <option hidden disabled selected value="">Select if Box Sale</option>
                        <option value="<?php echo $getProduct[0][6]; ?>"> <?php echo $getProduct[0][6]; ?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>

                    </select>
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <label for="pDescription">Product Description:</label>
                    <input id="pDescription" name="pDescription" value="<?php echo $getProduct[0][7]; ?>" type="text" class="login__input" required="" aria-required="true">
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <label for="pImgUrl">Product Image URL:</label>
                    <input id="pImgUrl" name="pImgUrl" value="<?php echo $getProduct[0][8]; ?>" type="text" class="login__input" required="" aria-required="true">
                </div>
                </br>
                <input type="hidden" name="entryid" value="<?php echo $getProduct[0][0]; ?>">
                <button class="button" type="submit" name="submit">Update</button>
            </form>

        </div>
    </section>


<?php } else {
    header("Location: ./adminEditProduct.php?status=0");
}
?>

<?php include_once './footer.php'; ?>