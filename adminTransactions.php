<?php
include_once './header.php';
include_once './includes/adminTabs.inc.php';
include './includes/logoutinator.inc.php';
?>
<section class="section">
    <div class="container">
        <h2 class="section__title">View & Edit Transactions</h2>
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
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Order #</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Has been shipped?</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Purchase Time</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;"></th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $transactionView = new \DAO\Transactions();
                    $transactionView->getTransactions();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include_once './footer.php'; ?>