<?php
$htmlStart = "<span class='footer__copy' style='text-decoration-line: underline; text-decoration-color: white; font-size: 28px !important;'>";
$htmlFin = "</span>";
// User and product crud errors. 
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyinput") {
        echo $htmlStart . "Please fill out all fields" . $htmlFin;
    } elseif ($_GET['error'] == "invaliduser") {
        echo $htmlStart . "Username: Please ONLY use lowercase, uppercase, and numbers." . $htmlFin;
    } elseif ($_GET['error'] == "invalidfname") {
        echo $htmlStart . "First Name: Please ONLY use lowercase and uppercase! No spaces" . $htmlFin;
    } elseif ($_GET['error'] == "invalidlname") {
        echo $htmlStart . "Last Name: Please ONLY use lowercase and uppercase! No spaces" . $htmlFin;
    } elseif ($_GET['error'] == "invalidemail") {
        echo $htmlStart . "Please use a valid email" . $htmlFin;
    } elseif ($_GET['error'] == "usertaken") {
        echo $htmlStart . "Username or email already exists" . $htmlFin;
    } elseif ($_GET['error'] == "pwdtooshort") {
        echo $htmlStart . "Password must include at least ONE letter ONE number and longer than 3 characters" . $htmlFin;
    } elseif ($_GET['error'] == "pwdnotsame") {
        echo $htmlStart . "Passwords dont match" . $htmlFin;
    } elseif ($_GET['error'] == "usernotfound") {
        echo $htmlStart . "Username incorrect" . $htmlFin;
    } elseif ($_GET['error'] == "wrongpass") {
        echo $htmlStart . "Password incorrect" . $htmlFin;
    } elseif ($_GET['error'] == "stmtfailed") {
        echo $htmlStart . "Database SQL error" . $htmlFin;
    } elseif ($_GET['error'] == "invalidpPrice") {
        echo $htmlStart . "Wrong price type, use only numbers" . $htmlFin;
    } elseif ($_GET['error'] == "invalidpName") {
        echo $htmlStart . "Wrong name type, use only letters" . $htmlFin;
    } elseif ($_GET['error'] == "invalidpDiscount") {
        echo $htmlStart . "Wrong discount type, use only numbers" . $htmlFin;
    } elseif ($_GET['error'] == 0) {
        echo "Forbidden access - redirected to home!";
    }
}
// User and Product Crud Status 
if (isset($_GET['status'])) {
    if ($_GET['status'] == "deleted") {
        echo $htmlStart . "The user " . $_GET['id'] . " has been successfully deleted!" . $htmlFin;
    } elseif ($_GET['status'] == "updated") {
        echo $htmlStart . "The user " . $_GET['id'] . " has been successfully Updated!" . $htmlFin;
    } elseif ($_GET['status'] == "added") {
        echo $htmlStart . "The new user has been successfully added!" . $htmlFin;
    } elseif ($_GET['status'] == "pDeleted") {
        echo $htmlStart . "The product " . $_GET['id'] . " has been successfully deleted!" . $htmlFin;
    } elseif ($_GET['status'] == "pUpdated") {
        echo $htmlStart . "The product " . $_GET['id'] . " has been successfully Updated!" . $htmlFin;
    } elseif ($_GET['status'] == "pAdded") {
        echo $htmlStart . "The new product has been successfully added!" . $htmlFin;
    } elseif ($_GET['status'] == "tAdded") {
        echo $htmlStart . "The transaction has been successfully completed!" . $htmlFin;
    } elseif ($_GET['status'] == "updatedAbout") {
        echo $htmlStart . "The about page has been successfully updated!" . $htmlFin;
    } elseif ($_GET['status'] == "updatedNews") {
        echo $htmlStart . "The news section has been successfully updated!" . $htmlFin;
    }
}
// CART ADDED OR REMOVED STATUS
if (isset($_GET['action'])) {
    if ($_GET['action'] == "add") {
        echo $htmlStart . "The Product has been added to the Cart" . $htmlFin;
    } elseif ($_GET['action'] == "remove") {
        echo $htmlStart . "The Product has been removed from the Cart" . $htmlFin;
    } elseif ($_GET['action'] == "empty") {
        echo $htmlStart . "The Cart has been emptied" . $htmlFin;
    }
}
if (isset($_GET['code'])) {
    if ($_GET['code'] == "success") {
        echo $htmlStart . "The invoice has been sent to your mail." . $htmlFin;
    } elseif ($_GET['code'] == "notSuccess") {
        echo $htmlStart . "Transaction complete, but invoice was not sent by mail." . $htmlFin;
    }
}
