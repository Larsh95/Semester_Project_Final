<?php

namespace DAO;

class Shop extends DbCon
{
    public function getLiquore()
    {
        $sortBy = (isset($_POST['sortBy']) ? $_POST['sortBy'] : NULL);
        $sqlGet = "SELECT * FROM `viewLiquore`";
        if ($sortBy != NULL) {
            $sqlGet .= ' ORDER BY ' . $sortBy;
        }

        $stmt = $this->connect()->prepare($sqlGet);
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../shop__liquore.php?error=stmtfailed");
            exit();
        }

        $getProducts = $stmt->fetchAll();

        foreach ($getProducts as $getProduct) {
            if ($getProduct['pDiscount'] > 0) {
                echo '<div class="utility__content">';
                echo '<form method="post" action="./shop__liquore.php?action=add&code=' . $getProduct['ProductID'] . '"';
                echo '><img src="' . $getProduct['pImgUrl'] . '" alt="" class="utility__img"/>';
                echo '<h3 class="new__title">' . $getProduct['pName'] . '</h3>';
                echo '<span class="new__subtitle">' . $getProduct['pType'] . '</span>';
                $disc = $getProduct['pPrice'] - ($getProduct['pPrice'] * ($getProduct['pDiscount'] / 100));
                echo '<span class="new__price"> ' . $disc . ' dkk </span>';
                echo '<span class="new__discount">' . $getProduct['pPrice'] . ' dkk</span>';
                echo '<input type="hidden" name="quantity" value="1"/><div style = "display: flex; justify-content: space-evenly; padding: 0.8rem 0rem 0rem 0rem !important;">';
                echo '<a><button type="submit" formaction="./productView.php?action=?&code=' . $getProduct['ProductID'] . '" value="Add to cart" class="button">';
                echo '<i class="bx bx-wine new__icon"></i>';
                echo '</button></a>';
                echo '<a><button type="submit" value="Add to cart" class="button">';
                echo '<i class="bx bx-cart-alt new__icon"></i>';
                echo '</button></a></div>';
                echo '</form>';
                echo '</div>';
            } else {
                echo '<div class="utility__content">';
                echo '<form method="post" action="./shop__liquore.php?action=add&code=' . $getProduct['ProductID'] . '"';
                echo '><img src="' . $getProduct['pImgUrl'] . '" alt="" class="utility__img"/>';
                echo '<h3 class="new__title">' . $getProduct['pName'] . '</h3>';
                echo '<span class="new__subtitle">' . $getProduct['pType'] . '</span>';
                echo '<span class="new__price">' . $getProduct['pPrice'] . ' dkk </span>';
                echo '<input type="hidden" name="quantity" value="1"/><div style = "display: flex; justify-content: space-evenly; padding: 0.8rem 0rem 0rem 0rem !important;">';
                echo '<a><button type="submit" formaction="./productView.php?action=?&code=' . $getProduct['ProductID'] . '" value="Add to cart" class="button">';
                echo '<i class="bx bx-wine new__icon"></i>';
                echo '</button></a>';
                echo '<a><button type="submit" value="Add to cart" class="button">';
                echo '<i class="bx bx-cart-alt new__icon"></i>';
                echo '</button></a></div>';
                echo '</form>';
                echo '</div>';
            }
        }
    }
    public function getWine()
    {
        $sortBy = (isset($_POST['sortBy']) ? $_POST['sortBy'] : NULL);
        $sqlGet = 'SELECT * FROM `viewWine`';
        if ($sortBy != NULL) {
            $sqlGet .= ' ORDER BY ' . $sortBy;
        }
        $stmt = $this->connect()->prepare($sqlGet);
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../shop_wine.php?error=stmtfailed");
            exit();
        }

        $getProducts = $stmt->fetchAll();

        foreach ($getProducts as $getProduct) {
            if ($getProduct['pDiscount'] > 0) {
                echo '<div class="utility__content">';
                echo '<form method="post" action="./shop_wine.php?action=add&code=' . $getProduct['ProductID'] . '"';
                echo '><img src="' . $getProduct['pImgUrl'] . '" alt="" class="utility__img"/>';
                echo '<h3 class="new__title">' . $getProduct['pName'] . '</h3>';
                echo '<span class="new__subtitle">' . $getProduct['pType'] . '</span>';
                $disc = $getProduct['pPrice'] - ($getProduct['pPrice'] * ($getProduct['pDiscount'] / 100));
                echo '<span class="new__price"> ' . $disc . ' dkk </span>';
                echo '<span class="new__discount">' . $getProduct['pPrice'] . ' dkk</span>';
                echo '<input type="hidden" name="quantity" value="1"/><div style = "display: flex; justify-content: space-evenly; padding: 0.8rem 0rem 0rem 0rem !important;">';
                echo '<a><button type="submit" formaction="./productView.php?action=?&code=' . $getProduct['ProductID'] . '" value="Add to cart" class="button">';
                echo '<i class="bx bx-wine new__icon"></i>';
                echo '</button></a>';
                echo '<a><button type="submit" value="Add to cart" class="button">';
                echo '<i class="bx bx-cart-alt new__icon"></i>';
                echo '</button></a></div>';
                echo '</form>';
                echo '</div>';
            } else {
                echo '<div class="utility__content">';
                echo '<form method="post" action="./shop_wine.php?action=add&code=' . $getProduct['ProductID'] . '"';
                echo '><img src="' . $getProduct['pImgUrl'] . '" alt="" class="utility__img"/>';
                echo '<h3 class="new__title">' . $getProduct['pName'] . '</h3>';
                echo '<span class="new__subtitle">' . $getProduct['pType'] . '</span>';
                echo '<span class="new__price">' . $getProduct['pPrice'] . ' dkk </span>';
                echo '<input type="hidden" name="quantity" value="1"/><div style = "display: flex; justify-content: space-evenly; padding: 0.8rem 0rem 0rem 0rem !important;">';
                echo '<a><button type="submit" formaction="./productView.php?action=?&code=' . $getProduct['ProductID'] . '" value="Add to cart" class="button">';
                echo '<i class="bx bx-wine new__icon"></i>';
                echo '</button></a>';
                echo '<a><button type="submit" value="Add to cart" class="button">';
                echo '<i class="bx bx-cart-alt new__icon"></i>';
                echo '</button></a></div>';
                echo '</form>';
                echo '</div>';
            }
        }
    }

    public function getCheese()
    {
        $sortBy = (isset($_POST['sortBy']) ? $_POST['sortBy'] : NULL);
        $sqlGet = 'SELECT * FROM `viewCheese`';

        if ($sortBy != NULL) {
            $sqlGet .= ' ORDER BY ' . $sortBy;
        }
        $stmt = $this->connect()->prepare($sqlGet);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../shop_cheese.php?error=stmtfailed");
            exit();
        }

        $getProducts = $stmt->fetchAll();

        foreach ($getProducts as $getProduct) {
            if ($getProduct['pDiscount'] > 0) {
                echo '<div class="utility__content">';
                echo '<form method="post" action="./shop_cheese.php?action=add&code=' . $getProduct['ProductID'] . '"';
                echo '><img src="' . $getProduct['pImgUrl'] . '" alt="" class="utility__img"/>';
                echo '<h3 class="new__title">' . $getProduct['pName'] . '</h3>';
                echo '<span class="new__subtitle">' . $getProduct['pType'] . '</span>';
                $disc = $getProduct['pPrice'] - ($getProduct['pPrice'] * ($getProduct['pDiscount'] / 100));
                echo '<span class="new__price"> ' . $disc . ' dkk </span>';
                echo '<span class="new__discount">' . $getProduct['pPrice'] . ' dkk</span>';
                echo '<input type="hidden" name="quantity" value="1"/><div style = "display: flex; justify-content: space-evenly; padding: 0.8rem 0rem 0rem 0rem !important;">';
                echo '<a><button type="submit" formaction="./productView.php?action=?&code=' . $getProduct['ProductID'] . '" value="Add to cart" class="button">';
                echo '<i class="bx bx-wine new__icon"></i>';
                echo '</button></a>';
                echo '<a><button type="submit" value="Add to cart" class="button">';
                echo '<i class="bx bx-cart-alt new__icon"></i>';
                echo '</button></a></div>';
                echo '</form>';
                echo '</div>';
            } else {
                echo '<div class="utility__content">';
                echo '<form method="post" action="./shop_cheese.php?action=add&code=' . $getProduct['ProductID'] . '"';
                echo '><img src="' . $getProduct['pImgUrl'] . '" alt="" class="utility__img"/>';
                echo '<h3 class="new__title">' . $getProduct['pName'] . '</h3>';
                echo '<span class="new__subtitle">' . $getProduct['pType'] . '</span>';
                echo '<span class="new__price">' . $getProduct['pPrice'] . ' dkk </span>';
                echo '<input type="hidden" name="quantity" value="1"/><div style = "display: flex; justify-content: space-evenly; padding: 0.8rem 0rem 0rem 0rem !important;">';
                echo '<a><button type="submit" formaction="./productView.php?action=?&code=' . $getProduct['ProductID'] . '" value="Add to cart" class="button">';
                echo '<i class="bx bx-wine new__icon"></i>';
                echo '</button></a>';
                echo '<a><button type="submit" value="Add to cart" class="button">';
                echo '<i class="bx bx-cart-alt new__icon"></i>';
                echo '</button></a></div>';
                echo '</form>';
                echo '</div>';
            }
        }
    }
    public function getArrivals()
    {
        $sqlGet = 'SELECT * FROM `viewArrivals`';
        $stmt = $this->connect()->prepare($sqlGet);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        $arrivals = $stmt->fetchAll();
        // action="index.php?action=add&code=<?php echo $product_array[$aNumber]["code"];

        foreach ($arrivals as $arrival) {
            if ($arrival['pDiscount'] > 0) {
                echo '<div class="new__content swiper-slide">';
                echo '<form method="post" action="./index.php?action=add&code=' . $arrival['ProductID'] . '"';
                echo '><div class="new__tag">New</div>';
                echo '<img src="' . $arrival['pImgUrl'] . '" alt="" class="new__img" />';
                echo '<h3 class="new__title">' . $arrival['pName'] . '</h3>';
                echo '<span class="new__subtitle">' . $arrival['pType'] . '</span>';
                echo '<div class="new__prices">';
                $disc = $arrival['pPrice'] - ($arrival['pPrice'] * ($arrival['pDiscount'] / 100));
                echo '<span class="new__price"> ' . $disc . ' dkk </span>';
                echo '<span class="new__discount">' . $arrival['pPrice'] . ' dkk</span>';
                echo '</div>';
                echo '<input type="hidden" name="quantity" value="1"/><div style="display: flex; justify-content: space-evenly; padding: 0.8rem 0rem 0rem 0rem !important;">';
                echo '<a><button type="submit" formaction="./productView.php?action=?&code=' . $arrival['ProductID'] . '" value="Add to cart" class="button">';
                echo '<i class="bx bx-wine new__icon"></i>';
                echo '</button></a>';
                echo '<a><button type="submit" value="show" class="button">';
                echo '<i class="bx bx-cart-alt new__icon"></i>';
                echo '</button></a></div>';
                echo '</form>';
                echo '</div>';
            } else {
                echo '<div class="new__content swiper-slide">';
                echo '<form method="post" action="./index.php?action=add&code=' . $arrival['ProductID'] . '"';
                echo '><div class="new__tag">New</div>';
                echo '<img src="' . $arrival['pImgUrl'] . '" alt="" class="new__img" />';
                echo '<h3 class="new__title">' . $arrival['pName'] . '</h3>';
                echo '<span class="new__subtitle">' . $arrival['pType'] . '</span>';
                echo '<div class="new__prices">';
                echo '<span class="new__price">' . $arrival['pPrice'] . ' dkk</span>';
                echo '</div>';
                echo '<input type="hidden" name="quantity" value="1"/><div style = "display: flex; justify-content: space-evenly; padding: 0.8rem 0rem 0rem 0rem !important;">';
                echo '<a><button type="submit" formaction="./productView.php?action=?&code=' . $arrival['ProductID'] . '" value="Add to cart" class="button">';
                echo '<i class="bx bx-wine new__icon"></i>';
                echo '</button></a>';
                echo '<a style = "padding: 0.2rem 0.2rem 0rem 0.2rem !important;"><button type="submit" value="Add to cart" class="button">';
                echo '<i class="bx bx-cart-alt new__icon"></i>';
                echo '</button></a></div>';
                echo '</form>';
                echo '</div>';
            }
        }
    }

    public function getRandom()
    {
        $sqlGet = 'SELECT * FROM `viewRandom`';
        $stmt = $this->connect()->prepare($sqlGet);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        $randoms = $stmt->fetchAll();
        // action="index.php?action=add&code=<?php echo $product_array[$aNumber]["code"];

        foreach ($randoms as $random) {
            if ($random['pDiscount'] > 0) {
                echo '<div class="utility__content">';
                echo '<form method="post" action="./shop_cheese.php?action=add&code=' . $random['ProductID'] . '"';
                echo '><img src="' . $random['pImgUrl'] . '" alt="" class="utility__img"/>';
                echo '<h3 class="new__title">' . $random['pName'] . '</h3>';
                echo '<span class="new__subtitle">' . $random['pType'] . '</span>';
                $disc = $random['pPrice'] - ($random['pPrice'] * ($random['pDiscount'] / 100));
                echo '<span class="new__price"> ' . $disc . ' dkk </span>';
                echo '<span class="new__discount">' . $random['pPrice'] . ' dkk</span>';
                echo '<input type="hidden" name="quantity" value="1"/><div style = "display: flex; justify-content: space-evenly; padding: 0.8rem 0rem 0rem 0rem !important;">';
                echo '<a><button type="submit" formaction="./productView.php?action=?&code=' . $random['ProductID'] . '" value="Add to cart" class="button">';
                echo '<i class="bx bx-wine new__icon"></i>';
                echo '</button></a>';
                echo '<a><button type="submit" value="Add to cart" class="button">';
                echo '<i class="bx bx-cart-alt new__icon"></i>';
                echo '</button></a></div>';
                echo '</form>';
                echo '</div>';
            } else {
                echo '<div class="utility__content">';
                echo '<form method="post" action="./shop_cheese.php?action=add&code=' . $random['ProductID'] . '"';
                echo '><img src="' . $random['pImgUrl'] . '" alt="" class="utility__img"/>';
                echo '<h3 class="new__title">' . $random['pName'] . '</h3>';
                echo '<span class="new__subtitle">' . $random['pType'] . '</span>';
                echo '<span class="new__price">' . $random['pPrice'] . ' dkk </span>';
                echo '<input type="hidden" name="quantity" value="1"/><div style = "display: flex; justify-content: space-evenly; padding: 0.8rem 0rem 0rem 0rem !important;">';
                echo '<a><button type="submit" formaction="./productView.php?action=?&code=' . $random['ProductID'] . '" value="Add to cart" class="button">';
                echo '<i class="bx bx-wine new__icon"></i>';
                echo '</button></a>';
                echo '<a><button type="submit" value="Add to cart" class="button">';
                echo '<i class="bx bx-cart-alt new__icon"></i>';
                echo '</button></a></div>';
                echo '</form>';
                echo '</div>';
            }
        }
    }


    // to show product page 
    public function showProduct($entryid)
    {
        //$entryID = $_GET['id'];


        try {

            $sqlGet = "SELECT * FROM products WHERE ProductID=$entryid";
            $stmt = $this->connect()->prepare($sqlGet);


            if (!$stmt->execute()) {
                $stmt = null;
                header("Location: ../adminEditProduct.php?error=stmtfailed");
                exit();
            }

            $getProduct = $stmt->fetchAll();

            return $getProduct;
        } catch (\Throwable $th) {
            $th = header("Location: ../adminEditProduct.php?error=stmtfailed");
        }
    }
}
