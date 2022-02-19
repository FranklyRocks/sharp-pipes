<?php
class Pipe {
    public static function new(...$args) : mixed {
        $value = array_shift($args);
        foreach($args as $param) $value = $param($value);
        return $value;
    }
}

function pipe() : mixed {
    return Pipe::new(...func_get_args());
}
