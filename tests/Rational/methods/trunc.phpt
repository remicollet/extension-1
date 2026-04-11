--TEST--
Rational::trunc
--FILE--
<?php
use Decimal\Rational;

/**
 * op1, expected result
 */
$tests = [
    [Rational::valueOf( "0"),        "0"],
    [Rational::valueOf("+0"),        "0"],
    [Rational::valueOf("-0"),       "-0"],

    [Rational::valueOf("-0.1"),     "-0"],
    [Rational::valueOf("+0.1"),      "0"],
    [Rational::valueOf( "0.1"),      "0"],

    [Rational::valueOf("-1"),       "-1"],
    [Rational::valueOf( "1"),        "1"],

    [Rational::valueOf( "1.5"),      "1"],
    [Rational::valueOf("-1.5"),     "-1"],
    [Rational::valueOf( "2.9"),      "2"],
    [Rational::valueOf("-2.9"),     "-2"],

    [Rational::valueOf("-INF"),     "-INF"],
    [Rational::valueOf( "INF"),      "INF"],
    [Rational::valueOf( "NAN"),      "NAN"],
];

foreach ($tests as $test) {
    list($op1, $expect) = $test;

    $result = $op1->trunc();

    if ((string) $result !== $expect) {
        print_r(compact("op1", "result", "expect"));
    }
}

/* Test immutable */
$number = Rational::valueOf("-1.5");
$result = $number->trunc();

if ((string) $number !== "-3/2") {
    var_dump("Mutated!", compact("number"));
}
?>
--EXPECT--
