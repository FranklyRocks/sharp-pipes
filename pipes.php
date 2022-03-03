<?php

function pipe($value, ...$funcs) {
	return array_reduce($funcs, fn($v, $f) => $f($v), $value);
}
