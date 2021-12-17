<?php
include './header.php';

$viewAbout = new \DAO\Admin();
$getAbout = $viewAbout->getAbout();
?>
<!--==================== ABOUT ====================-->
<section class="section discount flex">
    <div class="discount__container container grid" style="text-align: left !important;">
        <div class="discount__data">
            <h2 class="discount__title">
                <?php echo $getAbout[0][1] ?> <br>
                <?php echo $getAbout[0][2] ?>
            </h2>
        </div>

        <img src="assets/img/about7.png" alt="" class="discount__img" />
    </div>
    <br>
    <div style="display: flex; align-items: center; padding: 2rem;" class="container">
        <div style="padding: 5rem;" id="aboutWine__data">
            <span id="aboutWine__data">
                <?php echo $getAbout[0][3] ?>
            </span>
        </div>

        <img src="assets/img/about2.png" alt="" class="discount__img" />
    </div>
    <div style="display: flex; align-items:center; padding: 2rem;" class="container">
        <div style="padding: 5rem;" id="aboutWine__data">
            <span id="aboutWine__data">
                <?php echo $getAbout[0][4] ?>
            </span>
        </div>
        <img style="order: 1 !important;" src=" assets/img/about3.png" alt="" class="discount__img" />

    </div>
    <div style="display: flex; align-items:center; padding: 0rem;" class="container">
        <div style="padding: 2rem;" id="aboutWine__data">

            <img src="assets/img/about4.png" alt="" class="discount__img" />
        </div>
        <span id=aboutWine__data>
            <?php echo $getAbout[0][5] ?>
        </span>
    </div>
    <div style="display: flex; align-items:center; padding: 0rem;" class="container">
        <div style="padding: 2rem;" id="aboutWine__data">

            <img src="assets/img/about5.png" alt="" class="discount__img" />
        </div>
        <span id=aboutWine__data>
            <?php echo $getAbout[0][6] ?>
        </span>

    </div>
    <div style="display: flex; align-items:center; padding: 0rem;" class="container">
        <div style="padding: 2rem;" id="aboutWine__data">

            <img src="assets/img/about6.png" alt="" class="discount__img" />
        </div>
        <span id=aboutWine__data>
            <?php echo $getAbout[0][7] ?>
        </span>

    </div>
</section>
<section class="section discount grid">
    <h3 class="section__title">Enquiries? Contact us below!</h3>
    <div class="discount__container container" style="margin-left: auto; margin-right: auto;">

        <form class="login__form" method="post" id="about" action="./includes/contact.inc.php">
            <div style=" border-bottom: 2px solid white !important;">
                <h2><label for=" _Headtitle">Your Email</label></h2>
                <input id=" _HeadTitle" class="login__input" type="text" name="email">
            </div>
            <div style="margin-left: auto; margin-right: auto;">
                <br>
                <h2><label class="grid" for="paragraph1">Your Message:</label></h2>
                <textarea form="about" maxlength="510" style="height: 200px;" id="paragraph1" cols="75" rows="60" class="login__input" type="text" name="message">
                    </textarea>
            </div>
            <div>
                <br>
                <h2 style="display:flex !important; justify-content: center !important; font-size: 2rem;" class="section__title">

                    <button type="submit" name="submit" class="nav__link button">Send E-mail</button>
                </h2>
            </div>
        </form>
    </div>
</section>

<?php include './footer.php'; ?>