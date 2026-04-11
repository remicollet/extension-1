--TEST--
Decimal::isNegative
--FILE--
<?php
use Decimal\Decimal;

/**
 * op1, expected result
 */
$tests = [
    [ "1E-50",  false],
    ["-1E-50",  true],

    [0,         false],
    [1,         false],
    [2,         false],
    [3,         false],

    [-1,        true],
    [-2,        true],
    [-3,        true],

    ["0",       false],
    ["-0",      false],

    ["0.4",     false],
    ["1.4",     false],

    ["-0.4",    true],
    ["-1.4",    true],

    [ "NAN",    false],
    [ "INF",    false],
    ["-INF",    true],
];

foreach ($tests as $test) {
    $number = $test[0];
    $expect = $test[1];
    $result = Decimal::valueOf($number)->isNegative();

    if ($result !== $expect) {
        print_r(compact("number", "result", "expect"));
    }
}

/* Zero is neither positive nor negative */
var_dump(Decimal::valueOf("0")->isNegative());
var_dump(Decimal::valueOf("-0")->isNegative());
var_dump(Decimal::valueOf("-0.05")->trunc()->isNegative());
?>
--EXPECT--
bool(false)
bool(false)
bool(false)
