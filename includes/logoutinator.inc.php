<?php

$url = './index.php';

if (!isset($_SESSION["id"])) {
    echo '<meta http-equiv="Refresh" content="0;url=' . $url . '" />';
}
if ($_SESSION["rank"] === '1') {
    echo '<meta http-equiv="Refresh" content="0;url=' . $url . '" />';
} elseif ($_SESSION["rank"] === '0') {
    echo '';
}
