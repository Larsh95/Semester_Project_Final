<?php
include_once './header.php';
include_once './includes/adminTabs.inc.php';
include './includes/logoutinator.inc.php';
?>
<section class="section login">
    <div class="newsletter__container container">
        <h3 class="section__title">Add User</h3>
        <form class="login__form" name="contact" method="post" action="./includes/User.inc.php">
            <div style="border-bottom: 2px solid white !important;">
                <label for="userName">Username:</label>
                <input id="userName" name="userName" type="text" class="login__input" required="" aria-required="true">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="firstName">First Name:</label>
                <input id="firstName" name="firstName" type="text" class="login__input" required="" aria-required="true">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="lastName">Last Name:</label>
                <input id="lastName" name="lastName" type="text" class="login__input" required="" aria-required="true">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="pass">Password:</label>
                <input id="pass" name="pass" type="password" class="login__input" required="" aria-required="true">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="email">E-Mail:</label>
                <input id="email" name="email" type="email" class="login__input" required="" aria-required="true">
            </div>
            <div style="border-bottom: 2px solid white !important;">
                <label for="rank">Admin:</label>
                <input id="rank" name="rank" type="hidden" value="1" class="login__input">
                <input id="rank" name="rank" type="checkbox" value="0" class="login__input">
            </div>
            </br>
            <button class="button" type="submit" name="submit">Add</button>
        </form>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2 class="section__title">Edit & Delete Users</h2>
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
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Username</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Full Name</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Email</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;"></th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Edit</th>
                        <th class="tg-0lax" style="border-bottom: 2px solid white !important;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $userView = new \DAO\Admin();
                    $userView->getUsers();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include_once './footer.php'; ?>