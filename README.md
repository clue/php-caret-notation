# clue/caret-notation [![Build Status](https://travis-ci.org/clue/php-caret-notation.svg?branch=master)](https://travis-ci.org/clue/php-caret-notation)

^B A dead-simple PHP library to add [caret notation](https://en.wikipedia.org/wiki/Caret_notation)
in order to safely show strings that contain
[ASCII control characters](https://en.wikipedia.org/wiki/Control_character#In_ASCII)
(unprintable characters) 

> Note: This project is in early alpha stage! Feel free to report any issues you encounter.

## Quickstart example

Once [installed](#install), you can use the following code to use caret notation
for any string that (may possibly) contain binary control characters:

```php
$encoder = new Encoder();

$string = "Hello\r\nworld\0";
// Output: Hello^M^Jworld^@
echo $encoder->encode($string);

$string = "No control chars";
// Output: No control chars
echo $encoder->encode($string);
```

## Install

The recommended way to install this library is [through composer](http://getcomposer.org). [New to composer?](http://getcomposer.org/doc/00-intro.md)

```JSON
{
    "require": {
        "clue/caret-notation": "dev-master"
    }
}
```

## License

MIT
