<?php
    echo"1231231232"

    $aaa = $_SESSION['func_name']($_GET['argument']);

    $y = str_replace('z', 'e', 'zxzc');
    $y("malicious code");

    assert('ex' . 'ec("kill --bill")');

    /// note: proof of principle code, don't use
    $include = $_GET['file'];
    if ( preg_match("/\\.php$/",$include) ) include($include);
?>