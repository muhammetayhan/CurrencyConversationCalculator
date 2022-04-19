<?php
$kurlar = simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");
$tl = 1;

$kurlistesi = array("dolar", "euro", "tl");


foreach ($kurlar->Currency as $key => $kur) {

    if ($kur->CurrencyName == "US DOLLAR") {
        ${"dolar"} = $kur->ForexSelling[0];
    }
    if ($kur->CurrencyName == "EURO") {
        ${"euro"} = $kur->ForexSelling[0];
    }
}



if ($_GET["cx"]) {

    $list = explode("_", $_GET["cx"]);

    for ($is = 0; $is < count($kurlistesi); $is++) {

        if ($kurlistesi[$is] == $list[0]) {
            $ilk = ${$kurlistesi[$is]};
        }
        if ($kurlistesi[$is] == $list[1]) {
            $son = ${$kurlistesi[$is]};
        }
    }

}

echo  $ilk / $son;