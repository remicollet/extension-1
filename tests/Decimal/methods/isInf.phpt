--TEST--
Decimal::isInf
--FILE--
<?php
use Decimal\Decimal;

/**
 * op1, expected result
 */
$tests = [
    [ "1E-50",  false],
    ["-1E-50",  false],

    [0,         false],
    [1,         false],
    [2,         false],
    [3,         false],

    [-1,        false],
    [-2,        false],
    [-3,        false],

    ["1.5",     false],
    ["2.5",     false],
    ["3.5",     false],

    [ "NAN",    false],
    [ "INF",    true],
    ["-INF",    true],
];

foreach ($tests as $test) {
    $number = $test[0];
    $expect = $test[1];
    $result = Decimal::valueOf($number)->isInf();

    if ($result !== $expect) {
        print_r(compact("number", "result", "expect"));
    }
}
?>
--EXPECT--
