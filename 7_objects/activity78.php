<?php
class MyClass {
    const PI = 3.14; // Define a constant

    // Static method to access constant
    public static function getPi() {
        return self::PI;
    }
}

// Access constant directly using class name
print MyClass::PI; // Output: 3.14
?>