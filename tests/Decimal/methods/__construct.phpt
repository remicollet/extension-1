--TEST--
Decimal::__construct
--FILE--
<?php
new Decimal\Decimal;
?>
--EXPECTF--
Fatal error: Uncaught Error: Call to private Decimal\Decimal::__construct() from global scope in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d
