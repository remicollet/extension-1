--TEST--
Rational::toScientific
--FILE--
<?php
use Decimal\Rational;

$tests = [
    ["0",           "0E+0"],
    ["-0",         "-0E+0"],
    ["1",           "1E+0"],
    ["-1",         "-1E+0"],
    ["0.1",         "1E-1"],
    ["-0.1",       "-1E-1"],
    ["1.5",         "1.5E+0"],
    [123,           "1.23E+2"],
    [-123,         "-1.23E+2"],
    ["0.001",       "1E-3"],
    ["1000",        "1E+3"],

    [ "NAN",        "NAN"],
    [ "INF",        "INF"],
    ["-INF",       "-INF"],
];

foreach ($tests as $test) {
    $number = $test[0];
    $expect = $test[1];
    $result = Rational::valueOf($number)->toScientific();

    if ($result !== $expect) {
        print_r(compact("number", "result", "expect"));
    }
}

/**
 * Test with explicit precision parameter.
 */
var_dump(Rational::valueOf("1")->div("3")->toScientific(10));
?>
--EXPECT--
string(14) "3.333333333E-1"
