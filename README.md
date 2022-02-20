# PHP Pipes
PHP pipes in 156 bytes

## Usage

```php
// Equivalent to: function3(function2(function1($v)))
pipe($v, 
    fn($v) => function1($v), 
    fn($v) => function2($v), 
    fn($v) => function3($v),
    ...
); 
```

## Example

```php
function slug(string $s) : string {
    return pipe($s, 
      fn($s) => strtolower($s), 
      fn($s) => str_replace(" ", "-", $s)
    );
}

slug("10 WAYS to EAT more HEALTHY"); // 10-ways-to-eat-more-healthy
```

## Code explined

```php
class Pipe {
    public static function new(...$args) : mixed {
        
        // Retrive first argument as initial value
        $value = array_shift($args);
        
        // Call the functions passing $value and assign its return
        foreach($args as $func) $value = $func($value);
        
        // Return computed value
        return $value;
        
    }
}

// Helper function
function pipe() : mixed {
    return Pipe::new(...func_get_args());
}
```
