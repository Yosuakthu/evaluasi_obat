<?php

include("../koneksi,php");
if (isset($_GET["link"])) {
    if ($_GET["link"] == 'masuk') {
        include("../masuk.php");
    }
}