<?php
include './header.php';
require_once('./sample-config.php');

if (isset($_GET["code"])) {
    $orderView = new \DAO\Checkout();
    $getOrder = $orderView->showOrder($_GET['code']);


    $orderID = $getOrder[0][0];
    $first_name = $getOrder[0][1];
    $last_name = $getOrder[0][2];
    $email = $getOrder[0][3];
    $postCode = $getOrder[0][4];
    $city = $getOrder[0][5];
    $address = $getOrder[0][6];
    $phoneNum = $getOrder[0][7];
    $userID = $getOrder[0][8];
    $paidAmount = $getOrder[0][9];
    $pItems = $getOrder[0][10];
    $status = $getOrder[0][11];

    $pItem = unserialize($pItems);

?>

    <section class="section">
        <div class=" container">
            <h1 class="section__title" style="text-decoration-line: underline; text-decoration-color: white;">Please Confirm that all Information is Correct!</h1>
            <p style="display: grid; justify-content: center;">Status: <?php echo $status ?>...</p>
            <br>
            <br>
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

            <table class="tg">
                <h1 class="section__title" style="font-size: 28px !important;">Cart Item(s)</h1>
                <tbody>
                    <tr>
                        <th class=" tg-0lax" style="border-bottom: 2px solid white !important;">Prod.Name</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Prod.Code</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Quantity</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Price</th>
                    </tr>

                    <?php

                    foreach ($pItem as $item) {
                    ?>
                        <tr>
                            <td><strong><?php echo $item["name"]; ?></strong></td>
                            <td><?php echo "Code #" . $item["code"]; ?></td>
                            <td><?php echo $item["quantity"]; ?></td>
                            <td><?php echo $item["price"] . " DKK"; ?></td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td colspan="4" align=right><strong>Total:</strong> <?php echo $paidAmount . " DKK"; ?></td>
                    </tr>
                </tbody>
            </table>
            <table class="tg">
                <h1 class="section__title" style="font-size: 28px !important;">Personal Info</h1>
                <tbody>
                    <tr>
                        <th class=" tg-0lax" style="border-bottom: 2px solid white !important;">Name</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Address</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">email</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Phone Number</th>
                    </tr>
                    <tr>
                        <td><strong><?php echo $first_name . ' ' . $last_name; ?></strong></td>
                        <td><?php echo $address . '</br>' . $postCode . '</br>' . $city . '</br>' ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $phoneNum ?></td>
                    </tr>
                    <tr>
                    </tr>
                </tbody>
            </table>
            <br><br><br>
            <h2 style="display:flex !important; justify-content:space-evenly !important; font-size: 1rem;" class="section__title">
                <form action="./includes/success.inc.php" method="post">
                    <input type="hidden" name="orderID" value="<?php echo $orderID ?>">
                    <input type="hidden" name="first_name" value="<?php echo $first_name ?>">
                    <input type="hidden" name="last_name" value="<?php echo $last_name ?>">
                    <input type="hidden" name="email" value="<?php echo $email ?>">
                    <input type="hidden" name="postCode" value="<?php echo $postCode ?>">
                    <input type="hidden" name="city" value="<?php echo $city ?>">
                    <input type="hidden" name="address" value="<?php echo $address ?>">
                    <input type="hidden" name="phoneNum" value="<?php echo $phoneNum ?>">
                    <input type="hidden" name="paidAmount" value="<?php echo $paidAmount ?>">
                    <input type="hidden" name="pItem" value='<?php echo $pItems ?>'>
                    <button type="submit" name="submit" style="color: lightskyblue !important;" class="nav__link button--ghost">Confirm Purchase</button>
                </form>
            </h2>

        <?php } else { ?>
            <h1 class="error">Your Payment has Failed</h1>
        <?php } ?>
    </section>

    <?php include './footer.php'; ?>