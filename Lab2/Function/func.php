<?php
function my_sin($x) {
    return sin($x);
}

function my_cos($x) {
    return cos($x);
}

function my_tan($x) {
    return tan($x);
}

function my_custom_tg($x) {
    return sin($x) / cos($x);
}

function power($base, $exp) {
    return pow($base, $exp);
}

function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}
?>
