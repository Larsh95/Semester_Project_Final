<?php

include './header.php';
include './includes/logoutinator.inc.php';

if (isset($_GET["ProductID"])) {

    $aProductID = $_GET["ProductID"];
    $aNewsID = $_GET["newsID"];

    $newsView = new \DAO\News();
    $getNewsi = $newsView->showNews($aNewsID);

    $newsID = $getNewsi[0][0];
    $maintitle = $getNewsi[0][2];
    $newsTitle = $getNewsi[0][3];

?>
    <section class="section discount grid" style="align-content: center !important;">
        <h2 class="section__title"> Edit Homepage News for the product</h2>
        <div class="discount__container container" style="align-content: center !important; width: 500px">


            <form class="login__form" method="post" action="./includes/news.inc.php" style="display: flex !important; justify-content: center !important;">
                <div style=" border-bottom: 2px solid white !important;">
                    <h2><label for=" _Headtitle">Main title:</label></h2>
                    <input id=" _HeadTitle" class="login__input" type="text" name="maintitle" value="<?php echo $maintitle; ?>">
                </div>
                <div style="border-bottom: 2px solid white !important;">
                    <h2><label for="subtitle">News # title:</label></h2>
                    <input id="subtitle" class="login__input" type="text" name="newsTitle" value="<?php echo $newsTitle ?>">
                </div>
                <div>
                    <input type="hidden" name="ProductID" value="<?php echo $aProductID; ?>">
                    <input type="hidden" name="newsID" value='<?php echo $newsID; ?>'>
                    <br>
                    <h2 style="display:flex !important; justify-content: center !important; font-size: 2rem;" class="section__title">

                        <button type="submit" name="submit" class="nav__link button">Update</button>
                    </h2>
                </div>
            </form>


        </div>
    </section>
<?php } ?>

<?php include_once './footer.php'; ?>