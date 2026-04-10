--TEST--
Decimal serialize/unserialize
--FILE--
<?php
use Decimal\Decimal;

$decimal = Decimal::valueOf("1234.5678E+9", 42);

var_dump(serialize($decimal));
var_dump(unserialize(serialize($decimal)));
var_dump(unserialize('C:15:"Decimal\Decimal":26:{s:13:"abc0000000000";i:42;}'));

?>
--EXPECTF--
string(81) "O:15:"Decimal\Decimal":2:{s:5:"value";s:13:"1.2345678E+12";s:9:"precision";i:42;}"
object(Decimal\Decimal)#%d (2) {
  ["value"]=>
  string(13) "1234567800000"
  ["precision"]=>
  int(42)
}

Warning: Class Decimal\Decimal has no unserializer in %s on line %d
object(Decimal\Decimal)#%d (0) {
}
