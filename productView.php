<?php include_once './header.php';
if (isset($_GET['code'])) {
?>
    <!--==================== GET PRODUCT ====================-->
    <?php
    $productView = new \DAO\Product();
    $getProduct = $productView->showProduct($_GET['code']);
    $disc = $getProduct[0][3] - ($getProduct[0][3] * ($getProduct[0][4] / 100));
    ?>
    <!--==================== SHOW PRODUCT HTML ====================-->
    <section class="section about" id="about">
        <div class="about__container container grid">
            <div class="about__data">
                <h2 class="section__title about__title">
                    <?php echo $getProduct[0][2]; ?><br />
                    <?php echo $getProduct[0][1]; ?>
                </h2>
                <p class="about__description">
                    Price: <?php echo $getProduct[0][3]; ?> dkk
                </p>
                <?php if ($getProduct[0][4] > 0) { ?>
                    <p style="text-decoration: underline; color: red;" class="about__description">
                        Discounted Price:
                        <?php echo $disc ?> dkk
                    </p>
                <?php } ?>
                <p class="about__description">
                    Product Stock:
                    <?php echo $getProduct[0][5]; ?>
                </p>
                <p class="about__description">
                    Box Sale:
                    <?php echo $getProduct[0][6]; ?>
                </p>
                <p class="about__description">
                    Description: <br>
                    <?php echo $getProduct[0][7]; ?>
                </p>
                <form method="post" action="./productView.php?action=add&code=<?php echo $getProduct[0][0]; ?>">
                    <input type="hidden" name="quantity" value="1" />
                    <button type="submit" value="Add to cat" class="button">Add To Cart</button>
                </form>
            </div>

            <img src="<?php echo $getProduct[0][8]; ?>" alt="" class="about__img" />
        </div>
    </section>
<?php } else {
    header('Location: ./index.php?status=0');
}
?>

<?php include_once './footer.php'; ?>