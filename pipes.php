<?php
class Pipe {
    public static function new(...$args) {
        $value = array_shift($args);
        foreach($args as $func) $value = $func($value);
        return $value;
    }
}

function pipe() {
    return Pipe::new(...func_get_args());
}
