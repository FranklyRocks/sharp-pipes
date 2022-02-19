<?php
class Pipe {
    public static function new(...$args) {
        $value = array_shift($args);
        foreach($args as $param) $value = $param($value);
        return $value;
    }
}

function pipe() {
    return Pipe::new(...func_get_args());
}
