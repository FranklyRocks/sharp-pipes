<?php class Pipe{static function new(...$a) {$v=array_shift($a);foreach($a as $f)$v=$f($v);return $v;}}function pipe(){return Pipe::new(...func_get_args());}
