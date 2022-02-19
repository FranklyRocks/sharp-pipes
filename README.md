# PHP Pipes
PHP pipes in 156 bytes

## Usage

```php

// $v is passed through every function in the pipe

pipe($v, fn($v) => function1($v), fn($v) => function2($v), ...); // returns $v
```

## Example

```php
function slug(string $s) : string {
    return pipe($s, 
      fn($s) => strtolower($s), 
      fn($s) => str_replace(" ", "-", $s)
    );
}

slug("Xiaomi Redmi 7A"); // xiaomi-redmi-7a
```

## Code explined

```php
class Pipe {
    public static function new(...$args) : mixed {
        
        // Retrive first argument as initial value
        $value = array_shift($args);
        
        // Call the functions passing $value and assign its return
        foreach($args as $param) $value = $param($value);
        
        // Return computed value
        return $value;
        
    }
}

// Helper function
function pipe() : mixed {
    return Pipe::new(...func_get_args());
}
```
