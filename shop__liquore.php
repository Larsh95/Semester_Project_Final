<!--==================== INCLUDES ====================-->
<?php
include_once './header.php';
include_once './includes/shopCat.inc.php';

use \DAO\Shop;
?>
<!--==================== SORT BY ====================-->

<section class="section utility" id="utility">
    <h2 class="section__title">Liquore</h2>
    <div style="float: right !important; padding-right: 8em; padding-top: 1em;">
        <form class="login__form">
            <select name="sortBy" style="height: 3rem; border: none !important; outline: none !important; background: none; color: white; font-size: 18px">
                <option value="pName">Name</option>
                <option value="pPrice">Price</option>
                <option value="pType">Type</option>
            </select>
            <button class="button" type="submit" formaction="?" formmethod="post">Sort By</button>
        </form>
        <a href=""></a>
    </div>

    <!--==================== Liquore ====================-->
    <div class="utility__container container grid">

        <?php
        $liquore = new Shop;
        $liquore->getLiquore();
        ?>

    </div>
</section>
<?php include_once './footer.php'; ?>