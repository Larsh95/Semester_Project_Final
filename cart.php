<?php
require 'header.php';
?>
<section class="section">
    <div class="container">
        <div>
            <h2 class="section__title">Shopping Cart</h2>
        </div>
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
                <tbody>
                    <tr>
                        <th class=" tg-0lax" style="border-bottom: 2px solid white !important;">Name</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Prod.Code</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Quantity</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Price</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Remove</th>
                    </tr>
                    <?php

                    $item_total = 0;
                    if (isset($_SESSION["cartItem"])) {

                        foreach ($_SESSION["cartItem"] as $item) {
                    ?>
                            <tr>
                                <td><strong><?php echo $item["name"]; ?></strong></td>
                                <td><?php echo "Code #" . $item["code"]; ?></td>
                                <td><?php echo $item["quantity"]; ?></td>
                                <td><?php echo $item["price"] . " DKK"; ?></td>
                                <td><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="button">Remove</a></td>
                            </tr>
                    <?php
                            $item_total += ($item["price"] * $item["quantity"]);
                        }
                    }
                    ?>

                    <tr>
                        <td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total . " DKK"; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php

        if (!empty($_SESSION["cartItem"])) {
        ?>
            <h2 style="display:flex !important; justify-content:space-evenly !important; font-size: 1rem;" class="section__title">
                <a style="border-bottom: solid;" class='nav__link button--ghost' id="emptyBtn" href="cart.php?action=empty">Empty Cart</a>
                <form action="./checkout.php" method="post">
                    <button type="submit" name="submit" style="color: lightskyblue !important;" class="nav__link button--ghost">Checkout</button>
                </form>
            </h2>
        <?php
        }
        ?>
    </div>
    </div>
</section>

<?php include 'footer.php'; ?>