<?php
include_once './header.php';
include_once './includes/adminTabs.inc.php';
include './includes/logoutinator.inc.php';
$adminNews = new \DAO\News();
$news = $adminNews->getAdminNews();

$first_newsID = $news[0][0];
$first_ProductID = $news[0][1];
$first_maintitle = $news[0][2];
$first_newsTitle = $news[0][3];

$second_newsID = $news[1][0];
$second_ProductID = $news[1][1];
$second_maintitle = $news[1][2];
$second_newsTitle = $news[1][3];

$third_newsID = $news[2][0];
$third_ProductID = $news[2][1];
$third_maintitle = $news[2][2];
$third_newsTitle = $news[2][3];

?>
<section class="section">
    <div class="container">
        <h2 class="section__title">View & Edit Homepage News</h2>
        <style type="text/css">
            .tg {
                border: none;
                border-collapse: collapse;
                border-spacing: 0;
                margin: 0px auto;
            }

            .tg td {
                border-style: solid;
                border-width: 0px;
                font-family: Arial, sans-serif;
                font-size: 18px;
                overflow: hidden;
                padding: 20px 20px;
                word-break: normal;
            }

            .tg th {
                border-style: solid;
                border-width: 0px;
                font-family: Arial, sans-serif;
                font-size: 24px;
                font-weight: normal;
                overflow: hidden;
                padding: 20px 20px;
                word-break: normal;
            }

            .tg .tg-0lax {
                text-align: left !important;
                vertical-align: top !important
            }

            @media screen and (max-width: 767px) {
                .tg {
                    width: auto !important;
                }

                .tg col {
                    width: auto !important;
                }

                .tg-wrap {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                    margin: auto 0px;
                }
            }
        </style>
        <div class="tg-wrap">
            <table class="tg">
                <thead>
                    <tr>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">News #</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Assoc. Product</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Choose Product</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;"></th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="./adminEditNews.php" method="get">
                            <td><strong><?php echo $first_newsID; ?></strong></td>
                            <td><?php echo $first_ProductID; ?></td>
                            <td><select name="ProductID" id="ProductID">
                                    <option value="" disabled selected hidden>Select a Product!</option>
                                    <optgroup label="Wine">
                                        <?php
                                        $newsView = new \DAO\News();
                                        $newsView->getNewsWine();
                                        ?>
                                    </optgroup>
                                    <optgroup label="Liquore">
                                        <?php
                                        $newsView = new \DAO\News();
                                        $newsView->getNewsLiquore();
                                        ?>
                                    </optgroup>
                                    <optgroup label="Cheese">
                                        <?php
                                        $newsView = new \DAO\News();
                                        $newsView->getNewsCheese();
                                        ?>
                                    </optgroup>
                                </select></td>
                            <input type="hidden" name="newsID" value="<?php echo $first_newsID; ?>">
                            <td></td>
                            <td><button class="button" type="submit">Edit</button></td>
                        </form>
                    <tr>
                        <form action="./adminEditNews.php" method="get">
                            <td><strong><?php echo $second_newsID; ?></strong></td>
                            <td><?php echo $second_ProductID; ?></td>
                            <td><select name="ProductID" id="ProductID">
                                    <option value="" disabled selected hidden>Select a Product!</option>
                                    <optgroup label="Wine">
                                        <?php
                                        $newsView = new \DAO\News();
                                        $newsView->getNewsWine();
                                        ?>
                                    </optgroup>
                                    <optgroup label="Liquore">
                                        <?php
                                        $newsView = new \DAO\News();
                                        $newsView->getNewsLiquore();
                                        ?>
                                    </optgroup>
                                    <optgroup label="Cheese">
                                        <?php
                                        $newsView = new \DAO\News();
                                        $newsView->getNewsCheese();
                                        ?>
                                    </optgroup>
                                </select></td>
                            <input type="hidden" name="newsID" value="<?php echo $second_newsID; ?>">
                            <td></td>
                            <td><button class="button" type="submit">Edit</button></td>
                        </form>
                    <tr>
                        <form action="./adminEditNews.php" method="get">
                            <td><strong><?php echo $third_newsID; ?></strong></td>
                            <td><?php echo $third_ProductID; ?></td>
                            <td><select name="ProductID" id="ProductID">
                                    <option value="" disabled selected hidden>Select a Product!</option>
                                    <optgroup label="Wine">
                                        <?php
                                        $newsView = new \DAO\News();
                                        $newsView->getNewsWine();
                                        ?>
                                    </optgroup>
                                    <optgroup label="Liquore">
                                        <?php
                                        $newsView = new \DAO\News();
                                        $newsView->getNewsLiquore();
                                        ?>
                                    </optgroup>
                                    <optgroup label="Cheese">
                                        <?php
                                        $newsView = new \DAO\News();
                                        $newsView->getNewsCheese();
                                        ?>
                                    </optgroup>
                                </select></td>
                            <input type="hidden" name="newsID" value="<?php echo $third_newsID; ?>">
                            <td></td>
                            <td><button class="button" type="submit">Edit</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include_once './footer.php'; ?>