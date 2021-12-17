<?php
include_once './header.php';
include_once './includes/adminTabs.inc.php';
include './includes/logoutinator.inc.php';

$viewAbout = new \DAO\Admin();
$getAbout = $viewAbout->getAbout();


?>
<section class="section discount grid" style="align-content: center !important;">
    <div class="discount__container container grid">

        <form class="login__form" method="post" id="about" action="./includes/about.inc.php">
            <div style=" border-bottom: 2px solid white !important;">
                <h2><label for=" _Headtitle">Title:</label></h2>
                <input id=" _HeadTitle" class="login__input" type="text" name="title" value="<?php echo $getAbout[0][1] ?>">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <h2><label for="subtitle">Subtitle:</label></h2>
                <input id="subtitle" class="login__input" type="text" name="subtitle" value="<?php echo $getAbout[0][2] ?>">
            </div>
            <div>
                <br>
                <h2><label class="grid" for="paragraph1">First paragraph:</label></h2>
                <textarea form="about" maxlength="510" style="height: 200px;" id="paragraph1" cols="75" rows="60" class="login__input" type="text" name="company1"><?php echo $getAbout[0][3] ?>
        </textarea>
            </div>
            <div>
                <h2><label class="grid" for="paragraph2">Second paragraph:</label></h2>
                <textarea form="about" maxlength="510" style="height: 200px;" id="paragraph2" class="login__input" type="text" name="company2"><?php echo $getAbout[0][4] ?>
                </textarea>
            </div>
            <div>
                <h2><label class="grid" for="cInfo1">First Info area:</label></h2>
                <textarea form="about" maxlength="510" style="height: 200px;" id="cInfo1" class="login__input" type="text" name="cInfo1"><?php echo $getAbout[0][5] ?>
                </textarea>
            </div>
            <div>
                <h2><label class="grid" for="cInfo2">Second Info area:</label></h2>
                <textarea form="about" maxlength="510" style="height: 200px;" id="cInfo2" class="login__input" type="text" name="cInfo2"><?php echo $getAbout[0][6] ?>
                </textarea>
            </div>
            <div>
                <h2><label class="grid" for="openHour">Open Hours:</label></h2>
                <textarea form="about" maxlength="510" style="height: 200px;" id="openHour" class="login__input" type="text" name="openHour"><?php echo $getAbout[0][7] ?>
                </textarea>

            </div>
            <div>
                <br>
                <h2 style="display:flex !important; justify-content: center !important; font-size: 2rem;" class="section__title">

                    <button type="submit" name="submit" class="nav__link button">Update</button>
                </h2>
            </div>
        </form>