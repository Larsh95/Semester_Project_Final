<?php
include './header.php';
include './includes/logoutinator.inc.php';

if (isset($_GET["id"])) {
    $transactView = new \DAO\Transactions();
    $getTransaction = $transactView->showTransact($_GET['id']);

    $transacID = $getTransaction[0][0];
    $orderID = $getTransaction[0][1];
    $shipped = $getTransaction[0][2];
    $timeStamp = $getTransaction[0][3];
    $first_name = $getTransaction[0][4];
    $last_name = $getTransaction[0][5];
    $email = $getTransaction[0][6];
    $postCode = $getTransaction[0][7];
    $city = $getTransaction[0][8];
    $address = $getTransaction[0][9];
    $phoneNum = $getTransaction[0][10];
    $userID = $getTransaction[0][11];
    $paidAmount = $getTransaction[0][12];
    $pItems = $getTransaction[0][13];

    $pItem = unserialize($pItems);

?>

    <section class="section">
        <div class=" container">
            <h1 class="section__title" style="text-decoration-line: underline; text-decoration-color: white;">Shipping & Order overview for Transaction #<?php echo $transacID ?></h1>
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
                <h1 class="section__title" style="font-size: 28px !important;">Product(s) Overview</h1>
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
                <h1 class="section__title" style="font-size: 28px !important;">Shipping Info</h1>
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
                <form action="./includes/transaction.inc.php" method="post">
                    <div>
                        <input style="color: red !important; transform: scale(3);" id="shipped" name="shipped" type="checkbox" value="Yes">
                    </div>
                    <div>
                        <label class="section__title" for="shipped">Shipped?</label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <input type="hidden" name="transacID" value='<?php echo $transacID ?>'>
                    <button type="submit" name="submit" style="color: lightskyblue !important; transform: scale(2);" class="nav__link button--ghost">Updated shipping</button>
                </form>
            </h2>
    </section>
<?php
} else {
    header("Location: ./adminTransactions.php?status=0");
} ?>

<?php include_once './footer.php'; ?>